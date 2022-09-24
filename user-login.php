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
    	margin: 60px auto;
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

    .alert {
        display:inline-block;
        text-align: center;
        word-break: break-all;
        width:650px;    
        margin-left: 25%;
      
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
                <input type="password" name=password class="form-control" placeholder="Password" required="required">
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

        $options = [
            'json' => [
            "username" => $username,
            "password" => $password
            ]
        ];
        
        $response = $client->post("auth/login", $options);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $user = json_decode($body);
        //var_dump(json_decode($body));
                // var_dump($username);

        if ($username == $username AND $password == $password) {
            echo '<div class="alert alert-success" role="alert">' . "Token: " .$user->token. '</div>' ;
          } else {
            echo '<div class="alert alert-danger" role="alert"> Failed: No User </div>';
          } 
   }
}
?>