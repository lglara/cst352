<?php
include 'dbConnection.php';
  $conn = getDatabaseConnection('FProjectDB'); 

      global $conn;
      $sql = "SELECT AVG(price) AS avgPrice FROM `shoes` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = $records[0];
        // print_r($result);
    echo $result[avgPrice];
    // echo json_encode($result);
    // return $result
// print_r($categories)

?>    

