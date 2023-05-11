<?php
session_start();
include "../../core/config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    //get the values from the form
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    //check if username and password exists in DB

    $sql = "SELECT*FROM `tbl_admin` WHERE `user_name`=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    $data = $stmt->fetchObject();
    //var_dump($data);

    if ($data) {
        $check = password_verify($password, $data->password);
        if ($check) {
            $_SESSION['msg'] = "Login Successfull";
            $_SESSION['auth'] = $username;
            //redirect to home page
            header('location:' . BURLA . 'index.php');
            die();
        } else {
            //session not successfull
            $_SESSION['msg'] = "User Name or Password not Correct";
            //redirect to login page
            header('location:' . BURLA . 'login.php');
            die();
        }
    } else {
        $_SESSION['msg'] = "Data Not Found";
        //redirect to login page
        header('location:' . BURLA . 'login.php');
        die();
    }
} else {
    $_SESSION['msg'] = "Method Not Allowed";
    //redirect to login page
    header('location:' . BURLA . 'login.php');
    die();
}
