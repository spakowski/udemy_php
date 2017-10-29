<?php

require __DIR__."/autoload.php";
require __DIR__."/database.php";

$container = new App\Core\Container();

function encode($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
?>