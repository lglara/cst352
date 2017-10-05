<?php
$backgroundImage = "img/sea.jpg";

if ( isset($_GET['keyword']) ) {
    
    echo "keyword typed: " .  $_GET['keyword'] . "<br />";
    echo "layout selected: " .  $_GET['layout'] . "<br />";

    include 'api/pixabayAPI.php';
    
    if (isset($_GET['layout'])) {
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
    } else {
         $imageURLs = getImageURLs($_GET['keyword']);
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4 Pixabay Slideshow </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url('css/styles.css');
            body {
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
        
    </head>
    <body>
        <form method="GET">
            
            <input type="text" name="keyword" placeholder="Type keyword"/>
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="layout_h">
                <label > Horizontal </label><br>
                 <input type="radio" name="layout" value="vertical" id="layout_v">
                 <label > Vertical </label><br>
            </div>
             <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option>Forest</option>
                <option>Snow</option>
            </select>
            <input type="submit" name="Search!"/>
            
        </form> 
       <?php
       //USER HAS NOT SUBMITED THE FORM
       if (!isset($imageURLs)) {  //if form hasn't been submitted
          echo "<h2> Type a keyword to display a slideshow 
                with random images from Pixabay.com </h2>" ;    
       } 
       else if (isset($_GET["keyword"]) ) { // is there a parameter called "keyword" as part of the URL
        getImages();
       }
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?=$imageURLs[0]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                <div class="item">
                  <img src="<?=$imageURLs[1]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                <div class="item">
                  <img src="<?=$imageURLs[2]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>                
                ...
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    </body>
</html>

