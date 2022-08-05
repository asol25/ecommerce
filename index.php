<?php
include_once dirname(dirname(__FILE__)) . '/fix/client/header.php';
include_once dirname(dirname(__FILE__)) . '/fix/backend/connect.php';

$PORT_SERVER = $_SERVER['SERVER_PORT'];
$localhost = "http://localhost:" . $PORT_SERVER;

$deleteActionProduct = 'deleteActionProduct';
$deleteActionManagerProduct = 'deleteActionManagerProduct';

$modifyAPI = "$localhost/backend/modify.php";
$deleteAPI = "$localhost/backend/delete.php";
$insertAPI = "$localhost/backend/insert.php";

$PATH = [
    "/" => "client/Products.php",
    "/ManagerProduct" => "client/ManagerProduct.php",
    "/ManagerDetailsProduct" => "client/ManagerDetailsProduct.php",
    "/ModifyProduct" => "client/ModifyProduct.php",
    "/ModifyManagerProduct" => "client/ModifyManagerProduct.php",
    "/AddProduct" => "client/AddProduct.php",
    "/Logout" => "client/Logout"
];

$configPathInfoRequestUrl = in_array($_SERVER['REQUEST_URI'], array_keys($PATH));
if ($configPathInfoRequestUrl) {
    $configPathInfoRequestUrl = $PATH[$_SERVER['REQUEST_URI']];
}
?>

<body>
    <style>
        .main {
            width: 50%;
            margin: 0 auto;
        }

        .menu {
            list-style: none;
            display: flex;
            height: 50px;
            background-color: aquamarine;
            line-height: 50px;
            text-align: center;
        }

        nav {}

        nav li a {
            text-decoration: none;
            padding: 10px 10px;

        }

        table {
            width: 100%;
        }
    </style>

    <div class="main">
        <header style="text-align: center;">
            <h1>Trang quản lí sản phẩm SGM</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="/">Quản lí loại</a></li>
                <li><a href="ManagerProduct">Quản lí sản phẩm</a></li>
                <li><a href="ManagerCustomer">Quản lí khách hàng</a></li>
                <li><a href="ManagerDetailsProduct">Quản lí đơn hàng</a></li>
                <li><a href="Logout">Logout</a></li>
            </ul>
        </nav>

        <article>
            <?php include_once dirname(dirname(__FILE__)) . "/fix/$configPathInfoRequestUrl" ?>
        </article>

        <footer>Design By Chuong 2K12</footer>
    </div>

</body>

</html>