<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$product_id = $_POST['product_id'];

	$product_name=$_POST['product_name'];
	$category=$_POST['category'];
	$quantity=$_POST['quantity'];
    $price=$_POST['price'];

	// update user data
	$result = mysqli_query($mysqli, "UPDATE products SET product_name='$product_name',category='$category',quantity='$quantity' ,price='$price' WHERE product_id=$product_id");

	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$product_id = $_GET['product_id'];
$result = mysqli_query("SELECT * FROM  products WHERE product_id=$product_id")  or  die($mysqli->error());
// Fetech user data based on id
// $result = mysqli_query($mysqli, "SELECT * FROM products WHERE product_id=$product_id");

while($user_data = mysqli_fetch_array($result))
{
	$product_name = $user_data['product_name'];
	$category = $user_data['category'];
	$quantity = $user_data['quantity'];
    $price = $user_data['price'];
}

?>
<html>
<head>
	<title>Edit User Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_user" method="post" action="editproduct.php">
		<table border="0">
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="product_name" value=<?php echo $product_name;?>></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><input type="text" name="category" value=<?php echo $category;?>></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="quantity" value=<?php echo $quantity;?>></td>
			</tr>
            <tr>
				<td>Price</td>
				<td><input type="text" name="price" value=<?php echo $price;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="product_id" value=<?php echo $_GET['product_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>