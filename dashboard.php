<?php
session_start();
echo " Dashboard <br> Logged in <br>";
echo "<br>My name is " . $_SESSION["name"] . ".<br>";
echo "My email is " . $_SESSION["email"] . ".";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function logout()
            {
                <?php
                session_unset();
                session_destroy();
                ?>
                window.location.replace("http://localhost:3000/login.php");
            }
        </script>
    </head>
    <body>
        <button onclick="logout()">Logout</button>
    </body>
</html>