<?php
session_start();
include "../../../core/config.php";

$msg = [];

if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    //validations
    //check if radio buttons is clicked or not 
    if (!isset($_POST['featured'])) {
        $featured = 'no';
    }
    if (!isset($_POST['active'])) {
        $active = 'no';
    }
    //check if image is selected
    // print_r($_FILES['image']);

    // die;
    if (isset($_FILES['image']['name'])) {
        //upload Image
        $image = date('Y-m-d-H-i-s') . '.png';
        //path from root to save image + image name
        $saved = 'uploads/food/' . $image;
        //folder to save image from this file
        $target_dir = '../../../uploads/food/';
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }


    //insert data to database

    $sql = "INSERT INTO tbl_food SET 
            `title`='$title',
            `description` ='$description',
            `image_name` = '$saved',
            `price` = $price,
            `category_id`= $category,
            `active` = '$active',
            `featured`= '$featured'
            ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //$stmt->execute([$title, $featured,$image, $active]);


    if ($stmt) {
        //store data to session
        // create session variable
        $_SESSION['msg'] = "Food added Successfully";

        //redirect to admin page
        header('location:' . BURLA . 'food.php');
        die();
    } else {
        // create session variable
        $_SESSION['msg'] = "Add Food Failed";

        // redirect to add admin page
        header('location:' . BURLA . 'add-food.php');
        die();
    }
}
