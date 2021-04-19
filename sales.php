<?php
   include('sidebar.php')
?>
<h2 class="container-title"> Record sales</h2>
<div class="up-info-container">
   <div>
      <form class="sale">
         <label >Attendant *</label>
         <select  name="staff_name"></select> 
         <label >Product Name *</label>
         <select   name="product_name"> </select>
         <label>Category *</label>
         <input name="category"  type="text" value="" readonly="readonly" />
         <label>Quantity Sold *</label>
         <input type="number" name="quantity"  value=""  placeholder="Enter quantity sold.." required="required">
         <label >Price *</label>
         <input name="price"  value="" type="number" readonly ="readonly">
         <label >Record Date *</label>
         <input type="date"  name="date" value=""  required="required" >
         <label >Total Cost *</label>
         <input type="text" name="total" value=""  placeholder="Total cost.." required="required"><input type="submit" value="Submit">
            <?php 
               if(isset($_GET['edit'])) {
                  echo "<a class='cancel' href='attendants.php'> Cancel</a>";
               } 
            ?>
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
               <tbody id="saleTbody" >
               </tbody>
            </table>
         </div>

         <script src="./js/functions.js"></script>
   <script  src="./js/sales.js"></script>
   <?php
   include('footer.php');
   ?>