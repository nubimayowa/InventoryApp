<?php
   include('sidebar.php')
?>
<h2 class="container-title">Dashboard</h2>
   <a href="product_list.php" class="container-header"> Create and manage Products. Click Here..</a>
     <input type="text" id="myInputs" placeholder='Search for product by name..'>
         <div class="row down-info-container">
            <table class="table3 searchTable product-table">
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
               <tbody  id="productTbody">
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
                     <th>EMPLOYMEE ID</th>
                     <th>STAFF NAME</th>
                     <th>MOBILE NUMBER</th>
                     <th>EMAIL ADRESS</th>
                     <th>EMPLOYMENT DATE</th>
                  </tr>
               </thead>
               <tbody id="attendantTbody">
                  <tr>
                  <td colspan="5">No data</td>
                  </tr>
               </tbody>
            </table>
         </div>
   <script>

   </script>
   <script src="./js/functions.js"></script>
   <script src="./js/dashboard.js"></script>
         <?php
   include('footer.php');
   ?>