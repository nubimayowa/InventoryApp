
<?php

require_once("config.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data = json_decode(file_get_contents("php://input"));

try{
    if($data->empid !== "") {
        $stmtselect = $db->prepare("delete FROM registration where empid=?");
           $result = $stmtselect-> execute([$data->empid]);
        if($result){
            header('HTTP/1.1 201 Success');
            echo json_encode(array("msg" => "Delected successfully"));
        } else {
            header('HTTP/1.1 400 Error');
            echo json_encode(array("msg" => "Error in deleting attendants"));
        }
    } else {
        header('HTTP/1.1 400 Error');
        echo json_encode(array("msg" => "No employee id sent"));
    }

}
catch(Exception $ex){
    $result = array("msg" => "An error occurred");
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>
