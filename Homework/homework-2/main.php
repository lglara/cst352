<?php
$baseVeggieArray= array("Lettuce", "Spinach", "Kale", "SpringMix");
$restOfVeggiesArray= array("tomatos", "onion", "bell peper", "corn", "cucumber", "celery", "eggplant");
$meatsArray=array("smoked turkey", "normal turkey", "ham", "honey ham", "roast Beef", "beef pastrami", "salami", "bologna");
$cheeseArray=array("mozzarella", "swiss", "cheddar", 'provolone', "pepper jack", "american");
$condiments=array("ketchup", "mustard", "mayonnaise", "pickle relish", "hummus", "guacamole","pesto");

global $sandwhichType;
global $itemAmount;
global $sandwhichOutside;

    $sandwhichType = $_POST['sandwhich-type'];
    $itemAmountt = $_POST['itemAmount'];
    // echo $sandwhichType;
    // echo $itemAmountt;

function gettingSandwichItems($itemAmount){
    
    while ($x <= $itemAmount-1){
        $i = rand(0, 6);
        $vegNum= $x+1;
        echo "<h5> Veggie ".$vegNum.":".$restOfVeggiesArray[$i] ."</h5>";
        $x++;
    }
}

    function randomArrayElement($somearray){
        shuffle($somearray);
        
        $amountOfItemsInArray=count($somearray)-1;
        $randomItem=rand(0,$amountOfItemsInArray);
        
        for ($i=0; $i<=$amountOfItemsInArray; $i++){
            if($i==$randomItem){
                echo $somearray[$randomItem];
            }
        }
    }
echo "<head>
        <meta charset='utf-8'/> 
        <title>Build a sandwhich</title>
        <link rel='stylesheet' href='css/main.css' type='text/css' />
        </head>";
echo "<body>
        <header>
            <h2>Your Results:</h2>
        </header>
        <container><div id='secContainer'>
        ";
if ($sandwhichType == "veggiterian"){
    $sandwhichOutside ="slice of bread";
    echo $sandwhichOutside;
    echo "<br><h5>With :</h5>";
    randomArrayElement($baseVeggieArray);
    echo "<br><h5>And the following vegetables :</h5>";
    gettingSandwichItems($itemAmountt);
    echo "<h5>With a squirt of :</h5>";
    randomArrayElement($condiments);
    echo "<br><h5>Yummy :</h5>";
    randomArrayElement($cheeseArray);
    echo "<h5>And finally Another </h5>";
    echo $sandwhichOutside;
} elseif ($sandwhichType == "Omnivore"){
    $sandwhichOutside ="bread";
    echo $sandwhichOutside;
    echo "<br><h5>With :</h5>";
    randomArrayElement($baseVeggieArray);
    echo "<br><h5>And the following vegetables :</h5>";
    gettingSandwichItems($itemAmountt);
    echo "<br><h5>A Layer of :</h5>";
    randomArrayElement($meatsArray);
    echo "<br><h5>Yummy :</h5>";
    randomArrayElement($cheeseArray);
    echo "<h5>With a squirt of :</h5>";
    randomArrayElement($condiments);
    
    echo "<h5>And finally Another </h5>";
    echo $sandwhichOutside;
    } else {
        $sandwhichOutside ="Iceberge Lettuce Leaf";
        echo $sandwhichOutside;
        echo "<br><h5>With :</h5>";
        randomArrayElement($baseVeggieArray);
        echo "<br><h5>And the following vegetables :</h5>";
        gettingSandwichItems($itemAmountt);
        echo "<h5>With a squirt of :</h5>";
        randomArrayElement($condiments);
        echo "<h5>And finally Another </h5>";
        echo $sandwhichOutside;
    }
    echo"</div></container>
        <footer>
            <span>CST 352-01. 2017&copy; Garica</span><br>
            <b>Disclaimer:</b><span>The information in this webpage is fictitous. </span><br>
            <span>It is used for academic purposes only.</span>
        </footer>
    </body>";

?>





