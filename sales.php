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
   <title>Sales Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" media="screen" href="./styles/main.css" />
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

<body>
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
               <a href="index.php">
                  <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
               </a>
               <a href="attendants.php">
                  <li><i class="fas fa-user-alt"></i> attendants</li>
               </a>
               <a href="product_list.php">
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
               
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="sales.php?logout=true">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">
         <h2 class="container-title"> Record sales</h2>
         <div class="up-info-container">
            <div>
               <form >
                
               
                 <label for="country">Attendant</label>
                 <select id="country" name="country">
                   <option value="australia">Nubi Mayowa</option>
                   <option value="canada">Tamara Thompson</option>
                 </select>
                 <label for="country">Product Name</label>
                 <select id="country" name="country">
                  <option value="australia">Nike Yeezy</option>
                  <option value="canada">Nike Airforce</option>
                </select>
                <label for="country">Category</label>
                 <select id="country" name="country">
                  <option value="australia">Nike Yeezy</option>
                  <option value="canada">Nike Airforce</option>
                </select>
                <label for="country">Quantity Sold</label>
                <input type="text"  placeholder="Enter quantity sold..">

                <label for="country">Price</label>
                <input type="text" placeholder="Enter price..">

                 <label for="lname">Total Cost</label>
                 <input type="text" placeholder="Total cost..">
                
               
                 <input type="submit" value="Submit">
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
                     <th>PURCHASE DATE</th>

                     <th>OPERATION</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Segun Arinze</td>
                     <td>SHOE</td>
                     <td>Wears</td>
                     <td>9</td>
                     <td>120</td>
                     <td>12/09/2018</td>

                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
                  <tr>
                     <td>Peter Obi</td>
                     <td>SHIRT</td>
                     <td>Wears</td>
                     <td>4</td>
                     <td>80</td>
                     <td>20/02/2018</td>

                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
                  <tr>
                     <td>Buhari Muhammad</td>
                     <td>TIE</td>
                     <td>Wears</td>
                     <td>2</td>
                     <td>55</td>
                     <td>12/01/2018</td>

                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
                  <tr>
                     <td>Olusegun Obasanjo</td>
                     <td>SOCKS</td>
                     <td>Wears</td>
                     <td>7</td>
                     <td>40</td>
                     <td>02/12/2018</td>

                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
  
   </div>
  


   <script src="/js/main.js"></script>
   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>