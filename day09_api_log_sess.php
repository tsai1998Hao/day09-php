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
if($Connect->connect_error){
    die("失敗".$Connect->connect_error);
};


$data = json_decode(file_get_contents('php://input'), true);  //接收前端AJAX、Fetch出來的 JSON 數據
// $employee_account= isset($data['employee_account'])? $data['employee_account']:9999999999999999999;
// $employee_password= isset($data['employee_password'])? $data['employee_password']:9999999999999999999;


$employee_account = isset($data['employee_account']) ? $data['employee_account'] : '';
$employee_password = isset($data['employee_password']) ? $data['employee_password'] : '';


// $SQL_check = "SELECT employees.*, permissions.*, 
// employees.modification_time AS create_time 
// FROM employees 
// JOIN permissions ON permissions.permission_level = employees.permission_level 
// WHERE `employee_account`='$employee_account' 
// AND `employee_password`='$employee_password'";

$SQL_check = "SELECT employees.*, permissions.permission_name,
GROUP_CONCAT(store.Chinese_name SEPARATOR ', ') AS storeid_name 
FROM employees
JOIN permissions ON permissions.permission_level = employees.permission_level
JOIN store ON FIND_IN_SET(store.storeid, employees.storeid) 
WHERE `employee_account`='$employee_account' 
AND `employee_password`='$employee_password'";




$result =$Connect->query($SQL_check);


/*如果SQL執行結果$result_row_num 大於1，代表有找到資料*/
if ( $result &&$result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['id'] !== null) { /*如果拿到的資料不是空值，那就是登入成功*/
        // 認證成功，設置session
        session_start();    
        $_SESSION['employee'] = $row;
        echo json_encode(array('message' => '登入成功', 'data' => $_SESSION['employee']));
    } else {
        // 認證失敗，返回錯誤消息
        echo json_encode(array('message' => '帳號或密碼錯誤'));
    }
} else {
    // 認證失敗，返回錯誤消息
    echo json_encode(array('message' => '帳號或密碼錯誤'));
}



    // 認證成功，設置session
//     session_start();    
//     $_SESSION['employee'] = $result->fetch_assoc();
//     echo json_encode(array('message' => '登入成功', 'data' => $_SESSION['employee']));



//     /*回傳的資料可能長這樣*/
//     /*
//         {
//             "message": "登入成功",
//             "data": {
//                 "id": 1,
//                 "employee_account": "john_doe",
//                 "employee_name": "John Doe",
//                 "permission_level": "admin"
//             }
//         }
//     */

    
// } else {
//     // 認證失敗，返回錯誤消息
//     echo json_encode(array('message' => '帳號或密碼錯誤'));
// }



?>