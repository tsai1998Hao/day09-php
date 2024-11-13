<?php
session_start(); // 確保會話已開始
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>day09_login</title>
    <!-- font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font-awsome -->

    <style>
        body{
            background-color: gray;
        }
        main{
            display:flex;
        }
        .disappear{
            display: none !important;
        }


/*資料顯示-員工個人資料*/
        .details_block1{
            border:5px solid white;
            width:350px;/*連動1*/
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        .member_details{
            width:300px;/*連動1*/
            height:140px;
        }
        .detail_title{
            font-size:30px;
            font-weight:800;
            text-align:center;
            margin-top:10px;
        }
        .member_id{
            font-size:24px;
            margin-left:15px;
            margin-top:10px;
        }
        .chinese_name{
            font-size:24px;
            margin-left:15px;
            margin-top:10px;
        }
        .permission_level{
            font-size:24px;
            margin-left:15px;
            margin-top:10px;
        }
        .show_my_data{
            width: 80px;
            margin-top:40px;
        }
        .store_areas{
            border: 3px solid pink;
            width: 300px;   /*連動1*/
            display:flex;
            flex-direction:column;
            align-items:center;
        }


        /*個人資訊---單位資料*/
        .store_information_areas{
            width: 300px;
        }

        .store01_inf_who, .store02_inf_who, .store03_inf_who{
            border-bottom: 1px solid black;
            margin-bottom:3px;
            padding-bottom:8px;
        }
        /*個人資訊---單位資料*/



/*資料顯示-員工個人資料*/



/*資料顯示區*/
        .load_data{
            border:5px solid white;
            width: 800px;
            display:flex;
            flex-direction:column;
            align-items:center;
            margin-left:10px;
        }
        .setting_butts{
            width: 250px;
            height: 34px;
            display:flex;
            align-items:center;
            justify-content: center;
            margin-top:30px;
        }
        .employees_butt{
            margin-right:2px;
        }
        .permissions_butt{
            margin-left:2px;
        }

        .create_butt_out{
            /* width: 100%; */
            margin-top:30px;
            display:flex;
            /* flex-direction:column; */
            justify-content:center;
            align-items:center;
            /* border:1px solid red; */
        }
        .create_butt{
            margin-right:500px;
        }


    /*資料顯示-員工清單*/

        .scrollTable1{   /* 滾輪設定 */
            border:2px solid black;
            height: 495px;         
            /*高度動態調整*/
            overflow-y: scroll;
        }
        .scrollTable1::-webkit-scrollbar {
            width: 10px; /* 要設定寬度才會吃下面的設定!!!!! */
        }

        .scrollTable1::-webkit-scrollbar-track {
            /* 滾輪軌道顏色 */
            background-color: white; 
        }

        .scrollTable1::-webkit-scrollbar-thumb {  /* 滾輪設定 */
            /* 滾輪本身顏色 */
            background-color: black; 
        }
        .my_talbe1{
            border-collapse: separate;
            width: 700px;
            /* border:2px solid green; */
        }
        .head_tr1{
            border: 1px solid white;
            background-color: #384978;
            align-items: center;
            text-align: center;
            line-height: 20px;
            color:white;
        }
        .body_tr1{
            background-color: white;
        }
    /*資料顯示-員工清單*/



    /*資料顯示-權限清單*/

        .scrollTable2{   /* 滾輪設定 */
            border:2px solid black;
            height: 495px;         
            /*高度動態調整*/
            overflow-y: scroll;
        }
        .scrollTable2::-webkit-scrollbar {
            width: 10px; /* 要設定寬度才會吃下面的設定!!!!! */
        }

        .scrollTable2::-webkit-scrollbar-track {
            /* 滾輪軌道顏色 */
            background-color: white; 
        }

        .scrollTable2::-webkit-scrollbar-thumb {  /* 滾輪設定 */
            /* 滾輪本身顏色 */
            background-color: black; 
        }
        .my_talbe2{
            border-collapse: separate;
            width: 700px;
            /* border:2px solid green; */
        }
        .head_tr2{
            border: 1px solid white;
            background-color: #384978;
            align-items: center;
            text-align: center;
            line-height: 20px;
            color:white;
        }
        .body_tr2{
            background-color: white;
        }
    /*資料顯示-權限清單*/

/*資料顯示區*/


/*資料新增-員工*/
        .insert_employee_areas{
            border:5px solid white;
            margin-left:10px;
            width: 250px;
            height: 290px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .insert_name, .insert_password, .insert_permission, .insert_but_div{
            margin-top:10px;
        }
/*資料新增-員工*/

/*資料編輯-員工*/
    .edit_areas{
        border:5px solid white;
        margin-left:10px;
        width: 250px;
        height: 290px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }

/*資料編輯-員工*/



/*資料新增-權限*/
        .insert_permission_areas{
            border:5px solid white;
            margin-left:10px;
            width: 250px;
            height: 290px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
/*資料新增-權限*/


/*資料編輯-權限*/
    .edit_permission_areas{
        border:5px solid white;
        margin-left:10px;
        width: 250px;
        height: 290px;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }
/*資料編輯-權限*/

    </style>
</head>
<body>




    <main>
<!-- 資料顯示-員工個人資料 -->
        <div class="details_block1">
            <div class="detail_title">-----員工資料-----</div>
            <div class="member_details">
                <div class="member_id">員工編號:
                    <?php
                        // 檢查是否存在 $_SESSION['employee']
                        if (isset($_SESSION['employee'])) {
                            $employeeData = $_SESSION['employee'];
                            // 顯示員工資料
                            echo "<span class='my_id'>{$employeeData['id']}</span>";
                        } else {
                            echo "<span>尚未登入</span>";
                        }
                    ?>
                </div>

                <div class="chinese_name">中文名稱:
                    <?php
                        // 檢查是否存在 $_SESSION['employee']
                        if (isset($_SESSION['employee'])) {
                            $employeeData = $_SESSION['employee'];
                            // 顯示員工資料
                            echo "{$employeeData['chinese_name']}";
                        } else {
                            echo "<span>尚未登入</span>";
                        }
                    ?>
                </div>
                
                <div class="permission_level">權限名稱:
                    <?php
                        // 檢查是否存在 $_SESSION['employee']
                        if (isset($_SESSION['employee'])) {
                            $employeeData = $_SESSION['employee'];
                            // 顯示員工資料
                            echo "{$employeeData['permission_name']}";
                        } else {
                            echo "<span>尚未登入</span>";
                        }
                    ?>
                </div>
                <div class="permission_level">隸屬部門:
                    <?php
                        // 檢查是否存在 $_SESSION['employee']
                        if (isset($_SESSION['employee'])) {
                            $employeeData = $_SESSION['employee'];
                            // 顯示員工資料
                            echo "<span class='storeid_name'>{$employeeData['storeid_name']}</span>";
                        } else {
                            echo "<span>尚未登入</span>";
                        }
                    ?>
                    <?php
                        // 檢查是否存在 $_SESSION['employee']
                        if (isset($_SESSION['employee'])) {
                            $employeeData = $_SESSION['employee'];
                            // 顯示員工資料
                            echo "<div class='hide_storeid disappear'>{$employeeData['storeid']}</div>";
                        }
                    ?>
                </div>

            </div>

            <div>
                <button class="show_my_data" onclick="load_store()">顯示單位</button>
                <button onclick="logout()">登出</button>
            </div>

            <!-- <div class="store_areas disappear">
                <div class="store_name">尚未登入</div>
            </div> -->





            <div class="store_information_areas">
                <div class="store_information_area01">
                    <div class="store01_inf_name">單位名稱:</div>
                    <div class="store01_inf_counts">單位人數:</div>
                    <div class="store01_inf_who">該單位有:</div>
                </div> 

                <div class="store_information_area02">
                    <div class="store02_inf_name">單位名稱:</div>
                    <div class="store02_inf_counts">單位人數:</div>
                    <div class="store02_inf_who">單位人名:</div>
                </div>     

                <div class="store_information_area03">
                    <div class="store03_inf_name">單位名稱:</div>
                    <div class="store03_inf_counts">單位人數:</div>
                    <div class="store03_inf_who">單位人名:</div>
                </div>  

                <div class="store_information_area04">
                    <div class="store04_inf_name">單位名稱:</div>
                    <div class="store04_inf_counts">單位人數:</div>
                    <div class="store04_inf_who">單位人名:</div>
                </div>

            </div>
        </div>
<!-- 資料顯示-員工個人資料 -->


        <div class="load_data">
            <div class="setting_butts">
                <?php
                    if(isset($_SESSION['employee'])){
                        if($_SESSION['employee']['permission_level']==1 || $_SESSION['employee']['permission_level']==2){
                            echo '<button class="employees_butt" onclick=loadData()>員工設定檔</button>';
                        }
                        else{
                            echo '<button class="employees_butt" onclick=loadData() disabled>員工設定檔</button>'; 
                        }
                    };
                ?>
                
                <?php
                    if(isset($_SESSION['employee'])){
                        if($_SESSION['employee']['permission_level']==1){
                            echo '<button class="permissions_butt" onclick=loadPermissions_data()>權限設定檔</button>';
                        }                        
                        else{
                            echo '<button class="permissions_butt" onclick=loadPermissions_data() disabled>權限設定檔</button>'; 
                        }
                    };
                ?>
            </div>

            <div class="create_butt_out">
                <?php
                    if(isset($_SESSION['employee'])){
                        if($_SESSION['employee']['permission_level']==1 ||$_SESSION['employee']['permission_level']==2){
                            echo '<button class="create_butt" onclick=toggle_employee_insert()>新增員工</button>';
                        }
                    };
                ?>
                
                <?php
                    if(isset($_SESSION['employee'])){
                        if($_SESSION['employee']['permission_level']==1){
                            echo '<button class="create_permission_butt" onclick=toggle_permission_insert()>新增權限</button>';
                        }
                    };
                ?>
                
            </div>



<!-- 資料顯示-員工清單 -->
            <div class="scrollTable1 disappear">
                <table class="my_talbe1">
                    <thead class="table_head1">
                        <tr class="head_tr1">
                            <th></th>
                            <th>員工編號</th>
                            <th>員工帳號</th>
                            <th>名稱</th>
                            <th>員工密碼</th>
                            <th>權限名稱</th>
                            <th>修改時間</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table_body1">

                    </tbody>
                </table>
            </div>
<!-- 資料顯示-員工清單 -->

<!-- 資料顯示-權限清單 -->
            <div class="scrollTable2 disappear">
                <table class="my_talbe2">
                    <thead class="table_head2">
                        <tr class="head_tr2">
                            <th></th>
                            <th>權限等級</th>
                            <th>權限名稱</th>
                            <th>修改時間</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table_body2">

                    </tbody>
                </table>
            </div>
<!-- 資料顯示-權限清單 -->
        </div>

<!-- 資料新增-員工 -->
        <div class="insert_employee_areas disappear">
            <div >

                <div class=insert_account>
                    <label for="label_account">員工帳號:</label>
                </div>
                <input class="input_account" type="text" id="label_account">

                <div class=insert_name>
                    <label for="label__name">名稱:</label>
                </div>
                <input class="input_name" type="text" id="label__name">

                <div class=insert_password>
                    <label for="label__password">員工密碼:</label>
                </div>
                <input class="input_password" type="text" id="label__password">                
                
                <?php
                if (isset($_SESSION['employee'])) {
                    $employeeData = $_SESSION['employee'];
                    // 顯示員工資料
                    echo "<div>{$employeeData['storeid']}</div>";
                } else {
                    echo "<span>尚未登入</span>";
                }
                ?>


                <div class=insert_store>
                    <label for="label_store">隸屬部門:</label>
                    <select class="input_store1">
                        <option value="1">總公司</option>
                        <option value="2">技術部</option>
                        <option value="3">營業部</option>
                        <option value="4">人事部</option>
                        <option value="5">研發部</option>
                    </select>
                    <select class="input_store2">
                        <option value="0">----跨部門員工---</option>
                        <option value="1">總公司</option>
                        <option value="2">技術部</option>
                        <option value="3">營業部</option>
                        <option value="4">人事部</option>
                        <option value="5">研發部</option>
                    </select>
                </div>




                <div class=insert_permission>
                    <label for="label_permission">權限名稱:</label>
                    <select class="input_permission" id="label_permission">
                        <option value="1">老闆</option>
                        <option value="2">主管</option>
                        <option value="3" selected>員工</option>
                        <option value="4">路人</option>
                    </select>
                </div>
            </div>
            <div class="insert_but_div">
                <button onclick=insert_data()>送出</button>
                <button onclick=toggle_employee_insert()>取消</button>
            </div>
        </div>
<!-- 資料新增-員工 -->


<!-- 資料編輯-員工 -->
            <div class="edit_areas disappear">
                <div>

                    <div class=edit_account>
                        <label for="label_edit_account">員工帳號:</label>
                    </div>
                    <input class="input_edit_account" type="text" id="label_edit_account">

                    <div class=edit_name>
                        <label for="label_edit_name">名稱:</label>
                    </div>
                    <input class="input_edit_name" type="text" id="label_edit_name">

                    <div class=edit_password>
                        <label for="label_edit_password">員工密碼:</label>
                    </div>
                    <input class="input_edit_password" type="text" id="label_edit_password">                
                    
                    <div class=edit_permission>
                        <label for="label_edit_permission">權限名稱:</label>
                        <select class="input_edit_permission" id="label_edit_permission">
                            <option value="1">老闆</option>
                            <option value="2">主管</option>
                            <option value="3" selected>員工</option>
                            <option value="4">路人</option>
                        </select>

                    </div>
                </div>
                <div class="edit_but_div">
                    <button onclick=send_edit_data()>更改</button>
                    <button onclick=undo_edit()>取消</button>
                </div>
            </div>
<!-- 資料編輯-員工 -->

<!-- 資料新增-權限 --> 
        <div class="insert_permission_areas disappear">
            <div >

                <div class=insert_permission_level>
                    <label for="label_permission_level">權限等級:</label>
                </div>
                <input class="input_permission_level" type="number" id="label_permission_level">

                <div class=insert_permission_name>
                    <label for="label__permission_name">權限名稱:</label>
                </div>
                <input class="input_permission_name" type="text" id="label__permission_name">

            
            </div>
            <div class="insert_but_div">
                <button onclick=insert_permission_data()>送出</button>
                <button onclick=toggle_permission_insert()>取消</button>
            </div>
        </div>
<!-- 資料新增-權限 -->


<!-- 資料編輯-權限 -->
            <div class="edit_permission_areas disappear">
                <div>

                    <div class=edit_permission_level>
                        <label for="label_edit_permission_level">權限等級:</label>
                    </div>
                    <input class="input_edit_permission_level" type="text" id="label_edit_permission_level">

                    <div class=edit_permission_name>
                        <label for="label_edit_permission_name">權限名稱:</label>
                    </div>
                    <input class="input_edit_permission_name" type="text" id="label_edit_permission_name">

                </div>
                <div class="edit_but_div">
                    <button onclick=send_permission_edit_data()>更改</button>
                    <button onclick=undo_permission_edit()>取消</button>
                </div>
            </div>
<!-- 資料編輯-權限 -->


    </main>


        <script>
            function loadData(){
                fetch("day09_api01.php")
                .then(res=> res.json())
                .then(data=>{
                    const scrollTable1=document.querySelector('.scrollTable1');
                    scrollTable1.classList.remove('disappear');
                    const scrollTable2=document.querySelector('.scrollTable2');
                    scrollTable2.classList.add('disappear');
                    const table_body1=document.querySelector('.table_body1');
                    table_body1.innerHTML=``;
                    data.forEach(data_item=>{
                        const data_tr=document.createElement('tr');
                        data_tr.classList.add('body_tr1');
                        /*如果權限對應的是空值，要設定警告*/
                        if(!data_item.permission_name){
                            data_item.permission_name="該權限未被正確設定!!!"
                        }
                        /*如果權限對應的是空值，要設定警告*/
                        data_tr.innerHTML=`
                            <td data-id:"${data_item.id}" onclick="show_edit_data(${data_item.id})"><i class="fa-solid fa-pen"></i></td> 
                            <td>${data_item.id}</td>
                            <td>${data_item.employee_account}</td>
                            <td>${data_item.chinese_name}</td>
                            <td>${data_item.employee_password}</td>
                            <td>${data_item.permission_name}</td>
                            <td>${data_item.create_time}</td>
                            <td data-id:"${data_item.id}" onclick="delete_data(${data_item.id})"><i class="fa-solid fa-trash"></i></td>
                        `;

                        table_body1.appendChild(data_tr);
                    })
                })
                .catch(error=>{
                    console.error(error);
                })
            }
            function loadPermissions_data(){
                const scrollTable1=document.querySelector('.scrollTable1');
                scrollTable1.classList.add('disappear');
                const scrollTable2=document.querySelector('.scrollTable2');
                scrollTable2.classList.remove('disappear');

                fetch("day09_api_permissions.php")
                .then(res=> res.json())
                .then(data=>{
                    console.log(data);
                    const table_body2=document.querySelector('.table_body2');

                    table_body2.innerHTML=``;
                    data.forEach(data_item=>{ //將資料輸出清單
                        const data_tr=document.createElement('tr');
                        data_tr.classList.add('body_tr2');
                        data_tr.innerHTML=`
                            <td data-id:"${data_item.permission_level}" onclick="show_permission_edit_data(${data_item.permission_level})"><i class="fa-solid fa-pen"></i></td> 
                            <td>${data_item.permission_level}</i></td> 
                            <td>${data_item.permission_name}</td>
                            <td>${data_item.modification_time}</td>
                            <td data-id:"${data_item.permission_level}" onclick="delete_permission_data(${data_item.permission_level})"><i class="fa-solid fa-trash"></i></td>
                        `;
                        table_body2.appendChild(data_tr); 
                    })
                })
                .catch(error=>{
                    console.error(error);
                })            
            }
            function loadPermissions_data_input(){
                fetch("day09_api_permissions.php")
                .then(res=> res.json())
                .then(data=>{
                    console.log(data);
                    const input_permission=document.querySelector('.input_permission');
                    input_permission.innerHTML=``;
                    data.forEach(data2=>{
                        const data_option=document.createElement('option');
                        data_option.innerHTML=`${data2.permission_name}`;
                        data_option.value=data2.permission_level;
                        if (data2.permission_level==3){
                            data_option.selected=true;
                        }
                        input_permission.appendChild(data_option);
                    });
                })
                .catch(error=>{
                    console.error(error);
                })            
            }
            function load_store(){
                const hide_storeid=document.querySelector('.hide_storeid').innerHTML;
                console.log(hide_storeid);
                fetch("day09_api_store.php",{
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body:JSON.stringify({
                        'restoreid':hide_storeid,
                    })
                })
                .then(response=>response.json())
                .then(response=>{
                    console.log(response)
                    const storeid_name=document.querySelector('.storeid_name').innerHTML;
                    const stre_item = storeid_name.split(',').filter(item => item.trim() !== ''); // 使用 filter 去掉空字符串，把部門s字串變成物件
                    const stre_count = stre_item.length; //部門數量
                    if(stre_count==1){
                        console.log("單位只有一個");
                        const store01_inf_name=document.querySelector('.store01_inf_name');
                        store01_inf_name.innerHTML=`單位名稱: ${stre_item[0]}`;
                        const store01_inf_counts=document.querySelector('.store01_inf_counts');
                        store01_inf_counts.innerHTML=`單位人數: ${response.length}`; //單位人數
                        const store01_inf_who=document.querySelector('.store01_inf_who');
                    store01_inf_who.textContent=`該單位有:`;
                    for(i=0; i<response.length; i++){
                        const store01_inf_who=document.querySelector('.store01_inf_who');
                        store01_inf_who.innerHTML+=`《${response[i].chinese_name}》`;
                    }
                    }else if(stre_count==2){
                        /*單位名稱*/             
                        const store01_inf_name=document.querySelector('.store01_inf_name');
                        store01_inf_name.innerHTML=`單位名稱: ${stre_item[0]}`;
                        const store02_inf_name=document.querySelector('.store02_inf_name');
                        store02_inf_name.innerHTML=`單位名稱: ${stre_item[1]}`;
                        /*單位名稱*/

                        const hide_storeid=document.querySelector(".hide_storeid").innerHTML;

                        /*單位人數跟成員_section1*/
                        const store01_inf_who=document.querySelector('.store01_inf_who');
                        const keyword1=hide_storeid[0];
                        store_first=[];
                        response.forEach(res=>{
                            if(res.storeid.includes(keyword1)){
                                store_first.push(res);
                            }
                        })
                        const store01_inf_counts=document.querySelector('.store01_inf_counts');
                        store01_inf_counts.innerHTML=`單位人數: ${store_first.length}`; //單位人數
                        store01_inf_who.innerHTML=``;
                        store_first.forEach(store=>{
                            store01_inf_who.innerHTML +=`《${store.chinese_name}》`;
                        });
                        /*單位人數跟成員_section1*/


                        /*單位人數跟成員_section2*/
                        const store02_inf_who=document.querySelector('.store02_inf_who');
                        const keyword2=hide_storeid[2];
                        store_second=[];
                        response.forEach(res=>{
                            if(res.storeid.includes(keyword2)){
                                store_second.push(res);
                            }
                        })
                        const store02_inf_counts=document.querySelector('.store02_inf_counts');
                        store02_inf_counts.innerHTML=`單位人數: ${store_second.length}`; //單位人數
                        store02_inf_who.innerHTML=``;
                        store_second.forEach(store=>{
                            store02_inf_who.innerHTML +=`《${store.chinese_name}》`;
                        });
                        /*單位人數跟成員_section2*/
                    }else if (stre_count==3){
                        console.log("單位有三個，也太多了吧，'我還沒做")
                    }else{
                        console.log('身兼多個單位')
                    }
                })
                .catch(error=>{
                    console.error(error);
                })
            }





            function toggle_employee_insert(){
                
                const insert_employee_areas=document.querySelector('.insert_employee_areas');
                insert_employee_areas.classList.toggle("disappear");
                loadPermissions_data_input()
            }
            function toggle_permission_insert(){
                const insert_permission_areas=document.querySelector('.insert_permission_areas');
                insert_permission_areas.classList.toggle("disappear")
            }





// 資料新增-員工
            function insert_data(){
                const input_account=document.querySelector('.input_account');
                const account_value=input_account.value;
                const input_name=document.querySelector('.input_name');
                const name_value=input_name.value;
                const input_password=document.querySelector('.input_password');
                const password_value=input_password.value;

                const input_store1=document.querySelector('.input_store1');
                const store_value1=input_store1.value;
                const input_store2=document.querySelector('.input_store2');
                const store_value2=input_store2.value;
                let store_value;
                if(store_value2==0 || store_value2==store_value1){
                    //store_value2==0，代表第二個input沒有選擇，因此只隸屬一個部門
                    //store_value2==store_value1，代表選了兩個一樣的部門，就當作只隸屬一個部門
                    store_value= store_value1; 
                }else{
                    //其他的狀況代表選了兩個部門，此情況下又有兩種情況
                    //storeid可能排序小到大1,2
                    //storeid可能排序大到小5,3，此時為了整齊，要排序成3,5
                    let combined=store_value= store_value1+","+store_value2;
                    store_value=combined.split(',').sort((a,b)=>a-b).join(',');
                }

                const input_permission=document.querySelector('.input_permission');
                const permission_value=input_permission.value;

                fetch("day09_api02.php",{
                    method:'POST',
                    header:{
                        'Content-Type':"application/json"  
                    },
                    body:JSON.stringify({ 
                        "account":account_value,
                        "name":name_value,
                        "password":password_value,
                        "store": store_value,
                        "permission": permission_value,
                    })
                })
                .then(res=>res.json())
                .then(result=>console.log(result))
                location.reload();
            }
// 資料新增-員工

// 資料新增-權限
            function insert_permission_data(){
                const  input_permission_level=document.querySelector('.input_permission_level');
                const permission_level_value= input_permission_level.value;
                const input_permission_name=document.querySelector('.input_permission_name');
                const permission_name_value=input_permission_name.value;
                console.log(permission_level_value, permission_name_value);
                fetch("day09_api_insert_permission.php",{
                    method:'POST',
                    header:{
                        'Content-Type':"application/json"  
                    },
                    body:JSON.stringify({ 
                        "permission_level":permission_level_value,
                        "permission_name":permission_name_value,
                    })
                })
                .then(res=>res.json())
                .then(result=>console.log(result))
                location.reload();
            }
// 資料新增-權限




//資料編輯-員工
            let data_id=0;
            function show_edit_data(id){
                const edit_areas=document.querySelector('.edit_areas');
                edit_areas.classList.remove('disappear');
                data_id=id;
                fetch("day09_api03.php",{
                    method:'POST',
                    headers:{
                        'Content-Type':"application/json"  
                    },
                    body:JSON.stringify({ 
                        "id":data_id,
                    })
                })
                .then(response=>response.json())
                .then(data=>{
                    console.log(data);
                    const input_edit_account=document.querySelector(".input_edit_account");
                    input_edit_account.value=data.employee_account;
                    const input_edit_name=document.querySelector(".input_edit_name");
                    input_edit_name.value=data.chinese_name;
                    const input_edit_password=document.querySelector(".input_edit_password");
                    input_edit_password.value=data.employee_password;
                    const input_edit_permission=document.querySelector(".input_edit_permission");
                    input_edit_permission.value=data.permission_level;     
                })
            }

            function send_edit_data(){
                const input_edit_account=document.querySelector('.input_edit_account').value;
                const input_edit_name=document.querySelector('.input_edit_name').value;
                const input_edit_password=document.querySelector('.input_edit_password').value;
                const input_edit_permission=document.querySelector('.input_edit_permission').value;
                console.log(input_edit_account,input_edit_name,input_edit_password,input_edit_permission);
                let confirmed = confirm("確定要修改嗎?");
                
                if (confirmed) {
                    fetch('day09_api03.php',{
                        method: 'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            'id':data_id,
                            'employee_account':input_edit_account,
                            'chinese_name':input_edit_name,
                            'employee_password':input_edit_password,
                            'permission_level':input_edit_permission
                        })
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        if(data.error){
                            console.log(data.error);
                        }
                        else{
                            console.log('更新的資料送出成功')
                        }
                    })
                }
                location.reload();
            }
            function undo_edit(){
                const edit_areas=document.querySelector('.edit_areas');
                edit_areas.classList.add('disappear');
            }
//資料編輯-員工

//資料編輯-權限
            let permission_data_id=0;
            function show_permission_edit_data(id){
                const edit_permission_areas=document.querySelector('.edit_permission_areas');
                edit_permission_areas.classList.remove('disappear');
                permission_data_id=id;
                fetch("day09_api_edit_permission_data.php",{
                    method:'POST',
                    headers:{
                        'Content-Type':"application/json"  
                    },
                    body:JSON.stringify({ 
                        "permission_level":permission_data_id,
                    })
                })
                .then(response=>response.json())
                .then(data=>{
                    console.log(data);
                    const input_edit_permission_level=document.querySelector(".input_edit_permission_level");
                    input_edit_permission_level.value=data.permission_level;
                    const input_edit_permission_name=document.querySelector(".input_edit_permission_name");
                    input_edit_permission_name.value=data.permission_name;
                })
            }
            function send_permission_edit_data(){
                const input_edit_permission_level=document.querySelector('.input_edit_permission_level').value;
                const input_edit_permission_name=document.querySelector('.input_edit_permission_name').value;
                console.log(input_edit_permission_level, input_edit_permission_name);
                let confirmed = confirm("確定要修改嗎?");
                
                if (confirmed) {
                    fetch('day09_api_edit_permission_data.php',{
                        method: 'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            'permission_level':input_edit_permission_level,
                            'permission_name':input_edit_permission_name,
                        })
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        if(data.error){
                            console.log(data.error);
                        }
                        else{
                            console.log('更新的資料送出成功')
                        }
                    })
                }
                location.reload();
            }
            function undo_permission_edit(){
                const edit_permission_areas=document.querySelector('.edit_permission_areas');
                edit_permission_areas.classList.add('disappear');
            }

