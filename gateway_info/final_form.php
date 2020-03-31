<?php
include 'vars.php';

echo $mid;

extract($_POST);

?>


<h1>This is the final Form</h1>

<form method="POST" action="https://mms.payzoneonlinepayments.com/Pages/PublicPages/PaymentForm.aspx">
<div class="form-group">
  <input type="hidden" name="MerchantID" value="<?= $mid ?>">
  <label for="">Amount:</label>
  <input type="hidden" class="form-control w-10-pct" name="Amount" value="<?= $Amount ?>">
  <input type="hidden" name="CurrencyCode" value="<?= $currencycode ?>">
  <label for="">Order ID:</label>
  <input type="hidden" class="form-control w-35-pct" name="OrderID" value="<?=$OrderID?>">
  <input type="hidden" name="TransactionType" value="<?= $transactiontype ?>">
  <input type="hidden" name="TransactionDateTime" value="<?= $transactiondatetime ?>">
  <input type="hidden" name="OrderDescription" value="<?= $orderdesc ?>">
  <input type="hidden" class="form-control w-35-pct" name="CustomerName" value="<?=$CustomerName?>">
  <label for="">Address: </label>
  <input type="hidden" class="form-control w-35-pct" name="Address1" value="<?=$Address1?>">
  <input type="hidden" class="form-control w-35-pct" name="Address2" value="<?=$Address2?>">
  <input type="hidden" class="form-control w-35-pct" name="Address3" value="<?=$Address3?>">
  <input type="hidden" class="form-control w-35-pct" name="Address4" value="<?=$address4?>">
  <input type="hidden" class="form-control w-35-pct" name="City" value="<?= $city ?>">
  <input type="hidden" name="State" value="<?= $state ?>">
  <input type="hidden" class="form-control w-35-pct" name="PostCode" value="<?=$PostCode?>">
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
  <input type="hidden" name="HashDigest" value="<?= $HashDigest ?>">
  <button type="submit" class="btn btn-default">Submit</button>
  </div>
</form>