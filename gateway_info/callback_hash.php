<?php 

include 'calculate_hash.php';
include 'vars.php';

if (isset($_POST['StatusCode'])) {

$gw_response = $_POST; 

extract($gw_response);

// $message = $gw_response['Message'];
// $previousstatuscode = $gw_response['PreviousStatusCode'];
// $previousmessage=  $gw_response['PreviousMessage'];
// $crossreference= $gw_response['CrossReference'];
// $addressnumericcheckresult = $gw_response['AddressNumericCheckResult'];
// $postcodecheckresult= $gw_response['PostCodeCheckResult'];
// $cv2checkresult= $gw_response['CV2CheckResult'];
// $threedsecureauthenticationcheckresult= $gw_response['ThreeDSecureAuthenticationCheckResult'];
// $cardtype= $gw_response['CardType'];
// $cardclass= $gw_response['CardClass'];
// $cardissuer= $gw_response['CardIssuer'];
// $cardissuercountrycode= $gw_response['CardIssuerCountryCode'];
// $amount= $gw_response['Amount'];
// $currencycode= $gw_response['CurrencyCode'];
// $orderid= $gw_response['OrderID'];
// $transactiontype= $gw_response['TransactionType'];
// $transactiondatetime= $gw_response['TransactionDateTime'];
// $orderdescription= $gw_response['OrderDescription'];
// $customername= $gw_response['CustomerName'];
// $address1= $gw_response['Address1'];
// $address2= $gw_response['Address2'];
// $address3= $gw_response['Address3'];
// $address4= $gw_response['Address4'];
// $city= $gw_response['City'];
// $state= $gw_response['State'];
// $postcode= $gw_response['PostCode'];
// $countrycode= $gw_response['CountryCode'];

$StringToHash = "PreSharedKey=$presharedkey&MerchantID=$mid&Password=$pw&Amount=$Amount&CurrencyCode=$currencycode&EchoAVSCheckResult=$echoavs&EchoCV2CheckResult=$echocv2&EchoThreeDSecureAuthenticationCheckResult=$echothreed&EchoCardType=$echocardtype&OrderID=$OrderID&TransactionType=$transactiontype&TransactionDateTime=$transactiondatetime&CallbackURL=$callbackurl&OrderDescription=$orderdesc&CustomerName=$CustomerName&Address1=$Address1&Address2=$Address2&Address3=$Address3&Address4=$address4&City=$city&State=$state&PostCode=$PostCode&CountryCode=$countrycode&CV2Mandatory=$cv2mandatory&Address1Mandatory=$address1mandatory&CityMandatory=$citymandatory&PostCodeMandatory=$postcodemandatory&StateMandatory=$statemandatory&CountryMandatory=$countrymandatory&ResultDeliveryMethod=$resultdeliverymethod&ServerResultURL=$serverresulturl&PaymentFormDisplaysResult=$paymentformsdisplaysresult&ServerResultURLCookieVariables=$serverresulturlcookievariables&ServerResultURLFormVariables=$serverresulturlformvariables&ServerResultURLQueryStringVariables=$serverresulturlquerystringvariables";

$HashDigest = calculateHashDigest($StringToHash,$presharedkey,$hashmethod); // This function returns the $stringtohash, hashed by the SHA1 method

//return "Hashes match!";
}