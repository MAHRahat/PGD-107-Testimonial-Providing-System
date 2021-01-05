<?php 
    session_start();
    if(isset($_SESSION['email'])) {
        header("location:index.php");
    }
    else {
        session_destroy();
    }
?>

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
            echo "Connection failed: " . mysqli_error();
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
            echo "Congratulations! <br>";
            echo "Record created successfully <br>";
            echo "<a href=\"signin.php\">Sign In</a>";
        }
        else {
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
        }
    }

    $emailAndPass = dataReceive();
    $email = $emailAndPass[0];
    $pass = $emailAndPass[1];
    $conn = databaseConnection();
    if (dataCheck($conn, $email)>0) {
        echo "email already exists";
        echo "Go to <a href=\"register.php\">Registration</a> page.";
    }
    else {
        dataInsert($conn, $email, $pass);
    }
?>

