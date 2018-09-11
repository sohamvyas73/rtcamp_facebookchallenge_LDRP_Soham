<?php  

session_start();
require 'Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '690453101307206', // Replace {app-id} with your app id
  'app_secret' => '8805ec51cb6b0acd3ca5a678ecca5133',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','public_profile','user_likes','user_photos','user_friends']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://sv.project.stepinsolutions.in/callback.php', $permissions);

header("location:" .$loginUrl);
?>