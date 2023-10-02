<?php session_start();?>
<?php include "../core/config.php";

$msg = [];

if(isset($_POST['submit'])){
    $food_title = $_POST['food_title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $order_date = date('Y-m-d H:i:s');
    $status = "Ordered";//"Ordered"/"On delivery"/"Delivered"/"Cancelled"
    $customer_name = $_POST['fullName'];
    $customer_contact = $_POST['phone'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    
    //insert data to database

    
    $sql = "INSERT INTO tbl_order SET 
            food_title ='$food_title',
            price ='$price',
            qty = '$qty',
            total = '$total',
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt) {
        //store data to session
        // create session variable
        $_SESSION['msg'] = "Order saved  Successfully";

        //redirect to Home page
        header('location:' . BURL . 'menu.php');
        die();
    } else {
        // create session variable
        $_SESSION['msg'] = "Add Order Failed";

        // redirect to add Home page
        header('location:' . BURL . 'order.php');
        die();
    }
  


}





?>