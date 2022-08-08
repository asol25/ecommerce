<?php
include_once '../config/configDatabase.php';

function CheckIsEmpty($key)
{
    return empty($key);
}

function initialize($db)
{
    $isEmpty = false;
    if (isset($_POST['ModifyProduct']) && isset($_POST['key_id'])) {
        $array = [
            'key_name' => $_POST['key_name']
        ];

        foreach ($array as $key => $value) {
            $isEmpty = CheckIsEmpty($value);
        };

        if ($isEmpty === false) {
            $sql = "UPDATE `loaisp` SET `TenLoai` = '{$_POST['key_name']}' WHERE `MaLoai` = '{$_POST['key_id']}'";
            $response = $db->exec($sql);
        }
    }

    if (isset($_POST['ModifyManagerProduct']) && isset($_POST['key_id'])) {

        $array = [
            'key_name' => $_POST['key_name'],
            'key_oddPrice' => $_POST['key_odd_price'],
            'key_newPrice' => $_POST['key_new_price'],
            'key_picture' => $_POST['key_picture'],
            'key_category' => $_POST['key_category'],
            'key_description' => $_POST['key_description'],
        ];

        foreach ($array as $key => $value) {
            $isEmpty = CheckIsEmpty($value);
        };

        if ($isEmpty === false) {
            $sql = "UPDATE `sanpham` SET `TenSP`='{$_POST['key_name']}',`GiaCu`='{$_POST['key_oddPrice']}',
            `GiaMoi`='{$_POST['key_newPrice']}',`HinhDaiDien`='{$_POST['key_picture']}',`LoaiSP`='{$_POST['key_category']}',
            `MoTa`='{$_POST['key_description']}' WHERE MaSP = '{$_POST['key_id']}'";
            $response = $db->exec($sql);
        }
    }

    header('Location: /');
}

var_dump($_POST);
initialize($db);
