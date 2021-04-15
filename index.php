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
   <title>Store Manager</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <title>Index</title>
</head>

<body>
<?php require_once 'productprocess.php'; ?>

<?php
$mysqli = new mysqli ('localhost', 'root', '', 'loginsystem',) or die (mysqli_error($mysqli));
$result = $mysqli->query ("SELECT * FROM  products") or die ($mysqli->error);
?>
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
                  <li><i class="fas fa-user-alt"></i> Attendants</li>
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
      <div class="right" style="padding-right: 70px;padding-left: 20px;">
   
         <!-- End of sales record table -->
         <h2 class="container-title">Dashboard</h2>
        
         <a href="product_list.php" class="container-header"> Create and manage Products. Click Here..</a>
         <input type="text" id="myInput" placeholder='Search for product by name..'>

        
         
         <div class="row down-info-container">
         
         
            <table class="table3 searchTable">
               <thead>
                  <tr>
                     <th>PRODUCT NAME</th>
                     <th>CATEGORY</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <th> PURCHASE DATE</th>
                     <!-- <th>OPERATION</th> -->
                  </tr>
               </thead>

               <?php
               while ($row= $result-> fetch_assoc()):?>
               <tbody>
                  <tr>
                     <td><?php echo $row ["product_name"];?></td>
                     <td><?php echo $row ["category"];?></td>
                     <td><?php echo $row ["quantity"];?></td>
                     <td><?php echo $row ["price"];?></td>
                     <td><?php echo $row ["date"];?></td>
                     <!-- <td>
                      <a href="product_list.php?edit=<?php echo $row['product_id'];?>" class="edit">Edit</a>
                      <a href="productprocess.php?delete=<?php echo $row['product_id'];?>"class="delete">Delete</a>
                      </td> -->
                  </tr>
                  <?php endwhile;?>
               </tbody>
            </table>
         </div>
<br>
<br>
<br>
<a href="attendants.php" class="container-header"> Create and manage Attendants. Click Here..</a>
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

         <?php

         function pre_r ($array){
            echo '<pre>';
            print_r($array);
            echo "</pre>";
         }
         ?>
      </div>
      
      
      <!-- End of right side -->
   </div>
   
   <!-- End of wrapper -->


   <script src="/js/main.js"></script>
   <script type="text/javascript" src="./js/attendant.js"></script>
   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>