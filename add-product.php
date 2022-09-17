<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$id = $_GET["product_id"];
$response = $client->get('products/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
//var_dump(json_decode($body))
?>