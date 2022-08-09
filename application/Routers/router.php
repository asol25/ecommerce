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

$ROUTERS_USERS = [
    "/" => "client/layoutUsers/index.php",
    "/Shop" => "client/layoutUsers/shop.php",
];

$configRouteToModifyProduct = '/ModifyProduct';
$configRouteToModifyManagerProduct = "/ModifyManagerProduct";

$configRouteInfoRequestUrl = null;

if (empty($_SESSION['admin'])) {
    $configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS_USERS));
    ConfigCallBackUrl($configRouteInfoRequestUrl, $ROUTERS_USERS);
} else {
    $configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS));
    ConfigCallBackUrl($configRouteInfoRequestUrl, $ROUTERS);
}



function ConfigCallBackUrl($configRouteInfoRequestUrl, $ROUTERS)
{
    if ($configRouteInfoRequestUrl === true) {
        $GLOBALS['configRouteInfoRequestUrl'] = $ROUTERS[$_SERVER['REQUEST_URI']];
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}
