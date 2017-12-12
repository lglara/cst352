<?php
include 'dbConnection.php';
  $conn = getDatabaseConnection('FProjectDB'); 

      global $conn;
      $sql = "SELECT COUNT(shoesId) AS totalShoes FROM `shoes` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = $records[0];
        // print_r($result);
    echo $result[totalShoes];
    // echo json_encode($result);
    // return $result
// print_r($categories)

?>    

