<?php
session_start();
print_r(session_save_path());
var_dump($_COOKIE);
var_dump($_SESSION);
$_SESSION["Rabatt"]=0.1;
?>