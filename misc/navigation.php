<?php 

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    // unset($_SESSION["username"]);
}
?>

<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../misc/products.php">Want Tees?</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
 
                <!-- highlight if $page_title has 'Products' word. -->
                <li <?= strpos($page_title, "Product") !== false ? "class='active'" : ""; ?>>
                    <a href="../misc/products.php">Products</a>
                </li>
 
                <li <?= $page_title === "Cart" ? "class='active'" : ""; ?> >
                    <a href="../misc/cart.php">
                    <?php
                        // count products in cart
                        $cart_item->user_id = 1; // default to user with ID "1" for now
                        $cart_count = $cart_item->count();
                    ?>
                    Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
                <li <?= $page_title === "Login" ? "class='active'" : ""; ?>><a href="../user/login.php">Login</a></li>
                <li <?= $page_title === "Register" ? "class='active'" : ""; ?>><a href="../user/register.php">Register</a></li>
                <li><a href="../user/register.php" style="float: right;">Welcome, <?=$_SESSION["username"]?></a></li>

                </ul>
 
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->

