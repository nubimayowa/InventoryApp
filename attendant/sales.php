<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Sales Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="../styles/main.css" />
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
            <h1 id="logo">shoppy</h1>
            <ul>
               <a href="index.php">
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
               </a>
               <a href="product_list.php">
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="/index.php">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">
         <h2 class="container-title">sales</h2>
         <div class="up-info-container">
            <a href="#">
               <h2 class="view-all add-product"><i class="fas fa-plus"></i> add sale</h2>
            </a>
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
            <div class="info-block">
               <div class="info-block-header info-block-header2">
                  <h3><i class="fas fa-money-check-alt"></i> total sales</h3>
               </div>
               <div class="info-block-content">
                  <p><i class="fas fa-dollar-sign"></i> 21000</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 7 days</p>
               </div>
            </div>
            <!-- info-block -->
            <div class="info-block">
               <div class="info-block-header info-block-header4">
                  <h3><i class="fas fa-money-check-alt"></i> total sales</h3>
               </div>
               <div class="info-block-content">
                  <p><i class="fas fa-dollar-sign"></i> 40000</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 30 days</p>
               </div>
            </div>
            <!-- info-block -->
         </div>
         <!-- up-info-container -->

         <h2 class="container-title">sales info</h2>
         <input type="text" id="myInput" placeholder='Search by product name..'>
         <div class="down-info-container">
            <table class="table1">
               <thead>
                  <tr>
                     <th>PRODUCT NAME</th>
                     <th>PRODUCT TYPE</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <th>PURCHASE DATE</th>
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