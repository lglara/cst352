<?php
//CONNECT TO DATABASSE
include 'dbConnection.php';
$conn = getDatabaseConnection('quotes');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }
   
if (isset($_GET['submit'])) { //checks if form was submitted
    //  echo "Form was submitted!";
    
    
    $sql = "INSERT INTO `shirts` 
    (`shirtId`, `color`, `price`, `pattern`) 
    VALUES (NULL, :color, :price, :pattern)";
     
     $namedPara=array();
     $namedPara[':color']=$_GET['color'];
     $namedPara[':price']=$_GET['price'];
     $namedPara[':pattern']=$_GET['pattern'];
     
     $stmt=$conn->prepare($sql);
     $stmt->execute($namedPara);
     
     echo "Form was submitted!";
     header('Location: admin.php');
     
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a new Shirt!</title>
    </head>
    <body>
        <h1>Add a new Shirt!</h1>
        <fieldset>
            <form>
                <H3>Add Record</H3>
                <h4>Style</h4>
                <select name="style">
                    <option>short</option>
                    <option>Long</option>
                </select>
                <h4>Color Family</h4>
                <select name="color">
                    <option id="c1">Red</option>
                    <option id="c2">Orange</option>
                    <option id="c3">Yellow</option>
                    <option id="c4">Green</option>
                    <option id="c5">Blue</option>
                    <option id="c6">Purple</option>
                </select>
                <h4>Price</h4>
                <input type="text"  id="price" name="price"/>
                <h4>Does it Have a Pattern?</h4>
                <select name="pattern">
                    <option> Yes</option>
                    <option> No </option>
                </select>
                <input type="submit" value="submit" id="submit" name="submit"/>
            </form>
        </fieldset>
        
    </body>
</html>