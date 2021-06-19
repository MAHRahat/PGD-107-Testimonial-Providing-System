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
        <title>Register</title>
        <meta http-equiv="refresh" content="2; url=register.php">
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
    function dataCheck($conn, $email) {
        $sql = "select email from stu where email = '$email'";
        $res = mysqli_query($conn, $sql);
        return mysqli_num_rows($res);
    }
    function dataInsert($conn, $email, $pass) {
        $sql = "insert into stu (email, pass) values('$email', '$pass')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<div class=\"action_success\">";
            echo "Congratulations! <br>";
            echo "Record created successfully <br>";
            echo "<a href=\"signin.php\">Sign In</a>";
            echo "</div>";
        }
        else {
            echo "<div class=\"action_failure\">";
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            echo "</div>";
        }
    }

    $emailAndPass = dataReceive();
    $email = $emailAndPass[0];
    $pass = $emailAndPass[1];
    $conn = databaseConnection();
    if (dataCheck($conn, $email)>0) {
        echo "<div class=\"action_failure\">";
        echo "Email already exists";
        //echo "Go to <a href=\"register.php\">Registration</a> page.";
        echo "</div>";
    }
    else {
        dataInsert($conn, $email, $pass);
    }
?>

    </body>
</html>
