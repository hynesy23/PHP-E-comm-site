<h1>PROCESS.PHP FILE</h1>

<?php

// include vars so we can add to StringToHash
include '../gateway_info/vars.php';

echo "<h1>Process.php</h1>";

include_once 'calculate_hash.php';

extract($_POST);

$CustomerName = $FirstName . " " . $LastName;

echo $mid . " Merchant ID " . $Amount . " Amount " . $OrderID . " Order ID " . $CustomerName . " Customer Name " . $Address1 . " Address 1 " . $Address2 . " Address 2 " . $Address3 . " Address 3 " . $PostCode . " PostCode ";

$StringToHash = "PreSharedKey=$presharedkey&MerchantID=$mid&Password=$pw&Amount=$Amount&CurrencyCode=$currencycode&EchoAVSCheckResult=$echoavs&EchoCV2CheckResult=$echocv2&EchoThreeDSecureAuthenticationCheckResult=$echothreed&EchoCardType=$echocardtype&OrderID=$OrderID&TransactionType=$transactiontype&TransactionDateTime=$transactiondatetime&CallbackURL=$callbackurl&OrderDescription=$orderdesc&CustomerName=$CustomerName&Address1=$Address1&Address2=$Address2&Address3=$Address3&Address4=$address4&City=$city&State=$state&PostCode=$PostCode&CountryCode=$countrycode&CV2Mandatory=$cv2mandatory&Address1Mandatory=$address1mandatory&CityMandatory=$citymandatory&PostCodeMandatory=$postcodemandatory&StateMandatory=$statemandatory&CountryMandatory=$countrymandatory&ResultDeliveryMethod=$resultdeliverymethod&ServerResultURL=$serverresulturl&PaymentFormDisplaysResult=$paymentformsdisplaysresult&ServerResultURLCookieVariables=$serverresulturlcookievariables&ServerResultURLFormVariables=$serverresulturlformvariables&ServerResultURLQueryStringVariables=$serverresulturlquerystringvariables";

$HashDigest = calculateHashDigest($StringToHash,$presharedkey,$hashmethod); // This function returns the $stringtohash, hashed by the SHA1 method

include_once('final_form.php');