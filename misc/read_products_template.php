<?php 

    foreach ($stmt as $value) {

        extract($value); // Extracts all keys in array as variables

 
    // creating box
    echo "<div class='col-md-4 m-b-20px'>";
 
        // product id for javascript access
        echo "<div class='product-id display-none'>{$id}</div>";
 
        echo "<a href='product.php?id={$id}' class='product-link'>";

            // select and show first product image
            $product_image->product_id = $id; // $product_id is now equal to $id

            $stmt_product_image = $product_image->readFirst();

            echo "<div class='m-b-10px'>";
                    echo "<img src='../uploads/images/{$stmt_product_image}' class='w-100-pct' />";
                echo "</div>";
 
            // product name
            echo "<div class='product-name m-b-10px'>{$name}</div>";
        echo "</a>";
 
        // product price and category name
            echo "<div class='m-b-10px'>";
                echo "&#36;" . number_format($price, 2, '.', ',');
            echo "</div>";
 
            // add to cart button
            echo "<div class='m-b-10px'>";
                // cart item settings
                $cart_item->user_id = 1; // we default to a user with ID "1" for now
                $cart_item->product_id = $id;
 
                // if product was already added in the cart
                if ($cart_item->exists()) {

                    echo "<a href='cart.php?action=exists' class='btn btn-success w-100-pct'>";
                        echo "Update Cart";
                    echo "</a>";
                } else {
                    
                    echo "<a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
                }
            echo "</div>";
 
 
 
    echo "</div>";
}
 
include_once "paging.php";
?>