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

$pathRouter = $_SERVER['REQUEST_URI'] ?? '/';
$position = strpos($pathRouter, "?");

$configRouteInfoRequestUrl = null;

if (isset($_SESSION['admin'])) {
    $configRouteInfoRequestUrl = in_array($pathRouter, array_keys($ROUTERS_ADMIN));
    ConfigCallBackRedirectUrl($ROUTERS_ADMIN);
} else {
    if ($position) {
        $GLOBALS['pathRouter'] = substr($pathRouter, 0, $position);
    }
    $configRouteInfoRequestUrl = in_array($pathRouter, array_keys($ROUTERS_USERS));
    ConfigCallBackRedirectUrl($ROUTERS_USERS);
}

function ConfigCallBackRedirectUrl($ROUTERS)
{
    $successful = 200;
    $notFound = 404;
    if ($GLOBALS['configRouteInfoRequestUrl'] === true) {
        $GLOBALS['configRouteInfoRequestUrl'] = setRedirectUrl($ROUTERS, $GLOBALS['configRouteInfoRequestUrl'], $GLOBALS['pathRouter']);
        http_response_code($successful);
    } else {
        http_response_code($notFound);
    }
}

function setRedirectUrl($ROUTERS, $router, $path)
{
    return $router = $ROUTERS[$path];
}
