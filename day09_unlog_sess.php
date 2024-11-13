<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>day09_unlogged</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 96vh;
            background-image: url('index_about_01.jpg');
            background-size: cover; /* 使背景圖片覆蓋整個容器 */
            background-repeat: no-repeat; /*防止背景圖片重複*/
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        } 
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* 背景顏色，這裡是黑色，透明度根據需要調整 */
            mix-blend-mode: multiply; /* 混合模式，可以根據需要調整 */
        }
        .login_title{
            width: 30vw;
            text-align:center;
            z-index: 2;
        }
        .login_box{
            /* border:2px solid red; */
            width: 350px;
            height: 25vh;
            z-index: 1;
            background-color: lightgray;
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        .login_word{
            margin-top:10px;
            font-weight:bolder;
        }
        .account_input{
            display:flex;
            margin-top:20px;
        }
        .password_input{
            display:flex;
            margin-top:20px;
        }
        .account{
            width: 40px;
        }
        .password{
            width: 40px;
        }
        .login_but{
            margin-top:20px;
        }
    </style>
</head>
<body>
        <h2 class="login_title">登入系統</h2>
        <div class="login_box">
            <div class="login_word">登入Login</div>

            <div class="account_input">
                <div class="account">帳號</div>
                <input type="text" class="input_account">
            </div>

            <div class="password_input">
                <div  class="password">密碼</div>
                <input type="password" class="input_password">
            </div>
            <button class="login_but" onclick=login()>登入</button>
        </div>
       
<script>
    function login(){
        const account_value=document.querySelector('.input_account').value;
        const password_value=document.querySelector('.input_password').value;

        fetch('day09_api_log_sess.php',{
            method:'POST',
            headers:{
                'Content-Type':"application/json"
            },
            body:JSON.stringify({
                "employee_account":account_value,
                "employee_password":password_value
            })
        })/*將用fetch 輸出的request變成json格式?*/

        .then(response=>response.json()) /*是把fetch 返回的response變成json格式?*/
        .then(response => {
            if (response.message === '登入成功') {
                console.log("登入成功", response);
                // 登入成功，跳轉到指定頁面
                window.location.href = "http://192.168.0.158/training/%e8%ae%8a%e6%9b%b4%e8%a8%98%e9%8c%84/day09%e5%80%91/day09/day09_login.php";
            } else {
                // 登入失敗，保留在原本的頁面並提示錯誤訊息
                alert('帳號或密碼錯誤');
            }
        })
        .catch(error => {
            console.error('發生錯誤:', error);
        });
    }


</script>        

</body>
</html>
