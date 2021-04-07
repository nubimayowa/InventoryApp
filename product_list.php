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
     width: 100%;
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
               <a class="arrow-container" href="#">
                  <div class="arrow-left"></div>
                  <li><i class="fas fa-people-carry"></i> products</li>
               </a>
               <a href="attendants.php">
                  <li><i class="fas fa-user-alt"></i> attendants</li>
               </a>
               <a href="sales.php">
                  <li><i class="fas fa-dollar-sign"></i> sales</li>
               </a>
               <a href="index.php?logout=true">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">
         <h2 class="container-title"> Add products</h2>
         <div class="up-info-container">

            <div>
            <form action="productprocess.php" method="POST">
          
            
                
                 <label for="tproduct">Product Name</label>
                 <input type="text" name="product_name"  placeholder="Product name..">
                
                 <label for="category">Category</label>
                 <select id="category" name="category">
                   <option value="australia">Shoe</option>
                   <option value="canada">Socks</option>
                   <option value="usa">Top</option>
                 </select>
             
                 <label for="quantity">Quantity</label>
                 <input type="text" name="quantity"  placeholder="How many are you adding..">

                 <label for="price">Price</label>
                 <input type="text" name="price"  placeholder="Enter the price">
               
                 <input type="submit" name="save" value="Submit">
               </form>
             </div>
            <!-- <a href="#">
               <h2 class="view-all add-product"><i class="fas fa-plus"></i> add product</h2>
            </a> -->
            <!-- <div class="info-block">
               <div class="info-block-header info-block-header1">
                  <h2><i class="fas fa-shopping-bag"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>product types</h3>
                  <p>12</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div> -->
            <!-- info-block -->
            <!-- <div class="info-block ">
               <div class="info-block-header info-block-header2">
                  <h2><i class="fas fa-signal"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>total quantity</h3>
                  <p>20</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div> -->
            <!-- info-block -->
            <!-- <div class="info-block ">
               <div class="info-block-header info-block-header3">
                  <h2><i class="fas fa-money-check-alt"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>total price</h3>
                  <p><i class="fas fa-dollar-sign"></i> 9000</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last purchase date <span class="date">20/12/2018</span></p>
               </div>
            </div> -->
            <!-- info-block -->
         </div>
         <!-- up-info-container -->

         <h2 class="container-title">products info</h2>
         <input type="text" id="myInput" placeholder='Search for product by name..'>
         <div class="down-info-container">
            <table class="table3 searchTable">
               <thead>
                  <tr>
                     <th>PRODUCT CATEGORY</th>
                     <th>PRODUCT NAME</th>
                     <th>QUANTITY</th>
                     <th>PRICE</th>
                     <!-- <th>LAST PURCHASE DATE</th> -->
                     <th>OPERATION</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>SHOE</td>
                     <td>Wears</td>
                     <td>9</td>
                     <td>120</td>
                     <!-- <td>12/09/2018</td> -->
                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr>
                  
               

               </tbody>
            </table>
         </div>
      </div>
      <!-- End of right side -->
   </div>
   <!-- End of wrapper -->


   <script src="/js/main.js"></script>
   
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCmPdzS8TAP6a00SD-3xYTXKkWsUe1Qle8",
    authDomain: "myportal-2f0f0.firebaseapp.com",
    projectId: "myportal-2f0f0",
    storageBucket: "myportal-2f0f0.appspot.com",
    messagingSenderId: "912943328976",
    appId: "1:912943328976:web:c1cb16459f056ae9d278d5",
    measurementId: "G-523F04JKEN"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  var messagesRef = firebase.database() 
            .ref('Collected Data'); 
          
        document.getElementById('product-form') 
            .addEventListener('submit', submitForm); 
  
        function submitForm(e) { 
            e.preventDefault(); 
  
            // Get values 
            var name = getInputVal('tproduct'); 
            var email = getInputVal('stock'); 
  
            saveMessage(name, email); 
            document.getElementById('contactForm').reset(); 
        } 
        function getInputVal(id) { 
            return document.getElementById(id).value; 
        } 
  
        // Save message to firebase 
        function saveMessage(name, email) { 
            var newMessageRef = messagesRef.push(); 
            newMessageRef.set({ 
                name: name, 
                email: email, 
            }); 
        } 
</script>

   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>