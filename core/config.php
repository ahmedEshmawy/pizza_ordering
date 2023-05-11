<?php
//home page
define("BURL", "http://localhost/food-order/");
define("BURLA", "http://localhost/food-order/back/");

$localhost = "localhost";
$dbname = "pizza-order";
$user = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$localhost;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB connected ";
} catch (PDOException $ex) {
    echo "Connection Failed ! " . $ex->getMessage();
    die;
}


// define("ASSETS", "http://localhost/webRegisteration/assets/");


//Basic Link to start from  project folder
// define("proLink", __DIR__ . "/");
//define("proLinkA", __DIR__ . "/admin/");
