<?php
namespace Google\Cloud\Storage;

use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Core\ArrayTrait;
use Google\Cloud\Core\ClientTrait;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Core\Iterator\ItemIterator;
use Google\Cloud\Core\Iterator\PageIterator;
use Google\Cloud\Core\Timestamp;
use Google\Cloud\Core\Upload\SignedUrlUploader;
use Google\Cloud\Storage\Connection\ConnectionInterface;
use Google\Cloud\Storage\Connection\Rest;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\StreamInterface;

class StorageClient {
    
    use ArrayTrait;
    use ClientTrait;

    const VERSION = '1.28.0';

    const FULL_CONTROL_SCOPE = 'https://www.googleapis.com/auth/devstorage.full_control';
    const READ_ONLY_SCOPE = 'https://www.googleapis.com/auth/devstorage.read_only';
    const READ_WRITE_SCOPE = 'https://www.googleapis.com/auth/devstorage.read_write';

    protected $connection;


    public function __construct(array $config = []) 
    {
        if (!isset($config['scopes'])) {
            $config['scopes'] = [
                'https://www.googleapis.com/auth/iam',
                self::FULL_CONTROL_SCOPE,
            ];
        }

        $this->connection = new Rest($this->configureAuthentication($config) + [
            'projectId' => $this->projectId
        ]);
    }

    public function bucket($name, $userProject = false)
    {
        if (!$userProject) {
            $userProject = null;
        } elseif (!is_string($userProject)) {
            $userProject = $this->projectId;
        }

        return new Bucket($this->connection, $name, [
            'requesterProjectId' => $userProject
        ]);
    }

    public function buckets(array $options = [])
    {
        $this->requireProjectId();

        $resultLimit = $this->pluck('resultLimit', $options, false);
        $bucketUserProject = $this->pluck('bucketUserProject', $options, false);
        $bucketUserProject = !is_null($bucketUserProject)
            ? $bucketUserProject
            : true;
        $userProject = (isset($options['userProject']) && $bucketUserProject)
            ? $options['userProject']
            : null;

        return new ItemIterator(
            new PageIterator(
                function (array $bucket) use ($userProject) {
                    return new Bucket(
                        $this->connection,
                        $bucket['name'],
                        $bucket + ['requesterProjectId' => $userProject]
                    );
                },
                [$this->connection, 'listBuckets'],
                $options + ['project' => $this->projectId],
                ['resultLimit' => $resultLimit]
            )
        );
    }

    public function createBucket($name, array $options = [])
    {
        $this->requireProjectId();

        if (isset($options['lifecycle']) && $options['lifecycle'] instanceof Lifecycle) {
            $options['lifecycle'] = $options['lifecycle']->toArray();
        }

        $bucketUserProject = $this->pluck('bucketUserProject', $options, false);
        $bucketUserProject = !is_null($bucketUserProject)
            ? $bucketUserProject
            : true;
        $userProject = (isset($options['userProject']) && $bucketUserProject)
            ? $options['userProject']
            : null;

        $response = $this->connection->insertBucket($options + ['name' => $name, 'project' => $this->projectId]);
        return new Bucket(
            $this->connection,
            $name,
            $response + ['requesterProjectId' => $userProject]
        );
    }
    
}
