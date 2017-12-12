<?php
include 'dbConnection.php';
  $conn = getDatabaseConnection('FProjectDB'); 

      global $conn;
      $sql = "SELECT COUNT(pantsId) AS totalPants FROM `pants` WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = $records[0];
        // print_r($result);
    echo $result[totalPants];
    // echo json_encode($result);
    // return $result
// print_r($categories)

?>    

