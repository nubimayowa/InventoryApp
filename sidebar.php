<?php
session_start();
if (!isset($_SESSION['userlogin'])){
    header("location: login.php");
}

if (isset($_GET['logout'])){
session_destroy();
unset($_SESSION);
header("location:login.php");

}

?>


<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <title>Attendants</title>

<style>
   input[type=text], select, input[type=tel], input[type=date], input[type=password], input[type=email], input[type=number]  {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   
   
   
   
   input[type=submit], a.cancel {
     width: 50%;
     background-color: #000000;
     color: white;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     border-radius: 4px;
     cursor: pointer;
   }

   a.cancel {
     background-color: red;
   }
   
   input[type=submit]:hover {
     background-color: #45a049;
   }
   
  
   </style>
   </head>

<body>
   <div class="wrapper">
      <div class="left">
         <div id="sidebar" class="active">
            <div class="toggle-btn">
               <span></span>
               <span></span>
               <span></span>
            </div>
            <!-- toggle-button -->
            <h1 id="logo">Lifted Store</h1>
            <ul id="menu"></ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">