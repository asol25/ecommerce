<?php
include_once './connect.php';

function initialize($db)
{
    if (isset($_POST['ModifyProduct']) && isset($_POST['key_name']) && isset($_POST['key_id'])) {
        $sql = "UPDATE `loaisp` SET `TenLoai` = '{$_POST['key_name']}' WHERE `MaLoai` = '{$_POST['key_id']}'";
        $response = $db->exec($sql);
        return $response;
    }


    if (isset($_POST['ModifyManagerProduct']) && isset($_POST['key_name']) && isset($_POST['key_id'])) {
        $sql = "UPDATE `sanpham` SET `TenSP`='{$_POST['key_name']}',`GiaCu`='{$_POST['key_oddPrice']}',
        `GiaMoi`='{$_POST['key_newPrice']}',`HinhDaiDien`='{$_POST['key_picture']}',`LoaiSP`='{$_POST['key_category']}',
        `MoTa`='{$_POST['key_description']}' WHERE MaSP = '{$_POST['key_id']}'";
        $response = $db->exec($sql);
        return $response;
    }
}

var_dump($_POST);
initialize($db);
header('Location: /');
