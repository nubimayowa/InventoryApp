
<?php

require_once("config.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

try{
     $stmtselect = $db->prepare("SELECT * FROM registration");
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
catch(Exception $ex){
    $result = array("msg" => "An error occurred");
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>