<?php
session_start();
include_once '../config/configDatabase.php';

function initialize($db)
{
    $_SESSION['admin'] = '21232f297a57a5a743894a0e4a801fc3';
    $_instant = null;
    $encrypt_pass = md5($_POST['key_password']);
    if (isset($_POST['actionLoginForm'])) {
        $result = $db->prepare("SELECT * FROM `users` WHERE `username` = '{$_POST['key_username']}' AND
         `password` = '{$encrypt_pass}'");
        $result->execute();
        $_instant = $result->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['actionRegisterForm'])) {
        if ($encrypt_pass !== $_SESSION['admin']) {
            $ran_id = rand(time(), 100000000);
            $sql = "INSERT INTO `users`(`unique_id`,`username`, `password`) VALUES ('{$ran_id}','{$_POST['key_username']}', '{$encrypt_pass}')";
            $_instant = $db->exec($sql);
        } else {
            header('Location: /Logout');
        }
    }

    if ($_instant['PASSWORD'] === $_SESSION['admin']) {
        $_SESSION['admin'] =  $encrypt_pass;
        header('Location: /');
    }
    // var_dump($encrypt_pass != $_SESSION['admin']);
}

function isCheckPassword($password_Check, $password)
{
    return $password == $password_Check;
}


// var_dump($_POST);
initialize($db);
