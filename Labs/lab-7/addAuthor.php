<?php
//CONNECT TO DATABASSE
include '../../dbConnection.php';
$conn = getDatabaseConnection('quotes');

// if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
//     header("Location: index.php"); //redirects users to login page
//     exit;
// }
   
if (isset($_GET['addForm'])) { //checks if form was submitted
    //  echo "Form was submitted!";
    
    //EXAMPLE OF AN INSERT SQL
    //  $sql = "INSERT INTO table_name
    //  (fieldlilst)
    //  VALUES (valuelist)";
    
    
    $sql = "INSERT INTO `q_author` 
    (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) 
    VALUES (NULL, :firstName, :lastName, :gender, :dob, :dod, :profession, :country, :picture, :biography)";
     
     $namedPara=array();
     $namedPara[':firstName']=$_GET['firstName'];
     $namedPara[':lastName']=$_GET['lastName'];
     $namedPara[':gender']=$_GET['gender'];
     $namedPara[':dob']=$_GET['dob'];
     $namedPara[':dod']=$_GET['dod'];
     $namedPara[':profession']=$_GET['profession'];
     $namedPara[':country']=$_GET['country'];
     $namedPara[':picture']=$_GET['picture'];
     $namedPara[':biography']=$_GET['biography'];
     
     $stmt=$conn->prepare($sql);
     $stmt->execute($namedPara);
     
     echo "Form was submitted!";
     
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a new author</title>
    </head>
    <body>
        <h1>Add a new Author</h1>
        <fieldset>
            <legend>Adding a new Author</legend>
            <form>
                <label for="firstName">First Name:</label> <input type="text" name="firstName"/> <br/>
                <label for="lastName">Last Name: </label><input type="text" name="lastName"/> <br/>
                <label for="gender">Gender:</label> <input type="radio" name="gender" value="M"><lable for="male">Male</lable>
                        <input type="radio" name="gender" value="F"><label for="female">Female</label></br>
                <label for="dob">Date of Birth:</label><input type="date" name="dob"/><br/>
                <label for="dod">Date of Death:</label><input type="date" name="dod"/><br/>
                <label for="profession">Profession:</label><input type="text" name="profession"/><br/>
                <label for="country">Country:<select name="country"><option>USA</option><option>Germany</option><option>China</option><option>India</option></select></br>
                <label for="picture">Picture(URL):</label><input type="text" name="picture"/><br/>
                <label for="biography">Biography:</label></br><textarea name="biography" cols="55" rows="5"></textarea><br>
                <input type="submit" value="Add Author" name="addForm">
            </form>
        </fieldset>
        
    </body>
</html>