<?php 

// connect to database
include '../config/database.php';
 
// include objects
include_once "../objects/product.php";
include_once "../objects/product_image.php";
include_once "../objects/cart_item.php";
 
// get database connection
$db = $conn;
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);
 
// set page title
$page_title="Login";

include '../misc/layout_head.php';

?>

<form action="login_success.php" method="POST">
<div class="form-group">
<label for="">Email: </label>
<input type="text" class="form-control w-35-pct" name="email" id="" required>
<label for="">Password: </label>
<input type="password" class="form-control w-35-pct" name="password" id="" required>
</div>
<button type='submit' class='btn btn-primary m-t-10px'>Login</button>
</form>

<?php include '../misc/layout_foot.php';