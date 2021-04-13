<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Product Info</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="/styles/main.css"  media="screen" rel="stylesheet" type="text/css" />
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
 
   input[type=tel]  , select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   input[type=date]  , select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   
   input[type=email], select {
     width: 100%;
     padding: 10px 50px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
   }
   input[type=email], select {
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
               <a href="/index.php">
                  <li><i class="fas fa-sign-out-alt"></i> logout</li>
               </a>

            </ul>
         </div>
         <!-- sidebar -->
      </div>
      <!-- End of left side -->
      <div class="right">
         <h2 class="container-title"> Create attendants</h2>
         <div class="up-info-container">
            <div>
               <form >
                
               <label for="Eid">Employment Id</label>
                 <input type="text" name="empid"  placeholder="Enter Employment Id..">

                 <label for="lname">Staff Name</label>
                 <input type="text" name="staff_name" placeholder="Enter Staff Name..">
               
                
                 <label for="mon">Mobile Number</label>
                 <input type="tel" name="mob"   placeholder="Enter Mobile Number..">

                 <label for="lname">Password</label>
                 <input type="text" name="pass"  placeholder="Enter Password..">

                 <label for="email">Email Address</label>
                 <input type="email" name="email" placeholder="Enter Email Address..">
                
                <!-- employmemt date -->
                 <label for="Doe">Employment Date</label>
                 <input type="date"  name="doe">

                 <input type="submit" value="Submit">
               </form>
             </div>
 
           

         <h2 class="container-title">attendants info</h2>
         <input type="text" id="myInput" placeholder='Search for staff by name..'>
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
               <tbody>
                  <tr>
                  <td>J88642</td>
                     <td>Mayowa</td>
                     <td>09087654534</td>
                  <td>sanusilamido56@gmail.com</td> 
                  <td>12/09/2017</td>
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
   <script type="text/javascript"> (function () { let css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
</body>

</html>