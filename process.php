<?php
include('config.php');
if(isset($_POST['save'])){
   
      $msg=insert_data($connection);
      
}
// insert query
function insert_data($connection){
   
      $product_name= legal_input($_POST['product_name']);
      $quantity legal_input($_POST['quantity']);
      $category = legal_input($_POST['category']);
      $price = legal_input($_POST['price']);
      $date = legal_input($_POST['date']);
      $query="INSERT INTO addproduct (product_name,quantity,category,price, date) VALUES ('$product_name','$quantity','$category','$price', '$date')";
      $exec= mysqli_query($connection,$query);
      if($exec){
        $msg="Data was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      }
}
// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>