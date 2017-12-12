<?php

include 'dbConnection.php';
$conn = getDatabaseConnection('quotes'); 
   
function getPants(){
       global $conn;
       $sql = "SELECT *
            FROM pants
            ORDER BY price";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
   }
   function getShoes(){
       global $conn;
       $sql = "SELECT *
            FROM shoes
            ORDER BY price";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
   }
   function getShirts(){
       global $conn;
       $sql = "SELECT *
            FROM shirts
            ORDER BY price";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="css/main.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    </head>
    <body>
    <h1><center>Welcome!</center></h1>
    
    <div id="table1" class="nextToEachother">
        <h2>Pants Table Info</h2>
        <?php
        $pants = getPants();
            foreach($pants as $pant) {
            echo"<table><tr>";
                echo "<td>".$pant['pantsId']."</td>";
                echo "<td>".$pant['color']."</td>";
                echo "<td>".$pant['price']."</td>";
                echo "<td>".$pant['pattern']."</td>";
        echo "</tr></table>";
        }
        ?>
            <button id="pantsTotals" class="btnInline">Total # of Pants?</button>
            <button id="pantsAVGPrice" class="btnInline">My Pants Price Average?</button> 
            <div id="pTotals" class="smallInline"></div>
            <div id="pAvg" class="smallInline"></div>
        </div>
    <div id="table2" class="nextToEachother">
        <h2>Shirts Table Info</h2>
        <?php
            $shirts = getShirts();
            foreach($shirts as $shirt) {
                echo"<table><tr>";
                echo "<td>".$shirt['shirtId']."</td>";
                echo "<td>".$shirt['price']."</td>";
                echo "<td>".$shirt['color']."</td>";
                echo "<td>".$shirt['pattern']."</td>";
                echo "</tr></table>";
            }
            ?>
            <button id="shirtTotals" class="btnInline">Total # of Shirts?</button>
            <button id="shirtAVGPrice" class="btnInline">My Shirts Price Average?</button> 
            <div id="shTotals" class="smallInline"></div>
            <div id="shAvg" class="smallInline"></div>
        </div>
    <div id="table3" class="nextToEachother"><h2>Shoes Table Info</h2>
    <?php
            $shoes = getShoes();
            foreach($shoes as $shoe) {
                echo"<table><tr>";
                echo "<td>".$shoe['shoesId']."</td>";
                echo "<td>".$shoe['color']."</td>";
                echo "<td>".$shoe['price']."</td>";
                echo "<td>".$shoe['pattern']."</td>";
                echo "</tr></table>";
            }
            ?>
        <button id="shoeTotals" class="btnInline">Total # of Pairs of Shoes?</button>
        <button id="shoeAVGPrice" class="btnInline">My Shoes Price Average?</button> 
        <div id="sTotals" class="smallInline"></div>
        <div id="sAvg" class="smallInline"></div>
    </div>
    <br>
    <button id="btn" href="logIn.php"> Build My Own! </button>
    </body>
    <script>
        document.getElementById("btn").onclick = function () {
        location.href = "logIn.php";
        };
        
        $("#pantsTotals").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "pantsTotals.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#pTotals').append("Your total pairs of Pants are " + data+" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    $("#shirtTotals").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "shirtsTotals.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#shTotals').append("Your total amount of shirts are " + data +" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    $("#shoeTotals").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "shoeTotals.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#sTotals').append("Your total pairs of shoes are " + data +" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    $("#pantsAVGPrice").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "pantsAvg.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#pAvg').append("The average cost of your pants is $" + data +" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    $("#shirtAVGPrice").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "shirtAvg.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#shAvg').append("The average cost of your Shirts are $" + data +" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    $("#shoeAVGPrice").click(function() {
        
            $.ajax({
                    type: "GET",
                    url: "shoeAvg.php",
                })
                .done(function(data) {
                    console.log(data);
                    $('#sAvg').append("The average cost of your shoes is $" + data +" !");
                })
                .fail(function(xhr, status, errorThrown) {
                    console.log("Sorry, there was a problem!");
                })
                .always(function(xhr, status) {
                    console.log("The request is complete!");
                });
                return false;
    });
    </script>
</html>