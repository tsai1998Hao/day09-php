<?php
// 解決CORS問題
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// 解決CORS問題

$SERVER_NAME="localhost";
$USER_NAME="root";
$PASSWORD="";
$DB_NAME="day09_0704";

$Connect= new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if($Connect->connect_error){
    die("失敗".$Connect->connect_error);
};



if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit; // 结束预检请求，避免继续执行 比免一次新增兩次資料 要再深究!!!!!!
}

$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據

$employee_account="test66666";
$chinese_name="test";
$employee_password="test";
$permission_level="test";
$storeid="0"; 


if(isset($data['account']) && isset($data['name']) && isset($data['password']) && isset($data['permission']) && isset($data['store'])){
    $employee_account= $data['account'];
    $chinese_name= $data['name'];
    $employee_password= $data['password'];
    $permission_level= $data['permission'];
    $storeid=$data['store']; 
}else{
    echo"還沒送出資料而已啦 沒事~";
}


date_default_timezone_set('Asia/Taipei');   /*設定時間*/
$current_time=date('Y-m-d H:i:s');          /*設定時間*/

$SQL2 = "INSERT INTO `employees` (`employee_account`, `chinese_name`, `employee_password`, `permission_level`,  `storeid`, `modification_time`)
VALUES ('$employee_account', '$chinese_name', '$employee_password', '$permission_level', '$storeid', '$current_time')";

if ($Connect->query($SQL2) === TRUE) {
    echo json_encode(["data insert success"]);
} else {
    echo json_encode(["失敗qq" => false, "message" => "錯誤: " . $SQL2 . "<br>" . $Connect->error]);
}

?>