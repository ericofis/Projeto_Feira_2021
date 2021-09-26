<?php

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1721302348080367',
  'app_secret' => 'acaa9c4886017145d0bbd377062ce046',
  'default_graph_version' => 'v2.10',
  ]);

// Since all the requests will be sent on behalf of the same user,
// we'll set the default fallback access token here.
$fb->setDefaultAccessToken('user-access-token');

$batch = [
  'photo-one' => $fb->request('POST', '/me/photos', [
      'message' => 'Foo photo',
      'source' => $fb->fileToUpload('./01.jpg'),
    ]),
  'photo-two' => $fb->request('POST', '/me/photos', [
      'message' => 'Bar photo',
      'source' => $fb->fileToUpload('./02.jpg'),
    ]),
];

try {
  $responses = $fb->sendBatchRequest($batch);
} catch(Facebook\Exception\ResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\SDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

foreach ($responses as $key => $response) {
  if ($response->isError()) {
    $e = $response->getThrownException();
    echo '<p>Error! Facebook SDK Said: ' . $e->getMessage() . "\n\n";
    echo '<p>Graph Said: ' . "\n\n";
    var_dump($e->getResponse());
  } else {
    echo "<p>(" . $key . ") HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
    echo "Response: " . $response->getBody() . "</p>\n\n";
    echo "<hr />\n\n";
  }
}

//EAAYdgZB8CJO8BAGf7MaFu8IQnHwC6y17usqA9xcsiYBaBICATUTFrwars3FPYDtSdBgxnnDD9uT3bKZCV8pThUp4ckv2fDrllxcWg0diZCzrR63bSZAgodNn3zKxpCiyYwPzdfeXDtB8AhMM4DxTs3GEICHDeXqu5iH4RbDq5vY6fi7zmG46tefEko7CeE3zlPPw4ZAPoJgZDZD
//1721302348080367
//acaa9c4886017145d0bbd377062ce046

//https://www.youtube.com/watch?v=zeKjPlndkSY&t=117s


?>
