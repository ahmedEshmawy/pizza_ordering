<?php session_start(); ?>
<?php include "../../../core/config.php"; ?>




    <?php
    //get admin id

    $id = $_GET['id'];

    $sql = "DELETE FROM `tbl_admin`WHERE `id`=$id";
    $result = $conn->prepare($sql);
    $result->execute();

    if ($result) {

        // create session variable
        $_SESSION['msg'] = "Admin Deleted Successfully";
        //redirect
        header('location:' . BURL . 'back/admin.php');
        die();
    } else {
        $_SESSION['msg'] = "Admin Not Deleted";
        //redirect
        header('location:' . BURL . 'back/admin.php');
        die();
    }





    ?>





<?php include "inc/footer.php"; ?>