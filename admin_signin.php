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
        <title>Signin</title>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-pgd" action="action_admin_sign.php" method="post">
            <div>
                <a class="mb-4" href="index.php">
                    <img class="mb-4" src="./assets/img/logo.png" alt="IIT" width="144" height="72">
                </a>
            </div>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <input type="text" id="inputEmail" name="adminemail" class="form-control" placeholder="Email address" value="admin" hidden required>
            <label for="adminPassword" class="sr-only">Password</label>
            <input type="password" id="adminPassword" name="adminpass" class="form-control" placeholder="Password" required autofocus>
            <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
        </form>
    </body>
</html>
