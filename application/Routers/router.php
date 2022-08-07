<?php
$ROUTERS = [
    "/" => "client/products/Products.php",
    "/AddProduct" => "client/products/InsertProduct.php",
    "/ModifyProduct" => "client/products/ModifyProduct.php",
    "/ManagerProduct" => "client/managerProducts/ManagerProduct.php",
    "/ManagerDetailsProduct" => "client/managerDetailsProduct/ManagerDetailsProduct.php",
    "/ModifyManagerProduct" => "client/ModifyManagerProduct.php",
    "/Logout" => "client/account/Logout"
];

$configRouteToModifyProduct = '/ModifyProduct';
$configRouteToModifyManagerProduct = "/ModifyManagerProduct";

$configRouteInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($ROUTERS));
if ($configRouteInfoRequestUrl) {
    $configRouteInfoRequestUrl = $ROUTERS[$_SERVER['REQUEST_URI']];
}

?>
