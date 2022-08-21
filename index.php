<?php
session_start();
include_once dirname(dirname(__FILE__)) . '/fix/backend/config/configDatabase.php';
include_once dirname(dirname(__FILE__)) . '/fix/application/Routers/router.php';
include_once dirname(dirname(__FILE__)) . '/fix/application/WebService/config.php';

$layoutAdmin = "layout.php";
$layoutUsers = "index.php";
if (http_response_code() === 200 && isset($_SESSION['admin'])) {
    include_once dirname(dirname(__FILE__)) . '/fix/client/header.php';
    include_once dirname(dirname(__FILE__)) . "/fix/client/$layoutAdmin";
} else if (http_response_code() === 200) {
    var_dump($_SESSION['user']);
    include_once dirname(dirname(__FILE__)) . "/fix/client/layoutUsers/$layoutUsers";
} else {
    include_once dirname(dirname(__FILE__)) . '/fix/client/404.php';
}
