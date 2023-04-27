<?php
$acc='admin';
$pw='1234';
if($_POST['acc']==$acc && $_POST['pw']==$pw){
    echo "帳密正確，登入成功";
}else{
    header("location:login.php?error=帳密錯誤，登入失敗");
}

?>
<br>
<br>
<br>
<a href="login.php">回登入頁</a>