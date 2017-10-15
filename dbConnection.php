<?php

function getDatabaseConnection() {
    $host = 'us-cdbr-iron-east-05.cleardb.net'; //cloud 9 database
    $dbname = 'heroku_997fb852ab3ceee';
    $username = 'b841a76d65d2f3';
    $password = '419e605e';
    
    
    //creates database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //we'll be able to see some errors with database
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}
?>