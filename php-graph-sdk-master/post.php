<?php

require('./src/Facebook.php');

$fb = new Facebook\Facebook([
  'app_id' => '{app-id}',
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v2.10',
  ]);

$linkData = [
  'link' => 'http://www.example.com',
  'message' => 'User provided message',
  ];

try {
  // Returns a `Facebook\Response` object
  $response = $fb->post('/me/feed', $linkData, '{access-token}');
} catch(Facebook\Exception\ResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\SDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];



?>
