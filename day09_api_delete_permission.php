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
$permission_level_delete= isset($data['permission_level']) ? intval($data['permission_level']) : 0;


$SQL_delete = "DELETE FROM permissions WHERE permission_level={$permission_level_delete}";

$Result=$Connect->query($SQL_delete);

?>