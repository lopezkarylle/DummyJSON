<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

// Handling HTTP Response
$products = [
	'json' => [
  'title' => 'Wide Mouth Straw Lid',
  'description' => 'Stainless Steel Reusable Water Bottle - Vacuum Insulated',
  'price' => '599',
  'brand' => 'Flask It!',
  'category' => 'Bottles'
	]
];

$response = $client->post('https://dummyjson.com/products/add', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
var_dump(json_decode($body))
?>