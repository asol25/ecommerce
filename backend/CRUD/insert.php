<?php
include_once '../config/configDatabase.php';

function initialize($db)
{
    if (isset($_POST['InsertProduct']) && isset($_POST['key_name'])) {
        $sql = "INSERT INTO`loaisp` SET `TenLoai` = '{$_POST['key_name']}'";
        $res = $db->exec($sql);
    }

    if (isset($_POST['InsertManagerProduct'])) {
        $sql = "INSERT INTO `sanpham`(`TenSP`, `GiaCu`, `GiaMoi`, `HinhDaiDien`, `LoaiSP`, `MoTa`) VALUES 
    ('{$_POST['key_name']}','{$_POST['key_oddPrice']}','{$_POST['key_newPrice']}','{$_POST['key_picture']}',
    '{$_POST['key_category']}',
    '{$_POST['key_description']}')";
    $res = $db->exec($sql);
    }

    header('Location: /');
}

var_dump($_POST);
initialize($db);
