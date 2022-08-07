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

        while ($row = $results->fetch()) {
            $id = $row['MaLoai'];
            $configRequestToDelete = "$deleteAPI?key_id=$id&action=$deleteActionProduct";

            echo ' <tr>
            <td>' . $row[0] . '</td>
            <td>' . $row[1] . '</td>
            <td><a href="' . $configRouteToModifyProduct . '">Edit</a></td>
            <td><a href="' . $configRequestToDelete  . '">Delete</a></td>
        </tr>';
        } ?>
    </table>
</body>

</html>