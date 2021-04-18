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
<html  lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<title>Product Listing</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="ajax.js"></script>
   <script src="/js/main.js"></script>
   <script>

</script>


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
           
            <h1 id="logo">Lifted Store</h1>
            <ul>
             
                  <li><i class="fas fa-tachometer-alt"></i>   <a href="index.php"> Dashboard  </a></li>
              
           
                  <li><i class="fas fa-user-alt"></i>     <a href="attendants.php"> attendants  </a></li>
    
                  <li><i class="fas fa-people-carry"></i>   <a class="arrow-container" > products   </a></li>

             
                  <li><i class="fas fa-dollar-sign"></i>   <a href="sales.php"> sales   </a></li>
         
                  <li><i class="fas fa-sign-out-alt"></i> <a href="product_list.php?logout=true"> logout </a></li>
              

            </ul>
         </div>
       
      </div>
      <!-- End of left side -->
      <div class="right" style="padding-right: 70px;padding-left: 20px;">
         <h2 class="container-title"> Add products</h2>
         <div class="up-info-container">

            <div>
          
            
            <form name="RegForm" action="productprocess.php" method="POST">
           
              
               <input type="hidden" name= "product_id"  id="product_id" value="<?php echo $product_id ?>">
         
               
                 <label >Product Name *</label>
                 <input type="text" name="product_name" required="required" value="<?php echo $product_name; ?>"
                  placeholder="Product name..">

                  <label>Quantity *</label>
                 <input type="text" name="quantity" required="required" value="<?php echo $quantity;?>"
                   placeholder="How many are you adding..">
                 
                

                   <label >Category *</label>
                 <input type="text" name="category" required="required" value="<?php echo $category;?>"
                   placeholder="Enter the category...">

                 
             
                

                 <label >Price *</label>
                 <input type="text" name="price" required="required"  value="<?php echo $price;?>"
                  placeholder="Enter the price">
                  <label >Purchase Date *</label>
                 <input type="date"  name="date" required="required" value="<?php echo $date;?>">
               
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
        

         <h2 class="container-title">products info</h2>
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
                     <th>OPERATION</th>
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
                     <td>
                      <a href="product_list.php?edit=<?php echo $row['product_id'];?>" class="edit">Edit</a>
                      <a href="productprocess.php?delete=<?php echo $row['product_id'];?>" class="delete">Delete</a>
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
  

   <script > (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>


</body>

</html>









