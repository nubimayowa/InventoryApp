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
   <title>Product Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <title>Attendants</title>
  
</head>
<style>
   input[type=text], select, input[type=tel], input[type=date], input[type=password], input[type=email]  {
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
            <ul>
               <a href="index.php">
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
               </a>
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-user-alt"></i> attendants</li>
               </a>
               <a href="product_list.php">
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
            
               <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="attendants.php?logout=true">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right" ">
         <h2 class="container-title"> Create attendants</h2>
         <div class="up-info-container">
            <div>
               <form class="attendant">
                
               <label for="Eid">Employment Id *</label>
                 <input type="text" name="empid"  placeholder="Enter Employment Id.." required="true">

                 <label for="lname">Staff Name *</label>
                 <input type="text" name="staff_name" placeholder="Enter Staff Name.." required="true">
               
                
                 <label for="mon">Mobile Number *</label>
                 <input type="tel" name="mob"   placeholder="Enter Mobile Number.." required="true">

                 <label for="lname">Password <?php
                 
                 if(isset($_GET['edit'])) {
                  echo "";
                 }
                  else {
                     echo "*";
                  }
                 ?></label>
                 <input type="password" name="pass"  placeholder="Enter Password.." 
                 <?php
                 if(isset($_GET['edit'])) {
                  echo "";
                 }
                  else {
                     echo 'required="true"';
                  }
                 ?>
                 >

                 <label for="email">Email Address *</label>
                 <input type="email" name="email" placeholder="Enter Email Address.." required="true">
                
                <!-- employmemt date -->
                 <label for="Doe">Employment Date *</label>
                 <input type="date"  name="doe" required="true">

                 <input type="submit" value="Submit">
                 <?php 
                  if(isset($_GET['edit'])) {
                     echo "<a class='cancel' href='attendants.php'> Cancel</a>";
                  }
                 ?>
               </form>
             </div>
             </div>
 
           

         <h2 class="container-title">attendants info</h2>
         <input type="text" id="myInput" placeholder='Search for staff by Employeement Id..'>
         <div class="down-info-container">
            <table class="table4 searchTable">
               <thead>
                  <tr>
                     <th>EMPLOYMENT ID</th>
                   
                     <th>STAFF NAME</th>
                     <th>MOBILE NUMBER</th>
                     <th>EMAIL ADRESS</th>
                    
                     <th>EMPLOYMENT DATE</th>
                     <th>OPERATION</th>
                  </tr>
               </thead>
               <tbody id="tbody">
                  <tr>
                  <td colspan="6">No data</td>
                  </tr>
  
               </tbody>
            </table>
         </div>
      </div>
      <!-- End of right side -->
   </div>
   <!-- End of wrapper -->


   <script src="./js/main.js"></script>
   <script type="text/javascript" src="./js/attendant.js"></script>
</body>

</html>