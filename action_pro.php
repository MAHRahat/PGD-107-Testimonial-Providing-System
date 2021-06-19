<?php 
    session_start();
?>

<!doctype html>
<html>
    <head>
        <title>Profile</title>
        <meta http-equiv="refresh" content="2; url=profile.php">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="text-align:center;">

<?php
    function dataReceive() {
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $sess = $_POST["session"];
        $degree = $_POST["degree"];
        return array($name, $roll, $sess, $degree);
    }
    function databaseConnection() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        $conn = mysqli_connect($server, $username, $password, $dbname);
        if (!$conn) {
            echo "Connection failed: " . mysqli_error();
            return null;
        }
        return $conn;
    }
    function dataUpdate($conn, $data) {
        $email = $_SESSION['email'];
        $name = $data[0];
        $roll = $data[1];
        $sess = $data[2];
        $degree = $data[3];
        $sql = "update stu set name='$name', roll='$roll', session='$sess', degree='$degree', status='0', delivery=NULL where email='$email'" ;
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<div class=\"action_success\">";
            echo "Congratulations! <br>";
            echo "Record updated successfully <br>";
            echo "</div>";
        }
        else {
            echo "<div class=\"action_failure\">";
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            echo "</div>";
        }
    }

    $data = dataReceive();
    $conn = databaseConnection();
    dataUpdate($conn, $data);
?>
</body>
</html>
