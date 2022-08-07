<?php 
$PORT_SERVER = $_SERVER['SERVER_PORT'];
$localhost = "http://localhost:" . $PORT_SERVER;

$deleteActionProduct = 'deleteActionProduct';
$deleteActionManagerProduct = 'deleteActionManagerProduct';

$modifyAPI = "$localhost/backend/CRUD/modify.php";
$deleteAPI = "$localhost/backend/CRUD/delete.php";
$insertAPI = "$localhost/backend/CRUD/insert.php";
$authAPI = "$localhost/backend/authorization/authorization.php";
$imagesService = "$localhost/backend/imagesServices/imagesServices.php";

?>
