<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

?>

<html>
    <head>
        <title>Users Login Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	.login-form {
		width: 450px;
    	margin: 220px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="login-form">
        <form action="/dummyJson/user-login.php" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" name=username class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="text" name=password class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>                                		

<?php

if (isset($_POST['username'])) {
    if (isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        // var_dump($username);
        try {
            $response = $client->request('POST','https://dummyjson.com/auth/login',
            ['json'=>['username' => $username, 'password' => $password]
        ]); 

        //,array(['username' => $username, 'password' => $password]));
        // . $username . '/' . $password
        //$code = $response->getStatusCode();
        $body = $response->getBody();
        $user_login = json_decode($body, true);
        var_dump($user_login); } 

        catch(Exception $e){ 
            echo '<div class="alert alert-danger" role="alert"> Failed: No User </div>';
        }
         
        // $body['username'] = $username;
        //$body['password'] = $password;
    } else {
        echo "No user";
    }
}
?>