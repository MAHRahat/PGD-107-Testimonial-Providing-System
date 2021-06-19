<?php 
    session_start();
    if(isset($_SESSION['email'])) {
        if ($_SESSION['email']=="admin")
            header("location:dashboard.php");
        else
            header("location:profile.php");
    }
    else {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>IIT</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body class="form-pgd">
        <center>
        <div>
            <a class="mb-4" href="index.php">
                <img class="mb-4" src="./assets/img/logo.png" alt="IIT" width="144" height="72">
            </a>
        </div>
        <h1>Testimonial Providing System</h1> 
        <button class="btn btn-lg btn-primary btn-block" type="button" onClick="(function() {window.location = './register.php';})()">Register</button>
        <button class="btn btn-lg btn-danger btn-block" type="button" onClick="(function() {window.location = './signin.php';})()">Sign In</button>
        <button class="btn btn-lg btn-info btn-block" type="button" onClick="(function() {window.location = './admin_signin.php';})()">Admin Sign in</button>
        </center>
    </body>
</html>
