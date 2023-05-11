<?php session_start(); ?>
<?php include "../../../core/config.php"; ?>




    <?php
    //get category id and image
    if (isset($_GET['id']) && isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove physical image file 
        $image_path = "../../../" . $image_name;

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        //remove data from database
        $sql = "DELETE FROM `tbl_category`WHERE `id`=$id";
        $result = $conn->prepare($sql);
        $result->execute();

        if ($result) {

            // create session variable
            $_SESSION['msg'] = "Category Deleted Successfully";
            //redirect
            header('location:' . BURLA . 'category.php');
            die();
        } else {
            $_SESSION['msg'] = "Category Not Deleted";
            //redirect
            header('location:' . BURLA . 'category.php');
            die();
        }
    } else {
        header('location:' . BURLA . 'category.php');
        die();
    }








    ?>





<?php include "inc/footer.php";
?>