<body>
    <title>Sửa sản phẩm </title>
    <table class='table table-striped table-bordered table-dark table-hover'>
        <?php
        echo '<form method="post" action="' . $modifyAPI . '">
   <thead>
       <tr>
           <th scope="col"`>Mã Loại</th>
           <th scope="col"`>Tên Loại</th>
           <th scope="col"`>Thực hiện</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td><input type="text" value="" class="form-control" name="key_id"></td>
           <td><input type="text" value="" class="form-control" name="key_name"></td>
           <td><button class="btn btn-info" name="modifyProduct">Cập nhật</button></td>
       </tr>
   </tbody>
</form>';
        ?>
    </table>
</body>

</html>