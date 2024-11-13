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
$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據
$id_delete= isset($data['id']) ? intval($data['id']) : 0;


$SQL_delete = "DELETE FROM employees WHERE id={$id_delete}";

$Result=$Connect->query($SQL_delete);
if ($Result) {
    echo json_encode(["status" => "success", "message" => "刪除成功"]);
} else {
    echo json_encode(["status" => "error", "message" => "刪除失敗: " . $Connect->error]);
}
?>