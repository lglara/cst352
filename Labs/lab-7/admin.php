<?php
session_start();//continues the session containing prevouse information

// print_r($_SESSION);

if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
    header("Location: index.php"); //redirects users to login page
    exit;
}

include '../../dbConnection.php';
   $conn = getDatabaseConnection('quotes'); 

   function authorDisplay(){
       global $conn;
       $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
   }
 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Main Page</title>
    </head>
    <body>
        <h1>Admin Page</h1>
        <h2>Welcome <?=$_SESSION[adminFullName]?> ! </h2>
        <form action='addAuthor.php'>
            <input type="submit" value="Add a new author"/>
        </form>
        <?php
        $authors = authorDisplay();
        
        foreach($authors as $author) {
        echo "[<a href='updateAuthor.php?authorId=" .$author['authorId']."'>Update</a>] ";//adding the author id to the url of the update author page to let us know which author to update
        // echo "[<a href='deleteAuthor.php?authorId=".$author['authorId']."'>Delete</a>] ";
        echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='authorId' value='".$author['authorId']."'>
                    <input type='submit' value='Delete'>
                  </form>";
        echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        
        ?>
        
        
        <form action="logout.php">
    <input type="submit" value="Logout" />
</form>
        
    </body>
</html>