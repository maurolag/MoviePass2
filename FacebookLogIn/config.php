<?php
if (!session_id()) 
    session_start();
require_once 'Facebook/autoload.php';

$appId = '2502503073311723';
$appSecret = 'f51af491f452edd614281042a3f2c296';
$permissions = ['email'];
$callBackUrl = 'http://localhost/MoviePass/FacebookLogIn/Callback.php';

//session_start();
$fb = new Facebook\Facebook([
    'app_id' => $appId, // Replace {app-id} with your app id
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.0',
]);

$helper = $fb->getRedirectLoginHelper();
$loginUrl = $helper->getLoginUrl($callBackUrl, $permissions);
?>