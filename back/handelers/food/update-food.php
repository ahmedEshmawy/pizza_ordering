<?php session_start(); ?>
<?php include "../../../core/config.php";

if (isset($_POST['update'])) {

    //get food data
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
  

    $sql1 = "SELECT * FROM `tbl_food` WHERE `id` = $id ";
    $result1 = $conn->prepare($sql1);
    $result1->execute();
    $row = $result1->fetch();


    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        //upload Image
        $image = date('Y-m-d-H-i-s') . '.png';
        //path from root to save image + image name
        $saved = 'uploads/food/' . $image;
        //folder to save image from this file
        $target_dir = '../../../uploads/food/';
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



   // update data in food table
    //sql 
    $sql = "UPDATE `tbl_food` SET
            `title`='$title',
            `description` ='$description',
            `image_name` = '$saved',
            `price` = '$price',
            `category_id`= '$category_id',
            `active` = '$active',
            `featured`= '$featured' WHERE `id` = $id";
    $result = $conn->prepare($sql);
    $result->execute();
  

    if ($result) {
        //create session.
        $_SESSION['msg'] = "Food Updated Successfully";
        //redirect
        header("location:" . BURLA . "food.php");
        die();
    } else {
        $_SESSION[''] = " Update Food Failed ";
        //redirect
        header('location:' . BURLA . 'food-edite.php');
        die();
    }
}







?>