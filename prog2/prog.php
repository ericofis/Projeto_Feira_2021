<?php

require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1721302348080367',
  'app_secret' => 'acaa9c4886017145d0bbd377062ce046',
  'default_graph_version' => 'v2.10',
  ]);

$linkData = [
  'link' => 'https://ericofis.github.io/Projeto_Feira_2021/01.jpg',
  'message' => 'Teste de envio de imagens',
  ];

try {
  // Returns a `Facebook\Response` object
  $response = $fb->post('/me/feed', $linkData, 'EAAYdgZB8CJO8BAGf7MaFu8IQnHwC6y17usqA9xcsiYBaBICATUTFrwars3FPYDtSdBgxnnDD9uT3bKZCV8pThUp4ckv2fDrllxcWg0diZCzrR63bSZAgodNn3zKxpCiyYwPzdfeXDtB8AhMM4DxTs3GEICHDeXqu5iH4RbDq5vY6fi7zmG46tefEko7CeE3zlPPw4ZAPoJgZDZD');
} catch(Facebook\Exception\ResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\SDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];

//EAAYdgZB8CJO8BAGf7MaFu8IQnHwC6y17usqA9xcsiYBaBICATUTFrwars3FPYDtSdBgxnnDD9uT3bKZCV8pThUp4ckv2fDrllxcWg0diZCzrR63bSZAgodNn3zKxpCiyYwPzdfeXDtB8AhMM4DxTs3GEICHDeXqu5iH4RbDq5vY6fi7zmG46tefEko7CeE3zlPPw4ZAPoJgZDZD
//1721302348080367
//acaa9c4886017145d0bbd377062ce046

//https://www.youtube.com/watch?v=zeKjPlndkSY&t=117s


?>
