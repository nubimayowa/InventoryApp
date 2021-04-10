<?php

session_start();
if (!isset($_SESSION['userlogin'])){
    header("location: login.php");
}

if (isset($_GET['logout'])){
session_destroy();
unset($_SESSION);
header("location: login.php");

}


?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Store Manager</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
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

            <!-- <h3 id="logo">Welcome Mayowa</h1> -->
            
            <ul>
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard
                  </li>
               </a>
               <a href="attendants.php">
                  <li><i class="fas fa-user-alt"></i> Attendant</li>
               </a>
               <a href="product_list.php">
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
              
               <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <!-- <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> Create User</li>
               </a> -->
               <a href="index.php?logout=true">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>
            <!-- <a >
                  <li> Welcome Mayowa</li>
               </a> -->

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">
         <h2 class="container-title">latest products</h2>
         <div class="up-info-container">
            <div class="info-block">
               <div class="info-block-header info-block-header1">
                  <h3><i class="fas fa-shoe-prints"></i> shoes</h3>
               </div>
               <div class="info-block-content">
                  <h3>amount in stock</h3>
                  <p>12</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div>
            <!-- info-block -->
            <div class="info-block ">
               <div class="info-block-header info-block-header2">
                  <h3><i class="fas fa-shopping-bag"></i> bags</h3>
               </div>
               <div class="info-block-content">
                  <h3>amount in stock</h3>
                  <p>20</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div>
            <!-- info-block -->
            <div class="info-block ">
               <div class="info-block-header info-block-header3">
                  <h3><i class="fas fa-tshirt"></i> shirts</h3>
               </div>
               <div class="info-block-content">
                  <h3>amount in stock</h3>
                  <p>9</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div>
            <!-- info-block -->
         </div>
         <!-- up-info-container -->

         <h2 class="container-title">sales</h2>
         <div class="down-info-container">
            <div class="info-block">
               <div class="info-block-header info-block-header4">
                  <h3><i class="fas fa-money-check-alt"></i> total sales</h3>
               </div>
               <div class="info-block-content">
                  <p><i class="fas fa-dollar-sign"></i> 9000</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 24 hours</p>
               </div>
            </div>
            <!-- info-block -->
            <div class="info-block ">
               <div class="info-block-header info-block-header5">
                  <h3><i class="fas fa-users"></i> number of customers</h3>
               </div>
               <div class="info-block-content">
                  <p id="number-of-customers">90</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 24 hours</p>
               </div>
            </div>
            <!-- info-block -->
            <div class="info-block ">
               <div class="info-block-header info-block-header6">
                  <h3><i class="fas fa-credit-card"></i> total debt</h3>
               </div>
               <div class="info-block-content">
                  <p><i class="fas fa-dollar-sign"></i> 1000</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last 30 days</p>
               </div>
            </div>
            <!-- info block -->
         </div>
         <!-- down-info-container -->
         <h2 class="container-title">today sales records</h2>
         <div class="down-info-container">
            <table class="table1">
               <a href="sales.html">
                  <h2 class="view-all">view all</h2>
               </a>
               <thead>
                  <tr>
                     <th>PRODUCT NAME</th>
                     <th>PRODUCT TYPE</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <th>ATTENDANT NAME</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>SHOE</td>
                     <td>Wears</td>
                     <td>9</td>
                     <td>120</td>
                     <td>Segun Arinze</td>
                  </tr>
                  <tr>
                     <td>SHIRT</td>
                     <td>Wears</td>
                     <td>4</td>
                     <td>80</td>
                     <td>Peter Obi</td>
                  </tr>
                  <tr>
                     <td>TIE</td>
                     <td>Wears</td>
                     <td>2</td>
                     <td>55</td>
                     <td>Buhari Muhammad</td>
                  </tr>
                  <tr>
                     <td>SOCKS</td>
                     <td>Wears</td>
                     <td>7</td>
                     <td>40</td>
                     <td>Olusegun Obasanjo</td>
                  </tr>

               </tbody>
            </table>
         </div>
         <!-- End of sales record table -->
         <h2 class="container-title">some of our products</h2>
         <div class="down-info-container">
            <table class="table2">
               <a href="product_list.html">
                  <h2 class="view-all">view all</h2>
               </a>
               <thead>
                  <tr>
                     <th>PRODUCT NAME</th>
                     <th>PRODUCT TYPE</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <th>LAST PURCHASE DATE</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>SHOE</td>
                     <td>Wears</td>
                     <td>9</td>
                     <td>120</td>
                     <td>12/09/2018</td>
                  </tr>
                  <tr>
                     <td>SHIRT</td>
                     <td>Wears</td>
                     <td>4</td>
                     <td>80</td>
                     <td>20/02/2018</td>
                  </tr>
                  <tr>
                     <td>TIE</td>
                     <td>Wears</td>
                     <td>2</td>
                     <td>55</td>
                     <td>12/01/2018</td>
                  </tr>
                  <tr>
                     <td>SOCKS</td>
                     <td>Wears</td>
                     <td>7</td>
                     <td>40</td>
                     <td>02/12/2018</td>
                  </tr>

               </tbody>
            </table>
         </div>
      </div>
      <!-- End of right side -->
   </div>
   <!-- End of wrapper -->


   <script src="/js/main.js"></script>
   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>