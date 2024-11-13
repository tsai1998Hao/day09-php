<?php
$SERVER_NAME="localhost";
$USER_NAME="root";
$PASSWORD="";
$DB_NAME="day09_0704";

$Connect= new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if($Connect->connect_error){
    die("失敗".$Connect->connect_error);
};

$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據

$permission_level="test";
$permission_name="test";



if(isset($data['permission_level']) && isset($data['permission_name'])){
    $permission_level= $data['permission_level'];
    $permission_name= $data['permission_name'];
}else{
    echo"還沒送出資料而已啦 沒事~";
}


date_default_timezone_set('Asia/Taipei');   /*設定時間*/
$current_time=date('Y-m-d H:i:s');          /*設定時間*/

$SQL2 = "INSERT INTO `permissions` (`permission_level`, `permission_name`, `modification_time`)
VALUES ('$permission_level', '$permission_name', '$current_time')";

if ($Connect->query($SQL2) === TRUE) {
    echo json_encode(["data insert success"]);
} else {
    echo json_encode(["失敗qq" => false, "message" => "錯誤: " . $SQL2 . "<br>" . $Connect->error]);
}

?>