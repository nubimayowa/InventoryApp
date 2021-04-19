<?php

require_once("config.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS"); 
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
try{
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $data->product_name;
    $category = $data->category;
    $quantity = $data->quantity;
    $price = $data->price;
    $date=  $data->date;
    if($product_name !=="" && $category !== "" && $quantity !== "" && $price  !== "" && $date !== "") {
      $stmtselect = $db->prepare("INSERT INTO products (product_name, category, quantity, price, date) VALUES (?, ?, ?, ?, ?)");
      $result = $stmtselect-> execute([$product_name, $category, $quantity, $price, $date]);
      $id = $db->lastInsertId();
      $stmtselect1 = $db->prepare("SELECT * FROM products WHERE id=?");
      $stmtselect1-> execute([$id]);
      $product =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
      if($product) {
        header('HTTP/1.1 201 Created');
        echo json_encode($product);
      } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "Error in saving"));
      }
    } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "Error in saving"));
    }
  } 
  elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['product_id'])) { 
      if( $_GET['product_id'] !="") {
        $stmtselect = $db->prepare("SELECT product_name, category, quantity, price, date FROM products where product_id=?");
            $stmtselect-> execute([$_GET['product_id']]);
            $product =  $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($product){
            header('HTTP/1.1 200 Success');
            echo json_encode($product);
        } else {
            header('HTTP/1.1 404 Error');
            echo json_encode(array("msg" => "Product does not exist"));
        }
      } else {
          header('HTTP/1.1 400 Error');
          echo json_encode(array("msg" => "Error in fetching product"));
      }
    }
    else {
      $stmtselect = $db->prepare("SELECT product_name, category, quantity, price, date FROM products");
          $stmtselect-> execute();
          $products =  $stmtselect->fetchAll(PDO::FETCH_ASSOC);
      if($products){
          header('HTTP/1.1 200 Success');
          echo json_encode($products);
      } else {
          $result = array("msg" => "Error in fetching products");
          header('HTTP/1.1 400 Error');
          echo json_encode($result);
      }
    }
  } elseif($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if(isset($_GET['product_id'])) {
      if($_GET['product_id'] !== "") {
        $product_name = $data->product_name;
        $category = $data->category;
        $quantity = $data->quantity;
        $price = $data->price;
        $date=  $data->date;
        $stmtselect = $db->prepare("UPDATE  products SET product_name=?, category =?, quantity=?, price=?,date=? WHERE product_id=?");
        $result = $stmtselect-> execute([$product_name, $category, $quantity, $price, $date, $_GET['product_id']]);
        $stmtselect1 = $db->prepare("SELECT product_name, category, quantity, price, date FROM products where product_id=?");
        $stmtselect1-> execute([$_GET['product_id']]);
        $product =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
        header('HTTP/1.1 201 Update');
        echo json_encode($product);
       }
    }
  } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if($data->product_id !== "") {
      // print_r($data);
      $stmtselect = $db->prepare("delete FROM products where product_id=?");
      $result = $stmtselect-> execute([$data->product_id]);
      if($result) {
        header('HTTP/1.1 201 Success');
        echo json_encode(array("msg" => "Deleted successfully"));
      } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "Error in deleting product"));
      }
    } else {
      header('HTTP/1.1 400 Error');
      echo json_encode(array("msg" => "No product sent"));
    }
  }
// $db_user = 'root';//or localhost
// $db_pass = ''; // your db_name
// $db_name = 'loginsystem'; // root by default for localhost 
//  // by defualt empty for localhost

// $db = new PDO("mysql:host=localhost; dbname=" . $db_name . ";charset=utf8", $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );



/*// <tr>
// <td><?php echo $row ["product_name"];?></td>
// <td><?php echo $row ["category"];?></td>
// <td><?php echo $row ["quantity"];?></td>
// <td><?php echo $row ["price"];?></td>
// <td><?php echo $row ["date"];?></td>
// <!-- <td>
//  <a href="product_list.php?edit=<?php echo $row['product_id'];?>" class="edit">Edit</a>
//  <a href="productprocess.php?delete=<?php echo $row['product_id'];?>"class="delete">Delete</a>
//  </td> -->
// </tr> */
}
catch(Exception $ex){
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>





