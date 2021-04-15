
<?php


$mysqli = new mysqli ('localhost', 'root', '', 'loginsystem',) or die (mysqli_error($mysqli));

$data = json_decode(file_get_contents("php://input"));
$sales_id =0;
$staff_name ="";
$product_name ="";
$category = "";
$quantity = "";
$price ="";
$total ="";
 $update = false;


 
if (isset($_POST['save'])){

    $staff_name =$_POST['staff_name'];
    $product_name =$_POST['product_name'];
    $category =$_POST['category'];
    $quantity= $_POST['quantity'];
    $price= $_POST['price'];
    $total= $_POST['total'];
    $date= $_POST['date'];


  
  
  $mysqli ->query ("INSERT INTO sales (staff_name, product_name, category, quantity, price,total, date) VALUES ('$staff_name', '$product_name', 
  '$category', '$quantity', '$price','$total', '$date')")  
  
  or 
  die($mysqli->error);
 
  
  header("location: sales.php");
  //final code will execute here.
}

   




if (isset($_GET['delete']))
{
  $sales_id = $_GET["delete"];
$mysqli ->query("DELETE FROM sales WHERE sales_id=$sales_id") or  die($mysqli->error());


header("location: sales.php");

}

if (isset($_GET["edit"])){
  $sales_id = $_GET["edit"];
  $update = true;
  $result = $mysqli-> query("SELECT * FROM  sales WHERE sales_id=$sales_id")  or  die($mysqli->error());

  if (($result)==1){

    $row = $result->fetch_array();
    $staff_name = $row["staff_name"];
    $product_name = $row["product_name"];
    $category = $row["category"];
    $quantity = $row["quantity"];
    $price = $row["price"];
    $total = $row["total"];
    $date = $row["date"];

   
  } 
}

if (isset($_POST['update'])){
  $sales_id = $_POST['sales_id'];
  $staff_name = $_POST['staff_name'];
  $product_name = $_POST['product_name'];
  $category= $_POST['category'];
  $quantity= $_POST['quantity'];
  $price= $_POST['price'];
  $total= $_POST['total'];
  $date= $_POST['date'];


 $mysqli ->query ("UPDATE  sales SET staff_name='$staff_name', product_name='$product_name', category ='$category', quantity = '$quantity',price= '$price', total= '$total',date= '$date' WHERE sales_id=$sales_id")
  or  die($mysqli->error);
 


  header("location: sales.php");
 
 }

?>




