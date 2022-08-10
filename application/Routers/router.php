<?php

$configRouteToModifyProduct = '/ModifyProduct';
$configRouteToModifyManagerProduct = "/ModifyManagerProduct";

$ROUTERS_ADMIN = [
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

$ROUTERS_USERS = [
    "/" => "main.php",
    "/Shop" => "shop.php",
    "/auth" => "auth.php",
    "/Shop-details" => "shop-details.php",
];


$configRouteInfoRequestUrl = null;

if (isset($_SESSION['admin'])) {
    $configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS_ADMIN));
    ConfigCallBackUrl($ROUTERS_ADMIN);
} else {
    $configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS_USERS));
    ConfigCallBackUrl($ROUTERS_USERS);
}

function ConfigCallBackUrl($ROUTERS)
{
    if ($GLOBALS['configRouteInfoRequestUrl'] === true) {
        $GLOBALS['configRouteInfoRequestUrl'] = $ROUTERS[$_SERVER['REQUEST_URI']];
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}
