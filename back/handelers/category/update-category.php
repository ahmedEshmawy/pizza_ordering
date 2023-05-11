<?php session_start(); ?>
<?php include "../../../core/config.php";

if (isset($_POST['update'])) {

    //get category data
    $id = $_GET['id'];
    $title = $_POST['title'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    $sql1 = "SELECT * FROM `tbl_category` WHERE `id` = $id ";
    $result1 = $conn->prepare($sql1);
    $result1->execute();
    $row = $result1->fetch();


    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        //upload Image
        $image = date('Y-m-d-H-i-s') . '.png';
        //path from root to save image + image name
        $saved = 'uploads/category/' . $image;
        //folder to save image from this file
        $target_dir = '../../../uploads/category/';
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        // delete previous image
        //remove physical image file 
        $image_path = "../../../" . $row['image_name'];

        if (file_exists($image_path)) {
            unlink($image_path);
        }
    } else {
        $saved = $row['image_name'];
    }

    // var_dump($saved);
    // var_dump($row['image_name']);
    // var_dump($current_image);

    // die;


    //sql 
    $sql = "UPDATE `tbl_category` SET
     `title`= ? ,
     `image_name`= ?,
     `featured` = ?,
     `active`=?
      WHERE `id` = $id";
    $result = $conn->prepare($sql);
    $result->execute([$title, $saved, $featured, $active]);



    if ($result) {
        //create session.
        $_SESSION['msg'] = "Category Updated Successfully";
        //redirect
        header("location:" . BURLA . "category.php");
        die();
    } else {
        $_SESSION[''] = " Update Category Failed ";
        //redirect
        header('location:' . BURLA . 'category-edite.php');
        die();
    }
}







?>