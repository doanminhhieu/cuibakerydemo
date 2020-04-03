<?php
session_start();
$google_client_id 		= '999327966650-k49m3bkievb29edirtofbh2jo28p6f00.apps.googleusercontent.com';
$google_client_secret 	= 'O9DMsuCpNXHh8SBCuqw0hnbE';
$google_redirect_url 	= $full_url.'/?login=google'; //path to your script
$google_developer_key 	= 'AIzaSyAO6LVXKUEwQZVT-qWTe38a1SINx-m2SEM';
require_once 'Google/Google_Client.php';
require_once 'Google/contrib/Google_Oauth2Service.php';

$gClient = new Google_Client();
$gClient->setApplicationName('Login Google');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
}
else {
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) //user is not logged in, show login button
{
	header("Location: ".$authUrl);
} 
else // user logged in 
{	
	//list all user details
	echo '<pre>'; 
	print_r($user);
	echo '</pre>';	
}
?>