<?php 
    session_start();
    if(isset($_SESSION['email'])) {
        header("location:index.php");
    }
    else {
        session_destroy();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Register</title>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-pgd" action="action_reg.php" method="post">
            <div>
                <a class="mb-4" href="index.php">
                    <img class="mb-4" src="./assets/img/logo.png" alt="IIT" width="144" height="72">
                </a>
            </div>
            <h1 class="h3 mb-3 font-weight-normal">Please register</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <button class="btn btn-lg btn-danger btn-block" type="button" onClick="(function() {window.location = './signin.php';})()">Sign In Instead</button>
        </form>
    </body>
</html>
