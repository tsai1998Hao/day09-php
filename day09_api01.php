<?php
// 解決CORS問題
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");





$SERVER_NAME="localhost";
$USER_NAME="root";
$PASSWORD="";
$DB_NAME="day09_0704";

$Connect= new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if ($Connect->connect_error) {
    die("連接失敗了!因為：" . $Connect->connect_error);
}
$SQL="SELECT employees.*, permissions.*,
employees.modification_time AS create_time 
FROM employees LEFT JOIN permissions ON permissions.permission_level = employees.permission_level";

// 加一個LEFT就解決了，我快哭了，AI太神了

$Result=$Connect->query($SQL);

while($row=$Result->fetch_assoc()){
    $data[]=$row;
};
echo json_encode($data);
?>