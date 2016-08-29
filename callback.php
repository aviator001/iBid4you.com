<?
session_start();
foreach ($_COOKIE as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        $_SESSION[$k]=$v;
    }
}
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1704098726469372',
  'app_secret' => '158c42fbe28a71a91ab044e533937a84',
  'default_graph_version' => 'v2.4',
  ]);

try {
	$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	echo 'Graph returned an error: ' . $e->getMessage();
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}


if (isset($accessToken)) {
	$_SESSION['facebook_access_token'] = (string) $accessToken;
	setCookie("facebook_access_token",$_SESSION['facebook_access_token'],time()+3600,"/");
	header("Location:home.php");
}