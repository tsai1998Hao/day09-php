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


// 設置響應頭部為 JSON 格式
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據


$id_edit= isset($data['id']) ? intval($data['id']) : 0;
$SQL_edit = "SELECT * FROM employees WHERE id={$id_edit}";
$Result=$Connect->query($SQL_edit);

if ($row = $Result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'No data found']);
}


// $Result=$Connect->query($SQL_edit);

$employee_account = isset($data['employee_account']) ? $data['employee_account'] : '';
$chinese_name = isset($data['chinese_name']) ? $data['chinese_name'] : '';
$employee_password = isset($data['employee_password']) ? $data['employee_password'] : '';
$permission_level = isset($data['permission_level']) ? $data['permission_level'] : '';

date_default_timezone_set('Asia/Taipei');   /*設定時間*/
$current_time=date('Y-m-d H:i:s');           /*設定時間*/

// $Result2;

// 編輯
if (!empty($employee_account) && !empty($chinese_name) && !empty($employee_password) && !empty($permission_level) ) {
    $SQL_update = "UPDATE employees SET employee_account='$employee_account', chinese_name='$chinese_name', employee_password='$employee_password', permission_level='$permission_level', modification_time='$current_time' WHERE id=$id_edit";
    $Result2=$Connect->query($SQL_update);
    if ($Result2 === TRUE) {
        echo json_encode(['success' => 'Data updated successfully']);
    } else {
        echo json_encode(['error' => 'Update failed: ' . $Connect->error]);
    };
// 編輯

};




?>