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
<html lang="en">


<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <title>Sales Information</title>

<style>
   input[type=text], select, input[type=date] {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   
   input[type=submit] {
     width: 50%;
     background-color: #000000;
     color: white;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     border-radius: 4px;
     cursor: pointer;
    
   }
   
   input[type=submit]:hover {
     background-color: #45a049;
   }
   
  
   </style>
   </head>

<body>
<?php require_once 'salesprocess.php'; ?>

<?php
$mysqli = new mysqli ('localhost', 'root', '', 'loginsystem',) or die (mysqli_error($mysqli));
$result = $mysqli->query ("SELECT * FROM  products") or die ($mysqli->error);
$results = $mysqli->query ("SELECT * FROM  registration") or die ($mysqli->error);
$resultss = $mysqli->query ("SELECT * FROM  products") or die ($mysqli->error);
$res = $mysqli->query ("SELECT * FROM  products") or die ($mysqli->error);
$sale = $mysqli->query ("SELECT * FROM  sales") or die ($mysqli->error);
?> 
   <div class="wrapper">
      <div class="left">
         <div id="sidebar" class="active">
            <div class="toggle-btn">
               <span></span>
               <span></span>
               <span></span>
            </div>
         
            <h1 id="logo">Lifted Store</h1>
            <ul>
             
            <li><i class="fas fa-tachometer-alt"></i> <a href="index.php"> Dashboard </a></li>
             
                  <li><i class="fas fa-user-alt"></i> 
               <a href="attendants.php">attendants    </a></li>
            
                  <li><i class="fas fa-people-carry"></i>
               <a href="product_list.php"> products   </a></li>
             
               
              
                  <li><i class="fas fa-dollar-sign"></i> <a class="arrow-container"> sales</a></li>
            
              
                  <li><i class="fas fa-sign-out-alt"></i> <a href="sales.php?logout=true"> logout   </a></li>
            
                  </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right" style="padding-right: 70px;padding-left: 20px;">
         <h2 class="container-title"> Record sales</h2>
         <div class="up-info-container">
            <div>
               <form  action="salesprocess.php" method="POST" >
               <input type="hidden" name= "sales_id"  id="sales_id" value="<?php echo $sales_id ?>">
               
                  <label >Attendant *</label>
                 <select  name="staff_name" value="<?php echo $staff_name ?>">
                 <?php
                 while ($rows =$results-> fetch_assoc()){
                    $staff_name =$rows["staff_name"];
                    echo "<option value='$staff_name'> $staff_name</option>";

                 }
                 ?>
                 </select> 
                 <label >Product Name *</label>
                 <select   name="product_name" value="<?php echo $product_name ?>" >
                 <?php
                 while ($rows =$result-> fetch_assoc()){
                    $product_name =$rows["product_name"];
                    echo "<option value='$product_name'> $product_name</option>";

                 }
                 ?>
                 </select>
                 
             
                <label>Category *</label>
                <select name="category"  value="<?php echo $category ?>">
                 <?php
                 while ($rows =$resultss-> fetch_assoc()){
                    $category =$rows["category"];
                    echo "<option value='$category'> $category</option>";

                 }
                 ?>
                 </select>
                <label>Quantity Sold *</label>
                <input type="text" name="quantity"  value="<?php echo $quantity ?>"  placeholder="Enter quantity sold.." required="required">

                
                 
                <label >Price *</label>
                <select  name="price"  value="<?php echo $price ?>"  >
                 <?php
                 while ($rows =$res-> fetch_assoc()){
                    $price =$rows["price"];
                  //   echo "<option value> please select</option>"
                  echo "<option value='$price'> $price</option>";

                 }
                 ?>
                 </select>
                 <label >Record Date *</label>
                 <input type="date"  name="date" value="<?php echo $date ?>"  required="required" >
               

                 <label >Total Cost *</label>
                 <input type="text" name="total" value="<?php echo $total ?>"  placeholder="Total cost.." required="required">
                
               
                 <div>
               <?php
               if ($update == true):
                  ?>
                   <input type="submit" name="update" value="Update">
                   <?php else: ?>

                 <input type="submit" name="save" value="Submit">
                 <?php endif; ?>
                   </div>
               </form>
             </div>
         
         </div>
        

         <h2 class="container-title">sales info</h2>
         <input type="text" id="myInput" placeholder='Search by attendant name..'>
         <div class="down-info-container">
            <table class="table3 searchTable">
               <thead>
                  <tr>
                     <th>ATTENDANT NAME</th>
                     <th>PRODUCT NAME</th>
                     <th>CATEGORY</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <th>Date Added</th>
                     <th>Total</th>

                     <th>OPERATION</th>
                  </tr>
               </thead>
               <?php
               while ($row= $sale-> fetch_assoc()):?>
               <tbody>
                  <tr>
                     <td><?php echo $row ["staff_name"];?></td>
                     <td><?php echo $row ["product_name"];?></td>
                     <td><?php echo $row ["category"];?></td>
                     <td><?php echo $row ["quantity"];?></td>
                     <td><?php echo $row ["price"];?></td>
                     <td><?php echo $row ["date"];?></td>
                     <td><?php echo $row ["total"];?></td>
                     <td>
                      <a href="sales.php?edit=<?php echo $row['sales_id'];?>" class="edit">Edit</a>
                      <a href="salesprocess.php?delete=<?php echo $row['sales_id'];?>" class="delete">Delete</a>
                      </td>
                  </tr>
                  <?php endwhile;?>
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
      </div>
  


   <script src="/js/main.js"></script>
   <script> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>