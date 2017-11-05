<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection('quotes');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }

function getAuthorInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET['authorId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    global $conn;
    //echo "Update form was submitted!";
    
    $sql = "Update q_author SET
            `firstName`=:firstName,
            `lastName`=:lastName,
            `gender`=:gender,
            `dob`=:dob,
            `dod`=:dod,
            `profession`=:profession,
            `country`=:country,
            `picture`=:picture,
            `biography`=:biography 
            WHERE authorId=:authorId";
            
        $namedParameters=array();
        $namedParameters[':firstName']=$_GET['firstName'];
        $namedParameters[':lastName']=$_GET['lastName'];
        $namedParameters[':gender']=$_GET['gender'];
        $namedParameters[':dob']=$_GET['dob'];
        $namedParameters[':dod']=$_GET['dod'];
        $namedParameters[':profession']=$_GET['profession'];
        $namedParameters[':country']=$_GET['country'];
        $namedParameters[':picture']=$_GET['picture'];
        $namedParameters[':biography']=$_GET['biography'];
        $namedParameters[':authorId']=$_GET['authorId'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        echo "Record was updated!";
        
}


if (isset($_GET['authorId'])) {
    $authorInfo = getAuthorInfo();
    //print_r($authorInfo);
    
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
            
            <legend> Updating Author </legend>
            
            <form>
                 <input type="hidden" name="authorId" value="<?=$authorInfo['authorId']?>">
                 
                First Name: <input type="text" name="firstName" value="<?=$authorInfo['firstName']?>" /> <br />
                Last Name: <input type="text" name="lastName" value="<?=$authorInfo['lastName']?>"/> <br />
                Gender: <input type="radio" name="gender" value="F" id="genderF"  
                        <?php if ($authorInfo['gender']=="F") { echo "checked"; }  ?> />
                        <label for="genderF"></label>Female
                        <input type="radio" name="gender" value="M" id="genderM"
                        <?= ($authorInfo['gender']=="M")?"checked":"" ?> />
                        <label for="genderM"></label>Male <br />   
                Birth Date: <input type="date" name="dob" value="<?=$authorInfo['dob']?>"/><br /> 
                Death Date: <input type="date" name="dod" value="<?=$authorInfo['dod']?>"/><br /> 
                Profession: <input type="text" name="profession" value="<?=$authorInfo['profession']?>"/><br /> 
                Country: <select name="country">
                            <option>USA</option>
                            <option>Germany</option>
                            <option>China</option>
                            <option>India</option>
                        </select><br /> 
                Picture URL: <input type="text" name="picture"  value="<?=$authorInfo['picture']?>" />   <br>
                Biography: <br /> <textarea name="biography" cols="55" rows="5"><?=$authorInfo['biography']?></textarea><br>
                <input type="submit" value="Update Author" name="updateForm">
            </form>
            
        </fieldset>
        
    </body>
</html>