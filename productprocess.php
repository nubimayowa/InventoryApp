
<?php
// $db_user = 'root';//or localhost
// $db_pass = ''; // your db_name
// $db_name = 'loginsystem'; // root by default for localhost 
//  // by defualt empty for localhost

// $db = new PDO("mysql:host=localhost; dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );



$mysqli = new mysqli ('localhost', 'root', '', 'loginsystem',) or die (mysqli_error($mysqli));
$product_id =0;
$product_name ="";
$quantity ="";
$category = "";
$price ="";
$date ="";
$update = false;


 
if (isset($_POST['save'])){





  
    $product_name =$_POST['product_name'];
    $category =$_POST['category'];
    $quantity= $_POST['quantity'];
    $price= $_POST['price'];
    $date= $_POST['date'];


  
  
  $mysqli ->query ("INSERT INTO products (product_name, category, quantity, price, date) VALUES ('$product_name', '$category', 
  '$quantity', '$price', '$date')")  
  
  or 
  die($mysqli->error);
 
  
  header("location: product_list.php");
  //final code will execute here.
}

   




if (isset($_GET['delete']))
{
  $product_id = $_GET["delete"];
$mysqli ->query("DELETE FROM products WHERE product_id=$product_id") or  die($mysqli->error());


header("location: product_list.php");

}

if (isset($_GET["edit"])){
  $product_id = $_GET["edit"];
  $update = true;
  $result = $mysqli-> query("SELECT * FROM  products WHERE product_id=$product_id")  or  die($mysqli->error());

  if (($result)==1){

    $row = $result->fetch_array();
    $product_name = $row["product_name"];
    $category = $row["category"];
    $quantity = $row["quantity"];
    $price = $row["price"];
    $date = $row["date"];

   
  } 
}

if (isset($_POST['update'])){
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $category = $_POST['category'];
  $quantity= $_POST['quantity'];
  $price= $_POST['price'];
  $date= $_POST['date'];


 $mysqli ->query ("UPDATE  products SET product_name='$product_name', category ='$category', quantity = '$quantity', price= '$price',date= '$date' WHERE product_id=$product_id")
  or  die($mysqli->error);


  header("location: product_list.php");
 }

?>




