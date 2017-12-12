<?php
include 'dbConnection.php';
$conn = getDatabaseConnection('FProjectDB');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }

$sql = "DELETE FROM `shoes`
    WHERE `shoes`.`shoesId` = :shoesId";
    
    $namedParameters=array();
    $namedParameters[':shoesId']=$_GET['shoesId'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

// echo $sql;
echo $_GET['shoesId'];
// echo "Record was deleted!";


header('Location: admin.php');


?>
d