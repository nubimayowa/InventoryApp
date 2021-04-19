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
    $staff_name = $data->staff_name;
    $product_name = $data->product_name;
    $category = $data->category;
    $quantity = $data->quantity;
    $price = $data->price;
    $date = $data->date;
    $total=  $data->total;
    if($staff_name !=="" && $product_name !== "" && $category !== "" && $quantity !== "" && $price  !== "" && $date  !== "" &&  $total !== "") {
      $stmtselect = $db->prepare("INSERT INTO sales (empid, product_id, quantity, price, date, total) VALUES (?, ?, ?, ?, ?, ?)");
      $result = $stmtselect-> execute([$staff_name,$product_name, $quantity, $price, $date,$quantity * $price]);
      $id = $db->lastInsertId();
      $stmtselect1 = $db->prepare("SELECT * FROM sales WHERE sales_id=?");
      $stmtselect1-> execute([$id]);
      $sale =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
      if($sale) {
        header('HTTP/1.1 201 Created');
        echo json_encode($sale);
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
    if(isset($_GET['sales_id'])) { 
      if( $_GET['sales_id'] !="") {
        $stmtselect = $db->prepare("SELECT sales_id, rg.staff_name, rg.empid, pd.product_name, pd.category, sl.quantity, sl.price, sl.date, total, sl.product_id FROM sales sl inner join registration rg on sl.empid = rg.empid inner join products pd on sl.product_id = pd.product_id  where sales_id=?");
            $stmtselect-> execute([$_GET['sales_id']]);
            $sale =  $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($sale){
            header('HTTP/1.1 200 Success');
            echo json_encode($sale);
        } else {
            header('HTTP/1.1 404 Error');
            echo json_encode(array("msg" => "sales does not exist"));
        }
      } else {
          header('HTTP/1.1 400 Error');
          echo json_encode(array("msg" => "Error in fetching sales"));
      }
    }
    else {
      $stmtselect = $db->prepare("SELECT sales_id, rg.staff_name, rg.empid, pd.product_name, pd.category, sl.quantity, sl.price, sl.date, total, sl.product_id FROM sales sl inner join registration rg on sl.empid = rg.empid inner join products pd on sl.product_id = pd.product_id");
          $stmtselect-> execute();
          $sales =  $stmtselect->fetchAll(PDO::FETCH_ASSOC);
      if($sales){
          header('HTTP/1.1 200 Success');
          echo json_encode($sales);
      } else {
          $result = array("msg" => "Error in fetching sales");
          header('HTTP/1.1 400 Error');
          echo json_encode($result);
      }
    }
  } elseif($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if(isset($_GET['sales_id'])) {
      if($_GET['sales_id'] !== "") {
        $staff_name = $data->staff_name;
        $product_name = $data->product_name;
        $category = $data->category;
        $quantity = $data->quantity;
        $price = $data->price;
        $date=  $data->date;
        $total=  $data->total;
        $stmtselect = $db->prepare("UPDATE  sales SET empid=?,  product_id=?, quantity=?, price=?,date=?,total=?  WHERE sales_id=?");
        $result = $stmtselect-> execute([$staff_name,  $product_name, $quantity, $price, $date,$quantity * $price, $_GET['sales_id']]);
        $stmtselect1 = $db->prepare("SELECT sales_id, rg.staff_name, rg.empid, pd.product_name, pd.category, sl.quantity, sl.price, sl.date, total, sl.product_id FROM sales sl inner join registration rg on sl.empid = rg.empid inner join products pd on sl.product_id = pd.product_id  where sales_id= ?");
        $stmtselect1-> execute([  intVal($_GET['sales_id'])]);
        $sale =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
        header('HTTP/1.1 201 Update');
        echo json_encode($sale);
       }
    }
  } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if($data->sales_id !== "") {
      // print_r($data);
      $stmtselect = $db->prepare("delete FROM sales where sales_id=?");
      $result = $stmtselect-> execute([$data->sales_id]);
      if($result) {
        header('HTTP/1.1 201 Success');
        echo json_encode(array("msg" => "Deleted successfully"));
      } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "Error in deleting sale"));
      }
    } else {
      header('HTTP/1.1 400 Error');
      echo json_encode(array("msg" => "No sales sent"));
    }
  }
}
catch(Exception $ex){
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>