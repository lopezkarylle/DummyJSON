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
  ]
];

$response = $client->put('https://dummyjson.com/users/1', $users);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
//var_dump($body);

?>
