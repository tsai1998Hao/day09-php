<?php
$SERVER_NAME="localhost";
$USER_NAME="root";
$PASSWORD="";
$DB_NAME="day09_0704";

$Connect= new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

if ($Connect->connect_error) {
    die("連接失敗了!因為：" . $Connect->connect_error);
}
$SQL="SELECT * FROM `permissions`";

$Result=$Connect->query($SQL);

while($row=$Result->fetch_assoc()){
    $data[]=$row;
};
echo json_encode($data);
?>