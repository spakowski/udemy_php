<?php
if (isset($_COOKIE["visits"])) 
    {$visits = $_COOKIE["visits"] +1 ;}
else {$visits = 0;}
setcookie("visits",$visits,0);
print_r($_COOKIE);
print_r($visits);
?>

<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Hallo Welt!</h1>
        <p>Diese Seite wurde 
        <?php  echo $visits;?> mal besucht
    </body>
</html>