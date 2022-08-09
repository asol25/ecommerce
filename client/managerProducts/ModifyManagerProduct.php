<?php 
session_start();
?>
<body>
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
        echo '<form method="post" action="' . $requestModifyAPI . '">
        <tbody>
            <td>
                <input type="text" name="key_id">
            </td>
            <td>
                <input type="text" name="key_name">
            </td>
            <td>
                <input type="text" name="key_oddPrice">
            </td>
            <td>
                <input type="text" name="key_newPrice">
            </td>
            <td>
                <input type="text" name="key_picture">
            </td>
            <td>
                <input type="text" name="key_category">
            </td>
            <td>
                <input type="text" name="key_description">
            </td>
            <td>
                <button name="ModifyManagerProduct">Update</button>
            </td>
        </tbody>
        </form>'
        ?>
</body>