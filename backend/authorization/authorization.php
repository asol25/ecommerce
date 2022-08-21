<?php
session_start();
include_once '../config/configDatabase.php';

function CheckAccountAdmin($db, $encrypt_pass, $isChecked)
{
    if ($isChecked === false) {
        unset($_SESSION['admin']);
        return CheckAccountExits($db, $encrypt_pass);
    } else {
        header('Location: /Logout');
    }
}

function CheckAccountExits($db, $encrypt_pass)
{
    $result = $db->prepare("SELECT * FROM `users` WHERE `username` = '{$_POST['key_username']}' AND
    `password` = '{$encrypt_pass}'");
    $result->execute();
    if ($result->rowCount() > 0) {
        $GLOBALS['_instant'] = $result->fetch();
        return true;
    } else {
        false;
    }
}

function ControllerRouter($encrypt_pass, $_instant)
{
    print_r('Start statement Controller -> ');
    if ($GLOBALS['_instant']['PASSWORD'] === $_SESSION['admin']) {
        print_r('Account Admin');

        unset($_SESSION['user']);
        header('Location: /');
    } else {
        print_r('Account User');
        unset($_SESSION['admin']);
        $_SESSION['user'] = $encrypt_pass;
        header('Location: /');
    }
}

function isCheckedActionLogin($db, $encrypt_pass)
{
    $isCheckedAccount = CheckAccountExits($db, $encrypt_pass);
    if ($isCheckedAccount) {
        $isUsername = $_POST['key_username'] === "admin";
        $isPassword =  $encrypt_pass === $_SESSION['admin'];
        $isCheckedAdmin = $isUsername && $isPassword;

        if ($isCheckedAdmin) {
            CheckAccountAdmin($db, $encrypt_pass, $isCheckedAdmin);
            unset($_SESSION['user']);
            header('Location: /');
        } else {
            unset($_SESSION['admin']);
            $_SESSION['user'] = $encrypt_pass;
            header('Location: /');
        }
    }
}


function isCheckedActionRegistered($db, $encrypt_pass)
{
    $isUsername = $_POST['key_username'] === "admin";
    $isPassword =  $encrypt_pass === $_SESSION['admin'];
    $isChecked = $isUsername && $isPassword;

    $ACCOUNT_EXITS = CheckAccountAdmin($db, $encrypt_pass, $isChecked);

    if (!$ACCOUNT_EXITS) {
        $ran_id = rand(time(), 100000000);
        $sql = "INSERT INTO `users`(`unique_id`,`username`, `password`) VALUES ('{$ran_id}','{$_POST['key_username']}', '{$encrypt_pass}')";
        $db->exec($sql);
        $_SESSION['users'] = $encrypt_pass;
        header('Location: /');
    }
}
function isCheckPassword($password_Check, $password)
{
    return $password == $password_Check;
}

function initialize($db)
{
    $_SESSION['admin'] = '21232f297a57a5a743894a0e4a801fc3';
    $_SESSION['user'] = null;
    $_instant = null;
    $encrypt_pass = md5($_POST['key_password']);

    if (isset($_POST['actionLoginForm'])) {
        print_r('Login -> ');
        isCheckedActionLogin($db, $encrypt_pass);
    } else {
        print_r('Register -> ');
        isCheckedActionRegistered($db, $encrypt_pass);
    }
}

var_dump($_POST);
initialize($db);
