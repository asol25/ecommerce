<?php
$ROUTERS = [
    "/" => "client/products/Products.php",
    "/AddProduct" => "client/products/InsertProduct.php",
    "/ModifyProduct" => "client/products/ModifyProduct.php",
    "/ManagerProduct" => "client/managerProducts/ManagerProduct.php",
    "/InsertManagerProduct" => "client/managerProducts/InsertManagerProduct.php",
    "/ManagerDetailsProduct" => "client/managerDetailsProduct/ManagerDetailsProduct.php",
    "/ModifyManagerProduct" => "client/managerProducts/ModifyManagerProduct.php",
    "/Logout" => "client/account/Logout.php",
    "/Login" => "client/account/Login.php",
    "/Register" => "client/account/Register.php",
];

$configRouteToModifyProduct = '/ModifyProduct';
$configRouteToModifyManagerProduct = "/ModifyManagerProduct";

$configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS));
if ($configRouteInfoRequestUrl === true) {
    $configRouteInfoRequestUrl = $ROUTERS[$_SERVER['REQUEST_URI']];
    http_response_code(200);
} else {
    http_response_code(404);
}
