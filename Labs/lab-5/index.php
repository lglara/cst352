<?php


include '../../../dbConnection.php';
$dbConn = getDatabaseConnection();

function getRandomQuote() {
    
    global $dbConn;
    
    //Step 1: Generating a random quoteId

    $sql = "SELECT quoteId FROM q_quote";  //retrieves all quoteIds
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    //$records = array (1, 5, 7, 10,  15);
    
    //$randomIndex = rand(0, count($records)-1 );
    $randomIndex = array_rand($records);
    
    //echo($records[$randomIndex]['quoteId']);
    $quoteId = $records[$randomIndex]['quoteId'];
    
    //Step 2: Retreiving quote based on Random Quote Id
    $sql = "SELECT quote, firstName, lastName, authorId 
            FROM q_quote 
            NATURAL JOIN q_author
            WHERE quoteId = $quoteId";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch(); //using "fetch()" because it's expected to get ONLY ONE record        
    
    echo  "<h1><em>" . $record['quote']  . "</em></h1><br />";
    echo "<h3><a target='authorInfo' href='authorInfo.php?authorId=".$record['authorId']."'>  <div id='authorName'>-" . $record['firstName'] . " " . $record['lastName'] ."</div></a></h3>";

}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
        <link rel="stylesheet" href="css/main.css" type="text/css" />
    </head>
    <body>


    <?=getRandomQuote()?>        

    <br />
    <iframe name="authorInfo" width="90%" height="600px"></iframe>
    

    </body>
</html>