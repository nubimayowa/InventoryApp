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
   <title>Product Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="ajax.js"></script>
   <script src="/js/main.js"></script>
   <script>

function ValidationForm() {
  let product_name = document.forms["RegForm"]["product_name"];
  let quantity = document.forms["RegForm"]["quantity"];
  let category = document.forms["RegForm"]["category"];
  let price = document.forms["RegForm"]["price"];
  let date = document.forms["RegForm"]["date"];

  if (product_name.value == "") {
    alert("Please enter a product name.");
    product_name.focus();
    return false;
  }
  
  if (quantity.value == "") {
    alert("Please enter quantity.");
    quantity.focus();
    return false;
  }
  if (category.value == "") {
    alert("Please enter a category type");
    category.focus();
    return false;
  }
  if (price.value == "") {
    alert("Please enter the price");
    price.focus();
    return false;
  }
  if (date.value == "") {
    alert("Please select the date");
    date.focus();
    return false;
  }
  alert("Product successfully created!");
  return true;
 
}

</script>
</head>

<style>

   input[type=text], select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   input[type=date], select {
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

   .col-50 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
  
   </style>

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
           
            <h1 id="logo">shoppy</h1>
            <ul>
               <a href="index.php">
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
               </a>
               <a href="attendants.php">
                  <li><i class="fas fa-user-alt"></i> attendants</li>
               </a>
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
             
               <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="product_list.php?logout=true">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
       
      </div>
      <!-- End of left side -->
      <div class="right" style="padding-right: 70px;padding-left: 20px;">
         <h2 class="container-title"> Add products</h2>
         <div class="up-info-container">

            <div>
          
            
            <form name="RegForm" action="productprocess.php" method="POST" onsubmit="return ValidationForm()" >
           
              
               <input type="hidden" name= "product_id" required id="product_id" value="<?php echo $product_id ?>">
         
               
                 <label >Product Name *</label>
                 <input type="text" name="product_name" id="product_name"  value="<?php echo $product_name; ?>"
                  placeholder="Product name..">

                  <label for="quantity">Quantity *</label>
                 <input type="text" name="quantity" value="<?php echo $quantity;?>"
                   placeholder="How many are you adding..">
                 
                

                   <label for="category">Category *</label>
                 <input type="text" name="category" value="<?php echo $category;?>"
                   placeholder="Enter the category...">

                 
             
                

                 <label for="price">Price *</label>
                 <input type="text" name="price"  value="<?php echo $price;?>"
                  placeholder="Enter the price">
                  <label for="date">Purchase Date *</label>
                 <input type="date"  name="date" id="date" value="<?php echo $date;?>">
               
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
                      <a href="productprocess.php?delete=<?php echo $row['product_id'];?>"class="delete">Delete</a>
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
      <!-- End of right side -->
   </div>
   <!-- End of wrapper -->


   <script src="/js/main.js"></script>
  
</script>


   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>


</body>

</html>









