<?php
include 'dbConnection.php';
$conn = getDatabaseConnection('FProjectDB');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }

function getPantsInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM pants
            WHERE pantsId = :pantsId";
            
     $namedPara=array();
     $namedPara[':pantsId']=$_GET['pantsId'];    
    //  echo $_GET['pantsId'];
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedPara);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['update'])) { //Admin submitted update form
    global $conn;
    //echo "Update form was submitted!";
    
    $sql = "UPDATE `pants` SET
            `color` = :color, 
            `price` = :price, 
            `pattern` = :pattern 
            WHERE `pants`.`pantsId` = :pantsId";
            
            
        $namedParameters=array();
        $namedParameters[':pantsId']=$_GET['pantsId'];
        $namedParameters[':color']=$_GET['color'];
        $namedParameters[':price']=$_GET['price'];
        $namedParameters[':pattern']=$_GET['pattern'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        // echo $sql;
        echo "Record was updated!";
        header('Location: admin.php');
        
}


if (isset($_GET['pantsId'])) {
    $pantsInfo = getPantsInfo();
    // print_r($pantsInfo);
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Author's Info </title>
    </head>
    <body>

        <h1> Updating Author's Info </h1>
        
        <fieldset>
            
            <form>
                <H3>Updating Record: #<?= $pantsInfo['pantsId'] ?> !</H3>
                <input type="hidden" name="pantsId" value="<?=$pantsInfo['pantsId']?>">
                <h3>Style</h3>
                <select name="style">
                    <option>short</option>
                    <option>Long</option>
                </select>
                <h3>Color Family</h3>
                <select name="color">
                    <option id="c1">Red</option>
                    <option id="c2">Orange</option>
                    <option id="c3">Yellow</option>
                    <option id="c4">Green</option>
                    <option id="c5">Blue</option>
                    <option id="c6">Purple</option>
                </select>
                <h3>Price</h3>
                <input type="text"  id="price" name="price" value="<?=$pantsInfo['price']?>"/>
                <h3>Does it Have a Pattern?</h3>
                <select name="pattern">
                    <option> Yes </option>
                    <option> No </option>
                </select>
                <input type="submit" value="update" id="update" name="update"/>
            </form>
            
        </fieldset>
        
    </body>
</html>