<?php
//Include GP config file
//include_once 'gpConfig.php';
if (isset($_GET['logout']) ? $_GET['logout'] : '' == 'google')
{
    //Unset token and user data from session
    unset($_SESSION['token']);
    unset($_SESSION['userData']);

    //Reset OAuth access token
    $gClient->revokeToken();

    //Destroy entire session
    session_destroy();

    //Redirect to homepage
    //header("Location:index.php");
    redirect(site_url());
}