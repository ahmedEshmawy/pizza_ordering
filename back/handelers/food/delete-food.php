<?php session_start(); ?>
<?php include "../../../core/config.php"; ?>




    <?php
    //get food id and image
    if (isset($_GET['id']) && isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove physical image file 
        $image_path = "../../../" . $image_name;

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        //remove data from database
        $sql = "DELETE FROM `tbl_food`WHERE `id`=$id";
        $result = $conn->prepare($sql);
        $result->execute();

        if ($result) {

            // create session variable
            $_SESSION['msg'] = "Food Deleted Successfully";
            //redirect
            header('location:' . BURLA . 'food.php');
            die();
        } else {
            $_SESSION['msg'] = "Food Not Deleted";
            //redirect
            header('location:' . BURLA . 'food.php');
            die();
        }
    } else {
        header('location:' . BURLA . 'food.php');
        die();
    }


    include "inc/footer.php";


    ?>