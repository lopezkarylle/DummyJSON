<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$users = [
  'json' => ['id' => '31',
  'firstName' => 'Nayeon',
  'maidenName' => 'Bunny',
  'lastName' => 'Im',
  'age' => '27',
  'gender' => 'female',
  'email' => 'im.nayeon@twice.sk',
  'phone' => '+010 6203 3087',
  'bloodGroup' => 'A+',
  'image' => 'thumbnail.jpg'
	]
];

$response = $client->post('https://dummyjson.com/users/add', $users);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
//var_dump(json_decode($body))

?>
