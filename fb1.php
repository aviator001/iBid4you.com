<?
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1620406188237943',
  'app_secret' => '52234f9356c42357b903561a4667b33a',
  'default_graph_version' => 'v2.4',
  ]);
// Iterate over 5 pages max
$maxPages = 5;

// Get a list of photo nodes from the /photos edge
$response = $fb->get('/me/photos?fields=id,source,likes&limit=5');

$photosEdge = $response->getGraphEdge();

if (count($photosEdge) > 0) {
  $pageCount = 0;
  do {
    foreach ($photosEdge as $photo) {
      var_dump($photo->asArray());

      // Deep pagination is supported on child GraphEdge's
      $likes = $photo['likes'];
      do {
        echo '<p>Likes:</p>' . "\n\n";
        var_dump($likes->asArray());
      } while ($likes = $fb->next($likes));
    }
    $pageCount++;
  } while ($pageCount < $maxPages && $photosEdge = $fb->next($photosEdge));
}
