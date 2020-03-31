<?php 
session_start();

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
$page_title = "Register";

include 'register_success.php';

include '../misc/layout_head.php';


?>

<?php if (strlen($register_message) === 0): ?>
<form action="register.php" method="POST">
<div class="form-group">
<label for="">Name: </label>
<input type="text" class="form-control w-35-pct" name="name" id="" required value="<?= isset($reg_vars["name"]) ? $reg_vars["name"] : ''?>">
<?php if (isset($reg_errors["name"])): ?><span style="color: red;"><?=$reg_errors["name"]?></span></br></br> <?php endif; ?>
<label for="">Username: </label>
<input type="text" class="form-control w-35-pct" name="username" id="" required value="<?= isset($reg_vars["username"]) ? $reg_vars["username"] : ''?>">
<?php if (isset($reg_errors["username"])): ?><span style="color: red;"><?=$reg_errors["username"]?></span></br></br> <?php endif; ?>
<label for="">Email: </label>
<input type="text" class="form-control w-35-pct" name="email" id="" required value="<?= isset($reg_vars["email"]) ? $reg_vars["email"] : ''?>">
<?php if (isset($reg_errors["email"])): ?><span style="color: red;"><?=$reg_errors["email"]?></span></br></br> <?php endif; ?>
<label for="">Password: </label>
<input type="password" class="form-control w-35-pct" name="password1" id="" required>
<?php if (!isset($reg_errors["password1"])): ?>
<span class="">Must be at least 8 characters long, with at least one number and one letter </span></br></br>
<?php else: ?>
<span style="color: red;"><?=$reg_errors["password1"]?></span></br></br>
<?php endif ?>
<label for="">Confirm Password: </label>
<input type="password" class="form-control w-35-pct" name="password2" id="" required>
<?php if (isset($reg_errors["password2"])): ?> <span style="color: red;"><?=$reg_errors["password2"]?></span></br></br> <?php endif; ?>
</div>
<button type='submit' class='btn btn-secondary btn-outline-secondary m-t-10px'>Register</button>
</form>
<?php else: 

    $_SESSION["username"] = $username;

    echo $register_message; 

endif; ?>


<?php 
include '../misc/layout_foot.php';
session_destroy();
?>