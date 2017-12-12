<?php
include 'dbConnection.php';
$conn = getDatabaseConnection('FProjectDB');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }

$sql = "DELETE FROM `shirts`
    WHERE `shirts`.`shirtId` = :shirtId";
    
    $namedParameters=array();
    $namedParameters[':shirtId']=$_GET['shirtId'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

echo $sql;
echo $_GET['shirtId'];
// echo "Record was deleted!";


header('Location: admin.php');


?>