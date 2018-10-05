<? php

session_start();//starting with session for time
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
         <h1>Silverjack</h1>
        <?php
        
         $_SESSION['times'] = array();
         
         
         //creating 3 variables for calculate time
         $startTime = microtime(true);
         $endtime = microtime(true);
         $avgTime; 
         $totalTime; 
         
        ?>
        <div>
          <?php
          include 'functions.php';
          play();
          
          ?>

        </div>
        <div id = "time">
            <?php
              echo "Time elapsed: " . $startTime . " secs";
              echo "Average Elapsed time: " . $avgTime . " secs";
              echo "Number of games played: ";
            ?>
            
        </div>
    </body>
</html>
