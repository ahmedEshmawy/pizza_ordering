<?php session_start(); ?>
<?php include "../../../core/config.php";
?>

<?php
 if (isset($_POST['update'])) {
    //get values from Form
    $id = $_GET['id'];
    $food_title = $_POST['food_title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total= $price * $qty;
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    //update data in order table
    $sql = "UPDATE `tbl_order` SET
            qty = '$qty',
            total = '$total',
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address' WHERE `id` = $id";
    $result = $conn->prepare($sql);
    $result->execute();
    //redirect with session msg to order.php
    if ($result) {
        //create session.
        $_SESSION['msg'] = "Order Updated Successfully";
        //redirect
        header("location:" . BURLA . "order.php");
        die();
    } else {
        $_SESSION['msg'] = " Order Update Failed ";
        //redirect
        header('location:' . BURLA . 'order-edit.php');
        die();
    }
 }
?>