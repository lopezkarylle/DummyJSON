<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$response = $client->get('products');
$code = $response->getStatusCode();
$body = $response->getBody();
$products = json_decode($body)->products;
//var_dump(json_decode($body))
?>

<!DOCTYPE html>
<html>
<head>
<title> JSON Products </title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <br><br>
        <div class = "container"> 
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Category</th>
                                <th scope="col">Thumbnail</th>
                        </tr>
                </thead>
        <tbody>
                <?php foreach($products as $product){?>
                <tr>
                <th scope="row" href="single-product.php"><?php echo $product->id ?></th>
                <td><?php echo $product->title?></td>
                <td><?php echo $product->description?></td>
                <td><?php echo $product->price?></td>
                <td><?php echo $product->brand?></td>
                <td><?php echo $product->category?></td>
                <td><img src="<?php echo $product->thumbnail?>" width="250" length="250"></td>
                </tr>
                <?php }?>
        </tbody>
</table>
</body>
</html>