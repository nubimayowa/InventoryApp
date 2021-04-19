<?php
   include('sidebar.php')
?>
<h2 class="container-title"> Add products</h2>
<div class="up-info-container">
   <div>
      <form class="product">
         <label >Product Name *</label>
         <input type="text" name="product_name" required="required" value="" placeholder="Product name..">
         <label>Quantity *</label>
         <input type="text" name="quantity" required="required" value="" placeholder="How many are you adding..">    
         <label >Category *</label>
         <input type="text" name="category" required="required" value="" placeholder="Enter the category...">
         <label >Price *</label>
         <input type="text" name="price" required="required"  value="" placeholder="Enter the price">
         <label >Purchase Date *</label>
         <input type="date"  name="date" required="required" value="">

         <input type="submit" value="Submit">
         <?php 
         if(isset($_GET['edit'])) {
            echo "<a class='cancel' href='attendants.php'> Cancel</a>";
         }
         ?>
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
      <tbody id="productTbody"></tbody>
   </table>
</div>
<script src="./js/functions.js"></script>
<script src="./js/product.js"></script>
<?php
include('footer.php')
?>