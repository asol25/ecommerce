<?php
session_start();

if (!isset($_SESSION['Cart'])) {
    CreateStorageCart($_SESSION['Cart']);
}

if ($_GET['action'] === "AddCart") {
    $isChecked = false;
    foreach ($_SESSION['Cart'] as $key => $value) {
        $isChecked = CheckItemInfoStorage($_GET['key_id'], $_SESSION['Cart'], $key);
    }
    if ($isChecked === false) {
        array_push($_SESSION['Cart'], [
            'key_id' => $_GET['key_id'],
            'key_name' => $_GET['key_name'],
            'key_picture' => $_GET['key_picture'],
            'key_token' => $_GET['token'],
            'key_price' => $_GET['key_price'],
            'key_category' => $_GET['key_category'],
        ]);
    }
    header('Location: /Shop');
}

if ($_GET['action'] === 'RemoveCart') {
    unset($_SESSION['Cart'][$_GET['key_id']]);
    header('Location: /Shop-details');
}

function CheckItemInfoStorage($id, $storage, $key)
{
    return in_array($id, array_values($storage[$key]));
}

function CreateStorageCart($storage)
{
    return $storage = array();
}
