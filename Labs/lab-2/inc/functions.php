<?php
 function displaySymbol($randomValue, $pos){

       
    switch($randomValue){
        case 0: $symbol = "seven";
        break;
        case 1: $symbol = "grapes";
        break;
        case 2: $symbol = "cherry";
        break;
        case 3: $symbol = "lemon";
        break;
        case 4: $symbol = "orange";
        break;
    }
    echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' width='70px;' title='" . ucfirst($symbol) . "' height='70px;'/>";
     }
     

   function displayPoints($randomValue1, $randomValue2, $randomValue3){
        
      
        echo "<div id='output'>";
        if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1)
      {
       case 0: $totalPoints = 1000;     
       echo "<h1> Jackpot!</h1>";
       break;
       case 1: $totalPoints = 500;
       break;
       case 2: $totalPoints = 250;
       break;
        }
        echo "<h2>You Won $totalPoints points! </h2>";
            
    }
    else {
        echo "<h2> Try again!</h3>";
    }
    echo "</div>";
        
    }
       function play(){
 
  for ($i = 1; $i < 4; $i++){ //Without this for loop, images would not display.
        ${"randomValue" . $i} = rand (0, 4);
        displaySymbol(${"randomValue" . $i}, $i);
    }
    
    displayPoints($randomValue1, $randomValue2, $randomValue3); //must call function right after for loop.
 };


?>