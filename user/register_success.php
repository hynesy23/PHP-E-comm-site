<?php

// connect to database
include '../config/database.php';
 
// include objects
include_once "../objects/product.php";
include_once "../objects/product_image.php";
include_once "../objects/cart_item.php";
include_once "../objects/user.php";
 
// get database connection
$db = $conn;
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);
$user = new User($db);
 
$reg_errors = array();
$reg_vars = array();
$register_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $user_info = $_POST;
   
   extract($user_info);

   if (preg_match ('/^[A-Z \'.-]{2,45}$/i', $name)) {

      $user->name = filter_var($name, FILTER_SANITIZE_STRING);
      $reg_vars["name"] = $name;

   } else {

      $reg_errors["name"] = 'Please enter your name';

   }

   if (strlen($username) > 0) {

      $user->username = filter_var($username, FILTER_SANITIZE_STRING);
      $reg_vars["username"] = $username;

   } else {

      echo "Echo of " . $username . " thats not valid";

      $reg_errors["username"] = 'Please enter a valid username';

   }
   
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $user->email = filter_var($email, FILTER_VALIDATE_EMAIL);
      $reg_vars["email"] = $email;

   } else {

      $reg_errors["email"] = 'Please enter a valid email';

   }

   if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password1)) {

     if ($password1 === $password2) {
   
      $user->password = $password1;

     } else {

      $reg_errors["password2"] = "Your password did not match confirmed password!";
     }        

   } else {

      $reg_errors["password1"] = "Please enter a valid password!";

   }

   if (!empty($reg_errors)) {

      echo "The register array is not empty";
      $page_title = 'Register';
      
   } else {
      
      if ($user->register() === 'Username exists') {         
         
         $page_title = "Oops, something went wrong"; 
         $reg_errors["username"] = 'Username already exists';
            
         echo "Registration failed";
         
      } else {
      
         $page_title="Success!";
      
         $register_message = "<h2>Thank you for registering. Click <a href='../misc/products.php'>here</a> to continue shopping</h2>";
      
      }

   }

   }

var_dump($reg_errors);
var_dump($reg_vars);

 ?>