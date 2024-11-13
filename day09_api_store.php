<?php
$SERVER_NAME="localhost";
$USER_NAME="root";
$PASSWORD="";
$DB_NAME="day09_0704";

$Connect= new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if($Connect->connect_error){
    die("失敗啦".$Connect->connect_error);
};

// 設置響應頭部為 JSON 格式
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據



if (isset($data['restoreid'])) {
    $restoreid_receive = $data['restoreid'];

    if (strlen($restoreid_receive) > 2) {
        $restoreid_receive01 = substr($restoreid_receive, 0, 1);
        $restoreid_receive02 = substr($restoreid_receive, 2, 1);
        $SQL = "SELECT * FROM `employees` WHERE storeid LIKE '%$restoreid_receive01%'";
        $SQL2 = "SELECT * FROM `employees` WHERE storeid = '$restoreid_receive02'";
        $rows = array();

        $Result = $Connect->query($SQL);
        while ($row = $Result->fetch_assoc()) {
            $rows[] = $row;
        }

        $Result2 = $Connect->query($SQL2);
        while ($row = $Result2->fetch_assoc()) {
            $rows[] = $row;
        }
    } else {
        $SQL = "SELECT * FROM `employees` WHERE storeid LIKE '%$restoreid_receive%'";
        $rows = array();

        $Result = $Connect->query($SQL);
        while ($row = $Result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
} else {
    echo json_encode(array('message' => 'No restoreid provided'));
}
?>