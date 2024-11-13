<?php
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


$permission_level= isset($data['permission_level']) ? intval($data['permission_level']) : 9999999;
$SQL_edit = "SELECT * FROM permissions WHERE permission_level={$permission_level}";
$Result=$Connect->query($SQL_edit);

if ($row = $Result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'No data found']);
}


// $Result=$Connect->query($SQL_edit);

$permission_name = isset($data['permission_name']) ? $data['permission_name'] : '';

date_default_timezone_set('Asia/Taipei');   /*設定時間*/
$current_time=date('Y-m-d H:i:s');           /*設定時間*/

// $Result2;

// 編輯
if (!empty($permission_level) && !empty($permission_name)) {
    $SQL_update = "UPDATE permissions SET permission_level='$permission_level', permission_name='$permission_name', modification_time='$current_time' WHERE permission_level=$permission_level";
    $Result2=$Connect->query($SQL_update);
    if ($Result2 === TRUE) {
        echo json_encode(['success' => 'Data updated successfully']);
    } else {
        echo json_encode(['error' => 'Update failed: ' . $Connect->error]);
    };
// 編輯

};

?>