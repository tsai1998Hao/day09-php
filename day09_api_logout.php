<?php
    session_start(); 

    // 檢查session是否存在
    if (isset($_SESSION)) {
        // 清空所有 session
        $_SESSION = array();

        // 如果session、cookie存在，就把他們刪掉
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 86400, '/'); //設定cookie 的路徑為根目錄
        }

        // 清除session
        session_destroy();

        // 顯示登出成功的提示
        // echo '<script>console.log("Logout successful.");</script>';
    }

    // 登出後跳回登入頁面
    // $redirect_url = 'http://192.168.0.158/training/%e7%b7%b4%e7%bf%92/day09%e5%80%91/day09/day09_unlogged.php';
    // echo "<script>window.location.href = '$redirect_url';</script>";
    ?>