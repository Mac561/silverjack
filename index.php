<?php
$startTime = microtime(true); // Code on how to do time inspired by https://stackoverflow.com/questions/25231153/show-load-time-on-page 
session_set_cookie_params(0);
session_start();//starting with session for time
echo "<h1> hello </h1>";
$_SESSION['loaded'];
$_SESSION['sum'];


if ( !isset($_SESSION['loaded']) ) {  //do this when session doesn't exist ONLY
   $_SESSION['loaded']  = 1;
   $_SESSION['time'] = 0;
    $_SESSION['sum'] = 0;
    }
else{
    $_SESSION['loaded'] = ($_SESSION['loaded'] + 1);

}
if($_SESSION['loaded'] == 51) {
    unset($_SESSION['loaded']);
    unset($_SESSION['time']);
    unset($_SESSION['sum']);
    $_SESSION['loaded'] = 1;
}
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
        

         
         //creating 3 variables for calculate time
        // $startTime = microtime(true);
         //$endtime = microtime(true);
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
            
              //echo "Time elapsed: " . $startTime . " secs";
              $endTime = microtime(true);
              $_SESSION['time'] = $endTime - $startTime;
              
               
              echo "Time elapsed: " . $_SESSION['time'] . " secs";
              $_SESSION['sum'] += $_SESSION['time'];
              $avgTime = ($_SESSION['sum']/ $_SESSION['loaded']);
              echo "Average Elapsed time: " . $avgTime . " secs";
              echo "Number of games played: " . $_SESSION['loaded'];
              //session_destroy();
            ?>
            
        </div>
    </body>
</html>

