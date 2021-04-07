<?php

session_start();
require_once("config.php");

//echo  "Hello from jslogin.php";


$password = $_POST['password'];
$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect-> execute([$username, $password]);


if($result){
    $user =  $stmtselect->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    // echo 'Success';

    if ($stmtselect->rowCount() > 0){
        $_SESSION["userlogin"] = $user;
        echo '1';
    }else {
        echo 'Please check your credentials properly';

    }

}else{
    echo 'There were errors connecting to the database.'; 
}