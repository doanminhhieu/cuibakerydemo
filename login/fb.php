<?php
// session_start();
$app_id         = "367161820519834";
$app_secret     = "2b9567439f7d7edc2456bbdac1bf013d";
$getLoginUrl    = $full_url."/?login=fb";

require_once 'Facebook/autoload.php';
$fb = new Facebook\Facebook ([
  'app_id' => $app_id, 
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
    
if (! isset($accessToken)) {
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl($getLoginUrl, $permissions);
    header("Location: ".$loginUrl);  
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email');
  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo '<br />Faceook ID: ' . $user['id'];
echo '<br />Faceook Name: ' . $user['name'];
echo '<br />Faceook Email: ' . $user['email'];
?>