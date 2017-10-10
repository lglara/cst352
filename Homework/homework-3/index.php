<?php

function processForm(){
if ( isset($_GET['firstName'],$_GET['lastName'],$_GET['item1'],$_GET['item2'],$_GET['item3'],$_GET['item4'],$_GET['item5']) ) {
    
    $firstName = $_GET['firstName']; 
    $lastName = $_GET['lastName'];
    $item1 = $_GET['item1'];
    $item2 = $_GET['item2'];
    $item3 = $_GET['item3'];
    $item4 = $_GET['item4'];
    $item5 = $_GET['item5'];
    
//   print_r($firstName) ;
//   echo $lastName;
//   echo $item1;
//   echo $item2;
//   echo $item3;
//   echo $item4;
//   echo $item5;
    
    echo "<h1 class='text-success'>Here are your results $firstName $lastName:<br><h1/>";
   
  $foodPoints=0;
    
    switch ($item1) {
    case "Corn Flakes":
        $foodPoints=4;
        break;
    case "Water Bottles":
        $foodPoints=2;
        break;
    case "Water Canteen":
        $foodPoints=1;
        break;
    case "Pizza":
        $foodPoints=5;
        break;
    case "Canned Food":
        $foodPoints=3;
        break;
    default:
        echo "<div class='text-danger'>First Entry Invalid</div>";
    }
    
    $clothesPoints=0;
    
    switch ($item2) {
    case "bathing suit":
        $clothesPoints=3;
        break;
    case "Overalls":
        $clothesPoints=2;
        break;
    case "Jacket":
        $clothesPoints=1;
        break;
    default:
        echo "<div class='text-danger'>Second Entry Invalid</div>";
    }
    
    $skillPoints=0;
    
    switch ($item3) {
    case "Hunting":
        $skillPoints=1;
        break;
    case "Fisher":
        $skillPoints=2;
        break;
    case "Fire":
        $skillPoints=3;
        break;
    default:
        echo "<div class='text-danger'>Third Entry Invalid</div>";
    }
    
    $equipPoints=0;
    
    switch ($item4) {
    case "Radio":
        $equipPoints=3;
        break;
    case "Knife":
        $equipPoints=1;
        break;
    case "Rope":
        $equipPoints=2;
        break;
    default:
        echo "<div class='text-danger'>Fourth Entry Invalid</div>";
    }
   
  $randomItemPoints=strlen($item5);

  echo"<h4 class='text-success'>Food Selection Points: $foodPoints</h4>";
  echo"<h4 class='text-success'>Clothes Selection Points: $clothesPoints</h4>";
  echo"<h4 class='text-success'>Skill Selection Points: $skillPoints</h4>";
    echo"<h4 class='text-success'>Equipment Selection Points: $equipPoints</h4>";
  echo"<h4 class='text-success'>Random Selection Points: $randomItemPoints</h4>";
   
  $totalPoints=$foodPoints+$clothesPoints+$skillPoints+$equipPoints+$randomItemPoints;
   
  echo"<h3>Based on my calculations your total is $totalPoints.</h3><br>";
   
  if($totalPoints<=8){
      echo "<div class='text-success'>You will survive!</div>";
    } else if ($totalPoints<=12) {
          echo"<h3 class='text-warning'>You might struggle but will survive.</h3>";
      } else if ($totalPoints >=12){
          echo"<h3 class='text-danger'>I would reconsider your selections.</h3>";
  }
  echo"<form action='https://cst352-01-lglara.c9users.io/lgarcialara/Homework/homework-3/index.php'><input type='submit' value='Try Again'></form>
";
}
}                         
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assignent 3: HTML Forms/PHP</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/main.css" type="text/css" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form>
            <h1>Hello</h1>
            <div id="nameRequest">Please enter the following Information<br>
            First name:<br>
            <input type="text" name="firstName" ><br>
            Last name:<br>
            <input type="text" name="lastName">
            </div>
            
            <h2>Please select the items you would like to have on a deserted Island.</h2>
            
            <h4>Item 1: Food</h4>
             <select name="item1" >
                <option value="Corn Flakes">Corn Flakes</option>
                <option value="Water Bottles">Water Bottles</option>
                <option value="Water Canteen">Water Canteen</option>
                <option value="Pizza">Pizza</option>
                <option value="Canned Food">Canned Food</option>
              </select>
            <h4>Item 2: Cloths</h4>
            <input type="radio" name="item2" value="bathing suit" checked> Bathing Suit<br>
            <input type="radio" name="item2" value="Jacket"> Jacket<br>
            <input type="radio" name="item2" value="Overalls"> Overalls  
            <h4>Item 3: Skill</h4>
            <input type="checkbox" name="item3" value="Hunting" >Awsome Hunter.<br>
            <input type="checkbox" name="item3" value="Fisher">Rad Fisher.<br>
            <input type="checkbox" name="item3" value="Fire" checked="checked">Fire Making Skils.<br>
            <h4>Item 4: Equipment</h4>
            <select name="item4">
                <option value="Radio">Radio</option>
                <option value="Knife">Knife</option>
                <option value="Rope">Rope</option>
              </select>
            <h4>Item: Random Item</h4>
            <input type="item5" name="item5" />
            <input type="submit" value="Submit"/>
        </form>
        <?php
        
          if (!isset($_GET["firstName"])) { // is there any parameter called "keyword" in the URL
              echo "<h2>Press Submit to See Your Results!</h2>";
          }     else if ((empty($_GET['firstName']) ))  {
                              echo "<div id='errorMessage'>";
                              echo "<h2 style='color:red'> ERROR: Please fill out all of the fields. ";
                            //   return;
                              exit; 
                              echo "</div>";
          }else{
              processForm();
          }
          ?>  
          
    </body>
</html> 