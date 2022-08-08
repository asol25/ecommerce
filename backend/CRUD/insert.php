<?php
include_once '../config/configDatabase.php';

function initialize($db)
{
    if (isset($_POST['InsertProduct']) && isset($_POST['key_name'])) {
        $sql = "INSERT INTO`loaisp` SET `TenLoai` = '{$_POST['key_name']}'";
        $res = $db->exec($sql);
    }

    // if (isset($_POST['InsertManagerProduct']) && isset($_POST['key_name']) && isset($_POST['key_id'])) {
    //     $sql = "UPDATE `sanpham` SET `TenSP`='{$_POST['key_name']}',`GiaCu`='{$_POST['key_oddPrice']}',`GiaMoi`='{$_POST['key_newPrice']}',`HinhDaiDien`='{$_POST['key_picture']}',`LoaiSP`='{$_POST['key_category']}',`MoTa`='{$_POST['key_description']}' WHERE MaSP = '{$_POST['key_id']}'";
    //     $res = $db->exec($sql);
    // }

    if (isset($_POST['InsertManagerProduct'])) {
    $sql = "INSERT INTO `sanpham`(`TenSP`, `GiaCu`, `GiaMoi`, `HinhDaiDien`, `LoaiSP`, `MoTa`) VALUES 
    ('{$_POST['key_name']}','{$_POST['key_oddPrice']}','{$_POST['key_newPrice']}','{$_POST['key_avt']}',
    '{$_POST['key_category']}',
    '{$_POST['key_description']}')";
    $res = $db->exec($sql);
    }

    header('Location: /');
}

var_dump($_POST);
initialize($db);
