<?php

session_start();
require_once("config.php");

//echo  "Hello from jslogin.php";


$password = $_POST['password'];
$empId = $_POST['empId'];

$sql = "SELECT * FROM registration WHERE empid = ? AND pass = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect-> execute([$empId, hash('SHA256', $password)]);

if($result){
    $user =  $stmtselect->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    // echo 'Success';

    if ($stmtselect->rowCount() > 0){
        $_SESSION["userlogin"] = $user;
        echo 'Login successful, Redirecting...';
    }else {
        echo 'Please check your credentials properly';

    }

}else{
    echo 'There were errors connecting to the database.'; 
}