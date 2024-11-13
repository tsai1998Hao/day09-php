<?php
    setcookie("tester", "Noah", time()+10);
?>

<?php 

if(isset($_COOKIE['tester'])){
    echo $_COOKIE['tester'];
}else{
    echo 'Cookie 沒了';
}
?>