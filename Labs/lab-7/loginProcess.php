<?php
session_start();  //creates a new session to store vaues from page to page.
//VALITADING THE USERNAME AND PASSWORD

// print_r($_POST);//DISPLAYS POST FORM ARRAY

include '../../dbConnection.php';
   $conn = getDatabaseConnection('quotes'); 

$username = $_POST['username'];
$password = sha1($_POST['password']);

//echo $password;
//FOLLOWING SQL WORKS BUT IT ALLOWS SQL INJECTION
// $sql = "SELECT *
//         FROM q_admin
//         WHERE username = '$username'  HERE 
//         AND   password = '$password'"; AND HERE WITH THE SINGLE QUOTES USING "'or 1=1 or'" in the username.

//SQL USING NAMED APARAMETERS THAT PREVENTS SQL INJECTION
$sql = "SELECT *
        FROM q_admin
        WHERE username = :username  
        AND   password = :password"; 
        
        $namedParameters=array();
        $namedParameters['username']=$username;
        $namedParameters['password']=$password;
        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($record);

//print_r($record);

function error(){
    echo"<div id=''Sorry wrong Username or Password. Please Try again.</div>";
}

if (empty($record)) {
      error();
    header('Location: index.php'); //redirects users to admin page

} else {
   //echo "Successful login!";
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];//creates a record in the session associative array
        //  echo $_SESSION['adminFullName'];
        
   header('Location: admin.php'); //redirects users to admin page
}


?>