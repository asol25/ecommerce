<?php
include_once dirname(dirname(__FILE__)) . '/fix/client/header.php';
include_once dirname(dirname(__FILE__)) . '/fix/backend/config/configDatabase.php';
include_once dirname(dirname(__FILE__)) . '/fix/application/Routers/router.php';
include_once dirname(dirname(__FILE__)) . '/fix/application/WebService/config.php';


if (http_response_code() === 200 && isset($_SESSION['admin'])) {
    include_once dirname(dirname(__FILE__)) . '/fix/client/layout.php';
} else if (http_response_code() === 200) {
    include_once dirname(dirname(__FILE__)) . "/fix/$configRouteInfoRequestUrl";
} else {
    include_once dirname(dirname(__FILE__)) . '/fix/client/404.php';
}
