<?php

session_start();
require_once("config.php");

//echo  "Hello from jslogin.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS"); 
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
try {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $data->password;
        $empid = $data->empId;
        if($password !== "" && $empid  !== "") {
            $stmtselect = $db->prepare("SELECT * FROM registration WHERE empid = ? LIMIT 1");
            // echo hash('SHA256', $password);
            $result = $stmtselect-> execute([$empid]);

            if($result){
                $user =  $stmtselect->fetch(PDO::FETCH_ASSOC);
                // var_dump($user);
                // print_r($user);

                if ($user) {
                    if (password_verify($password, $user['pass'])){
                        $_SESSION["userlogin"] = $user;
                        $user['msg'] = 'Login successful, Redirecting...';
                        header('HTTP/1.1 200 Successful');
                        echo json_encode($user);
                    }
                    else {
                        header('HTTP/1.1 400 Error!');
                        echo json_encode(array('msg' => 'Please check your credentials properly'));
                    }
                }
                else {
                    header('HTTP/1.1 400 Error!');
                    echo json_encode(array('msg' => 'Please check your credentials properly'));
                }

            }else{
                header('HTTP/1.1 400 Error!');
                echo json_encode(array('msg' => 'There were errors connecting to the database.'));
            }
        } else {
            header('HTTP/1.1 400 Error!');
            echo json_encode(array('msg' => 'Either Employee Id or Password is empty!'));
        }
    }
}
catch(Exception $ex){
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}