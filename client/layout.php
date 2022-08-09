<?php
?>

<body>
    <style>
        .container {
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
    <div class="container">
        <header style="text-align: center;">
            <h1>Trang quản lí sản phẩm SGM</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="/">Quản lí loại</a></li>
                <li><a href="ManagerProduct">Quản lí sản phẩm</a></li>
                <li><a href="ManagerCustomer">Quản lí khách hàng</a></li>
                <li><a href="ManagerDetailsProduct">Quản lí đơn hàng</a></li>
                <?php
                if (isset($_SESSION['admin'])) {
                    echo '<li><a href="Logout">Logout</a></li>';
                } else {
                    header('Location: /');
                }
                ?>
            </ul>
        </nav>

        <article>
            <?php include_once dirname(dirname(__FILE__)) . "/$configRouteInfoRequestUrl"; ?>
        </article>
        <footer>Design By Chuong 2K12</footer>
    </div>
</body>