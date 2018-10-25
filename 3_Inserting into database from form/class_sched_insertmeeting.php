<?php
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_schedule";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

//if($mysql->connect_errno) {
 //   echo "db connection error : " . $mysql->connect_error;
//    exit();
//} else{
//    echo"good connection";
//}
//echo "YOUR FORM:";

if($_REQUEST["newdate"] == ""){
    echo "ALERT. You did NOT come through the insert page correctly!";
    echo " Go to the ". "<a href='classadd.php'>insert page</a>.";
    exit();
}

$sql = "
    INSERT INTO class_sched " .
    "(class_id, date, class_number_id, type_id, end_time_id, start_time_id, classroom_id)" .
    "VALUES ('" . $_REQUEST["class"] . "',
    '" . $_REQUEST["newdate"] . "',
    '" . $_REQUEST["class_number"] . "', 
     '" . $_REQUEST["type"] . "', 
    '" . $_REQUEST["end_time"] . "', 
   '" . $_REQUEST["start_time"] . "', 
    '" . $_REQUEST["classroom"] . "')";

//echo $sql;
echo "<hr><hr>";

$results = $mysql->query($sql);
if(!$results){
    echo $mysql->error;
    exit();
} else{
    echo "I have added class meeting ". $_REQUEST["newdate"];
}



?>