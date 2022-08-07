<?PHP
include_once './header.php';
include_once("connect.php");

$sql = "SELECT * FROM sanpham";
$result = $db->query($sql);
?>

<body>
    <button type="button" class="btn btn-lg btn-primary" disabled>Thêm</button>
    <button type="button" class="btn btn-secondary btn-lg" disabled>Xóa</button>
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
        $configRouteToModify = "/ModifyManagerProduct";

        while ($row = $result->fetch()) {
            $id = $row['MaSP'];
            $configRequestToDelete = "$deleteAPI?key_id=$id&action=$deleteActionManagerProduct";

            echo '<tr>
            <td>' . $row['MaSP'] . '</td>
            <td>' . $row['TenSP'] . '</td>
            <td><img src="' . $row['HinhDaiDien'] . '" style="width:70px;height:70px;" alt=""></td>
            <td>' . $row['GiaCu'] . '</td>
            <td>' . $row['GiaMoi'] . '</td>
            <td>' . $row['LoaiSP'] . '</td>
            <td>' . $row['MoTa'] . '</td>
            <td>
                <a style="color: red;" href="' . $configRouteToModify . '">Edit</a>
                <a style="color: red;" href="' . $configRequestToDelete . '">Delete</a>
            </td>
            </tr>';
        }
        ?>
    </table>
</body>

</html>