<?php
$session_path=session_save_path();
if(strpos($session_path, ";")!== FALSE)
    $session_path=substr($session_path, strpos ($session_path, ";")+1);


    echo $session_path;

    session_start(); // 确保会话已启动

// 输出整个 $_SESSION 数组
echo "<pre>";
print_r($_SESSION);
echo "</pre>";


// session_destroy();     
?>