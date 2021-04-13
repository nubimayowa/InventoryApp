
<?php

require_once("config.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

try{
   $empid = $data->empid;
   $email = $data->email;
   $staff_name = $data->staff_name;
   $pass = $data->pass;
   $mob = $data->mob;
   $doe = $data->doe;
    if($empid !== "" && $email !== "" && $pass !== "" && $mob !== "" && $doe !== "" && $staff_name !== "") {
        $password = hash("SHA256", $pass);
        $sql = "insert into registration(empid, email, staff_name, pass, mob, doe) value(?, ?, ?, ?, ?, ?)";
        $stmtselect = $db->prepare($sql);
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

}
catch(Exception $ex){
    $result = array("msg" => "An error occurred");
    // print_r($result);
    header('HTTP/1.1 500 Error');
    echo json_encode($ex);
}

?>