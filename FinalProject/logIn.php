<?php
include 'dbConnection.php';
   $conn = getDatabaseConnection('FProjectDB'); 
   
   function error(){
    echo"Sorry wrong Username or Password. Please Try again.";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/main.css" type="text/css" />
    </head>
    <body>
        <h1> Admin Login</h1>
        
        <form method="POST" action="loginProcess.php">
    
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br />
        <input type="submit" value="Login!" name="loginForm" />
            
        </form>


    </body>
</html>

