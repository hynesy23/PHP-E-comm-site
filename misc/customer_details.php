<?php 
// connect to database
include '../config/database.php';

// // include all necessary vars for form
include '../gateway_info/vars.php';
 
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

$page_title = "Your Details";

// include page header HTML
include_once 'layout_head.php';

$total = $_POST["total"];

?>

<h2>Please provide the info below:</h2></br>
<form method="POST" action="../gateway_info/process.php">
<div class="form-group">
  <input type="hidden" name="MerchantID" value="<?= $mid ?>">
  <input type="hidden" class="form-control w-10-pct" name="Amount" value="<?= $total *= 100 ?>">
  <input type="hidden" name="CurrencyCode" value="<?= $currencycode ?>">
  <label for="">Order ID:</label>
  <input type="" class="form-control w-35-pct" name="OrderID" value="">
  <input type="hidden" name="TransactionType" value="<?= $transactiontype ?>">
  <input type="hidden" name="TransactionDateTime" value="<?= $transactiondatetime ?>">
  <input type="hidden" name="OrderDescription" value="<?= $orderdesc ?>">
  <label for="">First Name: </label>
  <input type="" class="form-control w-35-pct" name="FirstName" value="">
  <label for="">Last Name: </label>
  <input type="" class="form-control w-35-pct" name="LastName" value="">
  <label for="">Address: </label>
  <input type="" class="form-control w-35-pct" name="Address1" value="">
  <input type="" class="form-control w-35-pct" name="Address2" value="">
  <input type="" class="form-control w-35-pct" name="Address3" value="">
  <input type="hidden" class="form-control w-35-pct" name="Address4" value="<?=$address4?>">
  <input type="hidden" class="form-control w-35-pct" name="City" value="<?= $city ?>">
  <input type="hidden" name="State" value="<?= $state ?>">
  <label for="">Postcode: </label>
  <input type="" class="form-control w-35-pct" name="PostCode" value="">
  <input type="hidden" name="CountryCode" value="<?= $countrycode ?>">
  <input type="hidden" name="HashMethod" value="<?= $hashmethod ?>">
  <input type="hidden" name="CallbackURL" value="<?= $callbackurl ?>">
  <input type="hidden" name="EchoAVSCheckResult" value="<?= $echoavs ?>">
  <input type="hidden" name="EchoCV2CheckResult" value="<?= $echocv2 ?>">
  <input type="hidden" name="EchoThreeDSecureAuthenticationCheckResult" value="<?= $echothreed ?>">
  <input type="hidden" name="EchoCardType" value="<?= $echocardtype ?>">
  <input type="hidden" name="CV2Mandatory" value="<?= $cv2mandatory ?>">
  <input type="hidden" name="Address1Mandatory" value="<?= $address1mandatory ?>">
  <input type="hidden" name="CityMandatory" value="<?= $citymandatory ?>">
  <input type="hidden" name="PostCodeMandatory" value="<?= $postcodemandatory ?>">
  <input type="hidden" name="StateMandatory" value="<?= $statemandatory ?>">
  <input type="hidden" name="CountryMandatory" value="<?= $countrymandatory ?>">
  <input type="hidden" name="ResultDeliveryMethod" value="<?= $resultdeliverymethod ?>">
  <input type="hidden" name="ServerResultURL" value="<?= $serverresulturl ?>">
  <input type="hidden" name="PaymentFormDisplaysResult" value="<?= $paymentformsdisplaysresult ?>">
  <input type="hidden" name="ServerResultURLCookieVariables" value="<?= $serverresulturlcookievariables ?>">
  <input type="hidden" name="ServerResultURLFormVariables" value="<?= $serverresulturlformvariables ?>">
  <input type="hidden" name="ServerResultURLQueryStringVariables" value="<?= $serverresulturlquerystringvariables ?>">
  <!-- <input type="hidden" name="HashDigest" value=""> -->
  <button type="submit" class="btn btn-default">Submit</button>
  </div>
</form>
<?php 

// include page footer HTML
include_once 'layout_foot.php';

?>