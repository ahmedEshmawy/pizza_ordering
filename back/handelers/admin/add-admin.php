<?php
session_start();
include "../../../core/config.php";

$msg = [];

if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    //validations
    //insert data to database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `tbl_admin`( `full_name`, `user_name`, `password`) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fullname, $username, $hashedPassword]);


    if ($stmt) {
        //store data to session
        // create session variable
        $_SESSION['msg'] = "Admin added Successfully";

        //redirect to admin page
        header('location:' . BURLA . 'admin.php');
        die();
    } else {
        // create session variable
        $_SESSION['msg'] = "Add Admin Failed";

        //redirect to add admin page
        header('location:' . BURLA . 'add-admin.php');
        die();
    }
}
