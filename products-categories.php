<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('products/categories');
$code = $response->getStatusCode();
$body = $response->getBody();
$product_category= json_decode($body);
//var_dump($product_category['products']);
?>


<html>
<title>Product Category</title>
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

  <body>
        <div class = "container">
           <table class="table table-striped">
             <thead>
               <tr>
                <th scope="col">Category</th>
                </tr>
              </thead>
        <tbody>
        <?php
        foreach ($product_category as $category){
        ?>
          <tr>
            <td><?php echo $category; ?></td>
          <tr>
     <?php
     }
?>
        </tbody>
      </table>
</body>
</html>