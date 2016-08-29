<?
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1620406188237943',
  'app_secret' => '52234f9356c42357b903561a4667b33a',
  'default_graph_version' => 'v2.4',
  ]);
$_SESSION['facebook_access_token'] = (string) $_REQUEST['facebook_access_token'];
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
$linkData = [
	'link' => 'http://ibid4you.com/auction.php?id='.$_REQUEST['port'],
	'message' => $_REQUEST['full_post'],
];
$response = $fb->post('/me/feed', $linkData, $_SESSION['facebook_access_token']);
$graphNode = $response->getGraphNode();
echo 'Posted with id: ' . $graphNode['id'];
?>