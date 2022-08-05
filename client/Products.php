<?php
$sql = "SELECT * FROM `loaisp`";
$results = $db->query($sql);
?>

<body>
    <table class="table table-collapse">
        <tr>
            <td class="col-md-3">Mã Loại </td>
            <td class="col-md-3">Loại Sản Phẩm</td>
            <td class="col-md-3"><a href="AddProduct">Thêm</a></td>
        </tr>
        <?php
        $urlModify = '/ModifyProduct';

        while ($row = $results->fetch()) {
            $id = $row['MaLoai'];
            $url = "$deleteAPI?key_id=$id&action=";

            echo ' <tr>
            <td>' . $row[0] . '</td>
            <td>' . $row[1] . '</td>
            <td><a href="' . $urlModify . '">Edit</a></td>
            <td><a href="' . $url .  $deleteActionProduct . '">Delete</a></td>
        </tr>';
        } ?>
    </table>
</body>

</html>