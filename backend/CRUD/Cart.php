<?php
session_start();

if ($_GET['action'] === "AddCart") {
    $_SESSION['Cart'] = array();
    array_push($_SESSION['Cart'], [
        'key_id' => $_GET['key_id'],
        'key_name' => $_GET['key_name'],
        'key_picture' => $_GET['key_image'],
        'key_token' => $_GET['token'],
        'key_price' => $_GET['key_price'],
        'key_category' => $_GET['key_category'],
    ]);
    header('Location: /Shop');
}

if ($_GET['action'] === 'RemoveCart') {
    unset( $_SESSION['Cart'][$_GET['key_id']] );
  
    header('Location: /Shop-details');
}

