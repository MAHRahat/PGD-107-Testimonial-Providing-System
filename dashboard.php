
<?php 
    session_start();
    if(!isset($_SESSION['email'])) {
        session_destroy();
        header("location:signin.php");
    }
    elseif ($_SESSION['email']!="admin") {
        header("location:profile.php");
    }
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
        <?php 
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

            function dataRead($conn) {
                $sql = "select * from stu";
                $res = mysqli_query($conn, $sql);
                if (!$res) {
                    echo "Error: ". $sql . "<br>" . mysqli_error($conn);
                    return null;
                }
                //$row = mysqli_fetch_assoc($res);
                echo '<table class= "table table-dark table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">E-mail</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Session</th>';
                echo '<th scope="col">Roll</th>';
                echo '<th scope="col">Degree</th>';
                echo '<th scope="col">Status</th>';
                //echo '<th scope="col">Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row = mysqli_fetch_assoc($res)) {
                    echo '<tr class="table-dark">';
                    echo '<td class="table-dark">' . $row['email'] .'</td>';
                    echo '<td>' . $row['name'] .'</td>';
                    echo '<td>' . $row['session'] .'</td>';
                    echo '<td>' . $row['roll'] .'</td>';
                    echo '<td>' . $row['degree'] .'</td>';
                    echo '<td>' . $row['status'] .'</td>';
                    //echo '<td><input type="date" class="form-control" vertical-align="middle" value="' . $row['delivery'] .'"></td>';
                    echo '</tr>';
                }
                echo '<tr class="table-dark">';
                echo '<td class="table-dark" colspan="6">';
                echo '<button class="btn btn-lg btn-danger btn-block" type="button" style="width:100%; max-width:500px; bottom: 0px; margin: 0 auto;" onClick="(function() {window.location = \'./logout.php\';})()">Log Out</button>';
                echo '</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
            }

            $conn = databaseConnection();
            dataRead($conn);
        ?>
        
    </body>
</html>


