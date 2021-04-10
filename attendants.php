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
                 <input type="text"   placeholder="Enter Employment Id..">

                 <label for="lname">Staff Name</label>
                 <input type="text"   placeholder="Enter Staff Name..">
               
                
                 <label for="mon">Mobile Number</label>
                 <input type="tel"   placeholder="Enter Mobile Number..">

                 <label for="lname">Password</label>
                 <input type="text"  placeholder="Enter Password..">

                 <label for="email">Email Address</label>
                 <input type="email" placeholder="Enter Email Address..">
                
                <!-- employmemt date -->
                 <label for="Doe">Employment Date</label>
                 <input type="date"  id="doe">

                 <input type="submit" value="Submit">
               </form>
             </div>
 
            <!-- <a href="#">
               <h2 class="view-all add-product"><i class="fas fa-plus"></i> add attendant</h2>
            </a> -->
            <!-- <div class="info-block">
               <div class="info-block-header info-block-header4">
                  <h2><i class="fas fa-people-carry"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>number of staffs</h3>
                  <p>12</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="fas fa-calendar-alt"></i> last employment date <span class="date">20/12/2018</span></p>
               </div>
            </div> -->
            <!-- info-block -->
            <!-- <div class="info-block ">
               <div class="info-block-header info-block-header5">
                  <h2><i class="fas fa-user-alt"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>staffs on duty</h3>
                  <p>8</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 24 hours</p>
               </div>
            </div> -->
            <!-- info-block -->
            <!-- <div class="info-block ">
               <div class="info-block-header info-block-header6">
                  <h2><i class="fas fa-user-alt"></i></h2>
               </div>
               <div class="info-block-content">
                  <h3>staffs off duty</h3>
                  <p>4</p>
               </div>
               <div class="info-block-footer">
                  <p><i class="far fa-clock"></i> last 24 hours</p>
               </div>
            </div> -->
            <!-- info-block -->
         </div>
         <!-- up-info-container -->

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
                  <!-- <tr>
                     <td>Atiku Alao</td>
                     <td>07034546534</td>
                     <td>atikualao@gmail.com</td>
                     <td>12/09/2017</td>
                     <td> 13000</td>
                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr> -->
                  <!-- <tr>
                     <td>Samuel Johnson</td>
                     <td>07098231243</td>
                     <td>daniel@gmail.com</td>
                     <td>12/09/2018</td>
                     <td> 3000</td>
                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr> -->
                  <!-- <tr>
                     <td>Samson Goddy</td>
                     <td>09087654534</td>
                     <td>samsongoddy@gmail.com</td>
                     <td>12/09/2018</td>
                     <td> 5000</td>
                     <td><button class="delete">Delete</button><button class="edit">Edit</button></td>
                  </tr> -->
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