<?php session_start(); ?>
<?php include "../../../core/config.php";

//get admin data
$id = $_GET['id'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
//sql 
$sql = "UPDATE `tbl_admin` SET `full_name`= ? ,`user_name`= ? WHERE `id` = $id";
$result = $conn->prepare($sql);
$result->execute([$fullname, $username]);

if ($result) {
    //create session.
    $_SESSION['msg'] = "Admin Updated Successfully";
    //redirect
    header("location:" . BURLA . "admin.php");
    die();
} else {
    $_SESSION[''] = " Update Admin Failed ";
    //redirect
    header('location:' . BURLA . 'admin-edite.php');
    die();
}







?>