<?php
include_once './connect.php';
function initialize($db)
{
    if (isset($_GET['key_id']) && $_GET['action'] === 'deleteActionProduct') {
        $sql = "DELETE FROM `loaisp` WHERE `maloai` ='{$_GET['key_id']}'";
        $res = $db->exec($sql);
    }

    if (isset($_GET['key_id']) && $_GET['action'] === 'deleteActionManagerProduct') {
        $sql = "DELETE FROM `sanpham` WHERE `MaSP` ='{$_GET['key_id']}'";
        $res = $db->exec($sql);
    }

    header('Location: /');
}

initialize($db);
var_dump($_GET);

