<?php
#session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '392017241279-p4jies4s5sk95u41rpq0639ki42ftu7t.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'fxWQmOw01Lc2RvWlM56UozVM'; //Google client secret
$redirectURL = 'http://[::1]/project/Codeigniter/e-commerce/'; //Callback URL
#$redirectURL = 'http://ecommerce.creativedigiads.com'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>