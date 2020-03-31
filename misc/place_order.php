<?php
// include classes
include_once "../config/database.php";
include_once "../objects/cart_item.php";
include '../gateway_info/callback_hash.php';
 
// get database connection
$db = $conn;
 
// initialize objects
$cart_item = new CartItem($db);
 
// remove all cart item by user, from database
$cart_item->user_id = 1; // we default to '1' because we do not have logged in user
$cart_item->deleteByUser();

 
// set page title
$page_title = "Thank You!";

$FirstName = explode(" ", $_POST["CustomerName"])[0];
 
// include page header HTML
include_once 'layout_head.php';

if (!$HashDigest == $gw_response["HashDigest"]) {

    echo "<div class='col-md-12'>";
    // tell the user hash has failed
    echo "<div class='alert alert-danger'>";
        echo "<strong>Warning!</strong>Hash Digest does not match";
    echo "</div>";
echo "</div>";

} else {

    echo "<div class='col-md-12'>";
        // tell the user order has been placed
        echo "<div class='alert alert-success'>";
            echo "<strong>Your order has been placed ${FirstName}!</strong> Thank you very much!";
        echo "</div>";
    echo "</div>";
    
    echo "<ul>";
    
        echo "<li>Customer name: {$_POST["CustomerName"]}</li>";
        echo "<li>Order ID: {$_POST["OrderID"]}</li>";
        echo "<li>{$_POST["Message"]}</li>";
        echo "<li>Status Code: {$_POST["StatusCode"]}</li>";
    
    echo "</ul>";

}


 
 
// include page footer HTML
include_once 'layout_foot.php';