<?
$port=$_REQUEST[port];
setCookie("port",$port,time()+3600,"/");
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1620406188237943',
  'app_secret' => '52234f9356c42357b903561a4667b33a',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['public_profile','email','user_friends']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://ibid4you.com/callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>
</body>
</html>