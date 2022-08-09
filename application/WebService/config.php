<?php 
$PORT_SERVER = $_SERVER['SERVER_PORT'];
$localhost = "http://localhost:" . $PORT_SERVER;

$deleteActionProduct = 'deleteActionProduct';
$deleteActionManagerProduct = 'deleteActionManagerProduct';

$requestModifyAPI = "$localhost/backend/CRUD/modify.php";
$requestDeleteAPI = "$localhost/backend/CRUD/delete.php";
$requestInsertAPI = "$localhost/backend/CRUD/insert.php";
$requestAuthAPI = "$localhost/backend/authorization/authorization.php";
$requestImagesService = "$localhost/backend/imagesServices/imagesServices.php";

?>
s