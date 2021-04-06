<?php

$db_user = 'root';//or localhost
$db_pass = ''; // your db_name
$db_name = 'loginsystem'; // root by default for localhost 
 // by defualt empty for localhost

$db = new PDO("mysql:host=localhost; dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 
?>