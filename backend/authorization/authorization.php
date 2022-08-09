<?php
include_once '../config/configDatabase.php';

function initialize($db)
{
    if ($_POST['actionInfoLogin']) {
        $encrypt_pass = md5($_POST['key_password']);
        $sql = "SELECT * FROM `user` WHERE `username` = '{$_POST['key_name']}'";
        $res = $db->exec($sql);
        $row = mysqli_num_rows($res);

        if (!isCheckPassword($row['password'],  $encrypt_pass)) {
            header('Location: /Register');
        }
        $_SESSION['username'] =  $encrypt_pass;
    }

    if ($_POST['actionInfoRegisters']) {
        $encrypt_pass = md5($_POST['key_password']);
        $ran_id = rand(time(), 100000000);
        $sql = "INSERT INTO `user`(`unique_id`,`username`, `password`) VALUES ('{$ran_id} ','{$_POST['key_name']}', '{$encrypt_pass}')";
        $res = $db->exec($sql);
        if(isset($res)) {
            $sql = "SELECT * FROM `user` WHERE `unique_id` = '{$ran_id}'";
            $res = $db->exec($sql);
        }
    }

    // header('Location: /');
}

function isCheckPassword($password_Check, $password)
{
    return $password == $password_Check;
}


var_dump($_POST);
initialize($db);
