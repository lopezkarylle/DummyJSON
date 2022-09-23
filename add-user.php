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

<html>
        <title>Users</title>
        <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
        
        <body>  
            <br><br>
        <div class = "container"> 
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Complete Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Blood Type</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $user->id?></th>
                        <td><?php echo $user->firstName?><?php echo " "?><?php echo $user->maidenName?><?php echo " "?><?php echo $user->lastName?></td>
                        <td><?php echo $user->age ?></td>
                        <td><?php echo $user->gender?></td>
                        <td><?php echo $user->email?></td>
                        <td><?php echo $user->phone?></td>
                        <td><?php echo $user->bloodGroup?></td>
                        <td><img src="<?php echo $user->image?>" width="100" length="100"></td>
                    </tr>
                </tbody>
 </table>
</div>
</body>
</html>
