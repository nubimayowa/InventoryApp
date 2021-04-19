<?php
   include('sidebar.php')
?>
         <h2 class="container-title"> Create attendants</h2>
         <div class="up-info-container">
            <div>
               <form class="attendant">
                
               <label>Employment Id *</label>
                 <input type="text" name="empid"  placeholder="Enter Employment Id.." required="required">

                 <label >Staff Name *</label>
                 <input type="text" name="staff_name" placeholder="Enter Staff Name.." required="required">
               
                
                 <label >Mobile Number *</label>
                 <input type="tel" name="mob"   placeholder="Enter Mobile Number.." required="required">

                 <label >Password <?php
                 
                 if(isset($_GET['edit'])) {
                  echo "";
                 }
                  else {
                     echo "*";
                  }
                 ?></label>
                 <input type="password" name="pass"  placeholder="Enter Password.." 
                 <?php
                 if(isset($_GET['edit'])) {
                  echo "";
                 }
                  else {
                     echo 'required="required"';
                  }
                 ?>
                 >

                 <label>Email Address *</label>
                 <input type="email" name="email" placeholder="Enter Email Address.." required="required">
                
                <!-- employmemt date -->
                 <label>Employment Date *</label>
                 <input type="date"  name="doe" required="required">

                 <input type="submit" value="Submit">
                 <?php 
                  if(isset($_GET['edit'])) {
                     echo "<a class='cancel' href='attendants.php'> Cancel</a>";
                  }
                 ?>
               </form>
             </div>
             </div>
 
           

         <h2 class="container-title">attendants info</h2>
         <input type="text" id="myInput" placeholder='Search for staff by Employment Id..'>
         <div clatss="down-info-container">
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
               <tbody id="attendantTbody">
                  <tr>
                  <td colspan="6">No data</td>
                  </tr>
  
               </tbody>
            </table>
         </div>
   <script src="./js/functions.js"></script>
   <script  src="./js/attendant.js"></script>
   <?php
   include('footer.php');
   ?>
   
   