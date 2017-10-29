<pre>
<?php
 print_r ($_POST);
 $datum = explode("-",$_POST["birthday"]);
 $timestamp = mktime (0,0,0,$datum[1],$datum[0],$datum[2]);
 echo ("$timestamp Sekunden nach 1.1.1070 geboren\n");
 echo "Heute ist der ", date("d-m-Y",time()), ". Das sind ",time(), " Sekunden nach Unix";
 $ageSeconds = time() - $timestamp;
 var_dump ($ageSeconds);
 $ageYears= floor   ($ageSeconds / (60*60*24*365) );
 $ageMonths =($ageSeconds % (60*60*24*365)) / (60*60*24*30);
 $ageDays = floor   ($ageSeconds % (60*60*24*365) % (60 *60*24*30) / (60*60*24) );
 echo "Du bist $ageYears Jahre, $ageMonths Monate und $ageDays Tage  alt!";
?>
</pre>