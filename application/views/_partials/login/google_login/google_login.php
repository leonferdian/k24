<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
include_once 'logout.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) 
{
    //Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'provider'=> 'google',
        'member_id'     => $gpUserProfile['id'],
        'name'    => $gpUserProfile['given_name'],
        #'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        #'gender'        => $gpUserProfile['gender'],
        #'locale'        => $gpUserProfile['locale'],
        'avatar'       => $gpUserProfile['picture'],
        #'link'          => $gpUserProfile['link']
    );
    
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
    $_SESSION['userData'] = $userData;
    
    if(!empty($userData))
    {
        echo '<li><a><img src="'.$userData['avatar'].'" class="profile-pic"></a></li>';
        echo '<li><a> '.$userData['name'].'</a></li>';
        echo '<li><a class="text-danger" style="text-shadow: none; text-decoration-line: none;" href="'.site_url('?logout=google').'"><i class="fa fa-sign-out"></i> Logout</a></li>';
    }
    else
    {
        echo '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}
else
{
    $authUrl = $gClient->createAuthUrl();
    echo '<li><a class="dropdown-item sosmed-google" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><i class="fa fa-google-plus"></i> Google</a></li>';
}
