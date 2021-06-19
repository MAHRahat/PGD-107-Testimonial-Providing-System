
<?php 
    session_start();
    if(!isset($_SESSION['email'])) {
        session_destroy();
        header("location:signin.php");
    }
    elseif ($_SESSION['email']=="admin") {
        header("location:dashboard.php");
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

    function dataRead($conn, $email, $pass) {
        $sql = "select * from stu where email = '$email' and pass = '$pass'";
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
            return null;
        }
        $row = mysqli_fetch_assoc($res);
        return $row;
    }

    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $conn = databaseConnection();
    $row = dataRead($conn, $email, $pass);
    $name = $row['name'];
    $roll = $row['roll'];
    $sess = $row['session'];
    $degree = $row['degree'];
    $status = $row['status'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Profile</title>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-pgd" action="action_pro.php" method="post">
            <div>
                <a class="mb-4" href="index.php">
                    <img class="mb-4" src="./assets/img/logo.png" alt="IIT" width="144" height="72">
                </a>
            </div>
            <h1 class="h3 mb-3 font-weight-normal">Student Profile</h1>
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>" required <?php if($status!=0)echo "readonly"; ?> >
            <label for="session" class="sr-only">Session</label>
            <input type="text" id="session" name="session" class="form-control" placeholder="Session" value="<?php echo $sess; ?>" required <?php if($status!=0)echo "readonly"; ?> >
            <label for="roll" class="sr-only">Roll</label>
            <input type="text" id="roll" name="roll" class="form-control" placeholder="Roll" value="<?php echo $roll; ?>" required <?php if($status!=0)echo "readonly"; ?> >
            <label for="degree" class="sr-only">Degree</label>
            <input type="text" id="degree" name="degree" class="form-control" placeholder="Degree" value="<?php echo $degree; ?>" required <?php if($status!=0)echo "readonly"; ?> >
            <button class="btn btn-lg btn-primary btn-block" <?php if($status!=0)echo "type=\"submit\""; ?> >
                <?php 
                switch($status) {
                    case 0:
                        echo "Update Profile";
                        break;
                    case 1:
                        echo "Testimonial Ready";
                        break;
                }
                ?>
            </button>
            <button class="btn btn-lg btn-danger btn-block" type="button" onClick="(function() {window.location = './logout.php';})()">Log Out</button>
        </form>
    </body>
</html>
