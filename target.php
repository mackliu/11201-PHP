<h2>目標頁面</h2>
<?php

if(!empty($_GET)){
    echo "以下資料為GET表單的資料<br>";
    $age=$_GET['age'];
    echo "你的年紀為".$age."<br>";
    if($age>=45){
        echo "屬於中高齡";
    }else if($age>=35){
        echo "屬於中年人";
    }else if($age>=25){
        echo "屬於青年";
    }else{
        echo "屬於少年";
    }
}

if(!empty($_POST)){
    echo "以下資料為POST表單的資料<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
//empty();



//echo $_GET['addr'];
//echo $_POST['name'];
//echo $_POST['type'];



?>
