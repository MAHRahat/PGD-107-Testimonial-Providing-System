<?php 
    session_start();
    session_destroy();
?>

<!doctype html>
<html>
    <head>
        <title>Logout</title>
        <meta http-equiv="refresh" content="1; url=index.php">
        <link href="./assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="text-align:center;">
        
        <?php 
            echo "<div class=\"action_success\">";
            echo "Logged out successfully<br>";
            echo "</div>";
        ?>
        
    </body>
</html>
