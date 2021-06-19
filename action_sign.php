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
<html>
    <head>
        <title>Signin</title>
        <meta http-equiv="refresh" content="2; url=signin.php">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="text-align:center;">

<?php
    function dataReceive() {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $pass = md5($pass);
        return array($email, $pass);
    }
    function databaseConnection() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        $conn = mysqli_connect($server, $username, $password, $dbname);
        if (!$conn) {
            echo "<div class=\"action_failure\">";
            echo "Connection failed: " . mysqli_error();
            echo "</div>";
            return null;
        }
        return $conn;
    }
    function dataCheck($conn, $email, $pass) {
        $sql = "select email from stu where email = '$email' and pass = '$pass'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo "<div class=\"action_failure\">";
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            echo "</div>";
            return;
        }
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;
            header("Location:index.php");
        }
        else {
            echo "<div class=\"action_failure\">";
            echo "Wrong email or password.<br>";
            //echo "Go to <a href=\"signin.php\">Sign In</a> page.";
            echo "</div>";
        }
    }

    $emailAndPass = dataReceive();
    $email = $emailAndPass[0];
    $pass = $emailAndPass[1];
    $conn = databaseConnection();
    dataCheck($conn, $email, $pass);
?>

    </body>
</html>
