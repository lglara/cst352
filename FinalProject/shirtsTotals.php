<?php
include 'dbConnection.php';
  $conn = getDatabaseConnection('FProjectDB'); 

      global $conn;
      $sql = "SELECT COUNT(shirtId) AS totalShirts FROM `shirts` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = $records[0];
        // print_r($result);
    echo $result[totalShirts];
    // echo json_encode($result);
    // return $result
// print_r($categories)

?>    