//資料編輯-權限




//資料刪除-員工
            function delete_data(id){
                data_id=id;
                console.log(data_id);
                let confirmed = confirm("確定要刪除嗎?");
                
                if (confirmed) {
                    fetch('day09_api04.php',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            'id':data_id,
                        })
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        if(data.error){
                            console.log(data.error);
                        }
                        else{
                            console.log('更新的資料送出成功')
                        }
                    })   
                    location.reload();   
                }      
            }
//資料刪除-員工

//資料刪除-權限
            function delete_permission_data(id){
                permission_data_id=id;
                console.log(permission_data_id);
                let confirmed = confirm("確定要刪除權限嗎? 刪除權限後，既有資料將會受到影響(變成空值)");
                if (confirmed) {
                    fetch('day09_api_delete_permission.php',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            'permission_level':permission_data_id,
                        })
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        if(data.error){
                            console.log(data.error);
                        }
                        else{
                            console.log('更新的資料送出成功')
                        }
                    })   
                    location.reload();   
                }      
            }



//資料刪除-權限

            function logout(){
                fetch('day09_api_logout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ logout: true })  // 可?????
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('成功')
                    } 
                    else {
                        // 錯誤的狀況
                        console.log('Logout failed:', data.error);
                    }
                })
                .catch(error => {
                    // console.error('Error during logout:', error);
                });
                // window.history.back();
                window.location.href = 'http://192.168.0.158/training/%e8%ae%8a%e6%9b%b4%e8%a8%98%e9%8c%84/day09%e5%80%91/day09/day09_unlog_sess.php';
            }

        </script>

</body>
</html>