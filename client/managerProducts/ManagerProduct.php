<?PHP
include_once './header.php';
include_once("connect.php");

$sql = "SELECT * FROM sanpham";
$result = $db->query($sql);

$configRouterToInsertManagerProduct = 'InsertManagerProduct';
?>

<body>
    <?php echo ' <a type="button" class="btn btn-lg btn-primary" href="' . $configRouterToInsertManagerProduct . '">Thêm</a>' ?>
    <!-- <a type="button" class="btn btn-secondary btn-lg">Xóa</a> -->
    <table class="table">
        <tr>
            <td scope="col">Mã Sản Phẩm</td>
            <td scope="col">Tên Sản Phẩm</td>
            <td scope="col">Ảnh Đại Diện</td>
            <td scope="col">Giá Cũ</td>
            <td scope="col">Giá Mới</td>
            <td scope="col">Loại Sản Phẩm</td>
            <td scope="col">Mô Tả</td>
            <td scope="col">Chỉnh Sữa</td>

        </tr>
        <?php

        while ($row = $result->fetch()) {
            $id = $row['MaSP'];
            $configRequestToDelete = "$requestDeleteAPI?key_id=$id&action=$deleteActionManagerProduct";

            echo '<tr>
            <td>' . $row['MaSP'] . '</td>
            <td>' . $row['TenSP'] . '</td>
            <td><img src="' . $row['HinhDaiDien'] . '" style="width:70px;height:70px;" alt=""></td>
            <td>' . $row['GiaCu'] . '</td>
            <td>' . $row['GiaMoi'] . '</td>
            <td>' . $row['LoaiSP'] . '</td>
            <td>' . $row['MoTa'] . '</td>
            <td>
                <a style="color: red;" href="' . $configRouteToModifyManagerProduct . '">Edit</a>
                <a style="color: red;" href="' . $configRequestToDelete . '">Delete</a>
            </td>
            </tr>';
        }
        ?>
    </table>
</body>

</html>