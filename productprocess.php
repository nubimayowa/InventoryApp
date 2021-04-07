<?php
// $db_user = 'root';//or localhost
// $db_pass = ''; // your db_name
// $db_name = 'loginsystem'; // root by default for localhost 
//  // by defualt empty for localhost

// $db = new PDO("mysql:host=localhost; dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$mysqli = new mysqli ('localhost', 'root', '', 'loginsystem',) or die (mysqli_error($mysqli));


if (isset($_POST['save'])){
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity= $_POST['quantity'];
    $price= $_POST['price'];

    $mysqli ->query ("INSERT INTO products (product_name, category, quantity, price) VALUES ('$product_name', '$category', 
  '$quantity', '$price')") 
   
  or 
  die($mysqli->error);
}

?>