<?php
session_start();//continues the session containing prevouse information

// print_r($_SESSION);

if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
    header("Location: index.php"); //redirects users to login page
    exit;
}

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
        <title>Admin Main Page</title>
        <link rel="stylesheet" href="css/main.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="header">
            <h1>Your Wardrobe Page!</h1>
            <h2>Welcome <? $_SESSION[adminFullName] ?> ! </h2>
            <h3>Add and Edit Existing Records.</h3>
            <div id="navigation">
                <div class="dropdown">
                  <button class="dropbtn">Navigation</button>
                  <div class="dropdown-content">
                    <a href="index.php">Home</a>
                    <a href="logout.php">LogOut</a>
                  </div>
                </div>
            </div>
        </div>
        
        <div id="container">
        <div id="pants" class="inlineDisplay">
            <form action='addPants.php'>
                <input type="submit" value="Add a new Pants!"/>
            </form>
            <table><tr></tr><th>Id</th><th>Color</th><th>Price</th><th>Pattern?</th></tr>
            <?php
            $pants = getPants();
            foreach($pants as $pant) {
            echo"<tr>";
                echo "<td>".$pant['pantsId']."</td>";
                echo "<td>".$pant['color']."</td>";
                echo "<td>".$pant['price']."</td>";
                echo "<td>".$pant['pattern']."</td>";
            //adding the author id to the url of the update author page to let us know which author to update
            echo "<td><a href='updatePants.php?pantsId=".$pant['pantsId']."'>Update</a></td>  ";
            echo "<td><a href='deletePants.php?pantsId=".$pant['pantsId']."'>Delete</a></td>  ";
            echo "</tr>";
            }
            ?>
            </table>
        </div>
        
        <div id="shirts" class="inlineDisplay">
        <form action='addShirts.php'>
                <input type="submit" value="Add a new Shirt!"/>
            </form>
            <table><tr></tr><th>Id</th><th>Color</th><th>Price</th><th>Pattern?</th></tr>
            <?php
            $shirts = getShirts();
            foreach($shirts as $shirt) {
                echo"<tr>";
                echo "<td>".$shirt['shirtId']."</td>";
                echo "<td>".$shirt['price']."</td>";
                echo "<td>".$shirt['color']."</td>";
                echo "<td>".$shirt['pattern']."</td>";
            //adding the author id to the url of the update author page to let us know which author to update
            echo "<td><a href='updateShirts.php?shirtId=".$shirt['shirtId']."'>Update</a></td> ";
            echo "<td><a href='deleteShirts.php?shirtId=".$shirt['shirtId']."'>Delete</a></td> ";
            echo "</tr>";
            }
            ?>
            </table>
        </div>
            
        <div id="shoes" class="inlineDisplay">
            <form action='addShoes.php'>
                <input type="submit" value="Add new shoes!"/><br>
            </form>
            <table><tr></tr><th>Id</th><th>Color</th><th>Price</th><th>Pattern?</th></tr>
            <?php
            $shoes = getShoes();
            foreach($shoes as $shoe) {
                echo"</tr>";
                echo "<td>".$shoe['shoesId']."</td>";
                echo "<td>".$shoe['color']."</td>";
                echo "<td>".$shoe['price']."</td>";
                echo "<td>".$shoe['pattern']."</td>";
            //adding the author id to the url of the update author page to let us know which author to update
            echo "<td><a href='updateShoes.php?shoesId=".$shoe['shoesId']."'>Update</button></a> ";
            echo "<td><a href='deleteShoes.php?shoesId=".$shoe['shoesId']."'>Delete</button></a> ";
            echo "</tr>";
            }
            ?>
            </table>
        </div>
        </div>
        
        
    </body>
</html>