<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection('quotes');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }

function confirmDelete(){
    echo"Are you sure you want to delete this Author?";
    echo"<button>
}

$sql = "DELETE FROM q_author 
        WHERE authorId = " . $_GET[authorId];

$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: admin.php');


?>
