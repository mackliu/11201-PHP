<link rel="stylesheet" href="style.css">

<h2>月曆</h2>
<?php
$month=$_GET['month']??date("n");    //取得當前的月份
$year=$_GET['year']??date("Y"); //取得年份;
$firstDateTime=strtotime("$year-$month-1");    //取得當前月份第一天
$days=date("t",$firstDateTime);     //取得當前月份的總天數
$finalDateTime=strtotime("$year-$month-$days");    //取得當前月份最後一天
$firstDateWeek=date("w",$firstDateTime); //取得當前月份第一天的星期
$finalDateWeek=date("w",$finalDateTime); //取得當前月份最後一天的星期
$weeks=ceil(($days+$firstDateWeek)/7);  //計算當前月份的天數會佔幾周
$firstWeekSpace=$firstDateWeek-1;       //計算當前月份第一周的空白日(或前一個月份佔幾天)
$days=[];

//使用迴圈來畫出當前月的周數
for($i=0;$i<$weeks;$i++){

    //使用迴圈來畫出當周的天數
    for($j=0;$j<7;$j++){

        //判斷當周是否為第一周或最後一周以及是否印出空白的條件
        if(($i==0 && $j<$firstDateWeek) || (($i==$weeks-1) && $j>$finalDateWeek)){
            
            $days[]='&nbsp;';

        }else{


            $days[]=$year . "-" . $month . "-" . ($j+7*$i-$firstWeekSpace);
        }
    }
}

//建立一個陣列來儲存假日或特殊紀念日
$holiday=[
    '2023-5-1'=>"勞動節",
    '2024-5-1'=>"勞動節",
    '2022-5-1'=>"勞動節",
];

//判斷當當前月份為1月時，前一個月應為前年的12，否則只要減1即可
if($month==1){
    $prevYear=$year-1;
    $prevMonth=12;
}else{
    $prevYear=$year;
    $prevMonth=$month-1;
}

//判斷當當前月份為12月時，下一個月應為明年的1，否則只要加1即可
if($month==12){
    $nextYear=$year+1;
    $nextMonth=1;
}else{
    $nextYear=$year;
    $nextMonth=$month+1;
}
?>

<div>
    <!--建立上一個月的連結，並代入上一個月的年月份資料-->
    <a href="calendar.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>"><?=$prevMonth;?>月</a>
    
    <!--顯示當前月-->
    <span><?=$month;?>月</span>

    <!--建立下一個月的連結，並代入下一個月的年月份資料-->
    <a href="calendar.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>"><?=$nextMonth;?>月</a>

</div>
<div class='calendar'>
<div>日</div>
<div>一</div>
<div>二</div>
<div>三</div>
<div>四</div>
<div>五</div>
<div>六</div>
<?php
for($i=0;$i<count($days);$i++){

    //找出今天的字串，不帶零
    $today=date("Y-n-j");

    //將陣列中的日期字串拆成陣列,再取出其中的日期部份
    $d=($days[$i]!='&nbsp;')?explode('-',$days[$i])[2]:'&nbsp;';

    //判斷是否為今天
    if($today==$days[$i]){

        //判斷當日是否為特殊假日
        if(isset($holiday[$days[$i]])){

            //如果為假日則加上class today
            echo "<div class='today'> {$d}";
            echo "  <div>";
            echo $holiday[$days[$i]];
            echo "  </div>";
            echo "</div>";
        }else{

            //如果為非假日則一般顯示
            echo "<div class='today'> {$d} </div>";
        }

    //判斷當日是否為周末日
    }else if(date("w",strtotime($days[$i]))==0 || date("w",strtotime($days[$i]))==6){

        if(isset($holiday[$days[$i]])){
            echo "<div class='weekend'> {$d}";
            echo "  <div>";
            echo $holiday[$days[$i]];
            echo "  </div>";
            echo "</div>";
        }else{
            echo "<div class='weekend'> {$d} </div>";
        }
    }else{
        if(isset($holiday[$days[$i]])){
            echo "<div> {$d}";
            echo "  <div>";
            echo $holiday[$days[$i]];
            echo "  </div>";
            echo "</div>";
        }else{
            echo "<div> {$d} </div>";
        }
    }
}

?>    
</div>
<div>
    <a href="?year=<?=date("Y");?>&month=<?=date("n");?>">回當前月</a>
</div>