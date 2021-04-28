<?php

require_once("config.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS"); 
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
try{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
        $empid = $data->empid;
        $email = $data->email;
        $staff_name = $data->staff_name;
        $pass = $data->pass;
        $mob = $data->mob;
        $doe = $data->doe;
        if($empid !== "" && $email !== "" && $pass !== "" && $mob !== "" && $doe !== "" && $staff_name !== "") {
            $cost = 10;
            $password = password_hash($pass, PASSWORD_BCRYPT, ["cost" => $cost]);
            $stmtselect = $db->prepare("insert into registration(empid, email, staff_name, pass, mob, doe) value(?, ?, ?, ?, ?, ?)");
            $result = $stmtselect-> execute([$empid, $email, $staff_name, $password, $mob, $doe]);
            $id = $db->lastInsertId();
            $stmtselect1 = $db->prepare("SELECT * FROM registration WHERE id=?");
            $stmtselect1-> execute([$id]);
            $user =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
            header('HTTP/1.1 201 Created');
            echo json_encode($user);
        } else {
            $result = array("msg" => "Error in saving");
            header('HTTP/1.1 400 Error');
            echo json_encode($result);
        }
    } elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
   
        if(isset($_GET['empid'])){
           if( $_GET['empid'] !="") {
                $stmtselect = $db->prepare("SELECT empid, email, mob, doe, staff_name, id FROM registration where empid=?");
                    $stmtselect-> execute([$_GET['empid']]);
                    $user =  $stmtselect->fetch(PDO::FETCH_ASSOC);
                if($user){
                    header('HTTP/1.1 200 Success');
                    echo json_encode($user);
                } else {
                    header('HTTP/1.1 404 Error');
                    echo json_encode(array("msg" => "Attendant does not exist"));
                }
            } else {
                header('HTTP/1.1 400 Error');
                echo json_encode(array("msg" => "Error in fetching attendants"));
            }
        }
        else{
            $stmtselect = $db->prepare("SELECT empid, email, mob, doe, staff_name, id FROM registration");
                $stmtselect-> execute();
                $user =  $stmtselect->fetchAll(PDO::FETCH_ASSOC);
            if($user){
                header('HTTP/1.1 200 Success');
                echo json_encode($user);
            } else {
                $result = array("msg" => "Error in fetching attendants");
                header('HTTP/1.1 400 Error');
                echo json_encode($result);
            }
        }
    
    } elseif($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        if($data->empid !== "") {
            // print_r($data);
            $stmtselect = $db->prepare("delete FROM registration where empid=?");
               $result = $stmtselect-> execute([$data->empid]);
            if($result){
                header('HTTP/1.1 201 Success');
                echo json_encode(array("msg" => "Deleted successfully"));
            } else {
                header('HTTP/1.1 400 Error');
                echo json_encode(array("msg" => "Error in deleting attendants"));
            }
        } else {
            header('HTTP/1.1 400 Error');
            echo json_encode(array("msg" => "No employee id sent"));
        }
    } elseif($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if(isset($_GET['empid'])) {
            if($_GET['empid'] !== "") {
                $empid = $_GET['empid'];
                $email = $data->email;
                $staff_name = $data->staff_name;
                $pass = $data->pass;
                $mob = $data->mob;
                $doe = $data->doe;
                if($empid !== "" && $email !== "" && $mob !== "" && $doe !== "" && $staff_name !== "") {
                    $password = "";
                    if($pass !== "" ){
                        $cost = 10;
                        $password = password_hash($pass, PASSWORD_BCRYPT, ["cost" => $cost]);
                    }
                    // $password = password_hash("SHA256", $pass);
                    else {
                        $stmtselect2 = $db->prepare("select pass from registration where empid=?");
                        $stmtselect2->execute([$empid]);
                        $emp =  $stmtselect2->fetch(PDO::FETCH_ASSOC);
                        $password = $emp['pass'];
                    }
                    $stmtselect = $db->prepare("update registration set email =?, staff_name =?, pass =?, mob=?, doe=? where empid=?");
                    $result = $stmtselect-> execute([$email, $staff_name, $password, $mob, $doe, $empid]);
                    $stmtselect1 = $db->prepare("SELECT * FROM registration WHERE empid=?");
                    $stmtselect1-> execute([$empid]);
                    $user =  $stmtselect1->fetch(PDO::FETCH_ASSOC);
                    header('HTTP/1.1 201 Update');
                    echo json_encode($user);
                } else {
                    header('HTTP/1.1 400 Error');
                    echo json_encode(array("msg" => "Error in saving"));
                }
            } else {
                header('HTTP/1.1 400 Error');
                echo json_encode(array("msg" => "No attendant was selected"));
            }
        } else {
            header('HTTP/1.1 400 Error');
            echo json_encode(array("msg" => "No attendant was selected"));
        } 
    } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "Nothing was sent"));
    }
}
catch(Exception $ex){
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>