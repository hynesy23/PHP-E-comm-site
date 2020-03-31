<?php

// connect to database
include '../config/database.php';
 
// include objects
// include_once "../objects/product.php";
// include_once "../objects/product_image.php";
include_once "../objects/cart_item.php";
include_once "../objects/user.php";
 
// get database connection
$db = $conn;
 
// initialize objects
// $product = new Product($db);
// $product_image = new ProductImage($db);
$cart_item = new CartItem($db);
$user = new User($db);

 
$register_message = '';

$login_info = $_POST;

extract($login_info);

$user->email = $email;
$user->password = $password;

 if (!$user->login()) {

    $page_title="Oops, something went wrong";    
    
 } else {

    $page_title="Success!";

    $register_message = "<h2>Thank you for logging in. Click <a href='../misc/products.php'>here</a> to continue shopping</h2>";

 }

include '../misc/layout_head.php';

echo $register_message;

include '../misc/layout_foot.php'; ?>