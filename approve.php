<?php 
    session_start();
    if(!isset($_SESSION['email'])) {
        session_destroy();
        header("location:index.php");
    }
    elseif ($_SESSION['email']!="admin") {
        session_destroy();
        header("location:index.php");
    }
?>

<!doctype html>
<html>
    <head>
        <title>Approve</title>
        <meta http-equiv="refresh" content="2; url=dashboard.php">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="text-align:center;">

<?php
    function dataReceive() {
        $email = $_GET["email"];
        return $email;
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
        $sql = "update stu set status = '1' where email = $email";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo "<div class=\"action_failure\">";
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            echo "</div>";
            return;
        }
        else {
            echo "<div class=\"action_success\">";
            echo "Approved!<br>";
            echo "</div>";
        }
    }

    $email = dataReceive();
    $conn = databaseConnection();
    dataCheck($conn, $email);
?>

    </body>
</html>
