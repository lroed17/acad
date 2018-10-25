<?php

//Check that we have been passed the recordid
if(empty($_REQUEST["classid"]) ){
    echo "Error. No record id exists.";
    exit();
}
else{
    echo "About to update a class record..." ."<br><br>";
}

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

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

//SQL to update class record

$sql = "UPDATE class_sched SET " .
    "date ='" . $_REQUEST["date"] . "'," .
    "class_id =" . $_REQUEST["class"] . "," .
    "type_id =" . $_REQUEST["type"] . "," .
    "class_number_id =" . $_REQUEST["class_number"] . "," .
    "classroom_id =" . $_REQUEST["classroom"] . "," .
    "start_time_id =" . $_REQUEST["start_time"] . "," .
    "end_time_id =" . $_REQUEST["end_time"] .
    " WHERE class_sched_id =".$_REQUEST["classid"];
echo "<hr>" . $sql . "<hr>";

//submit the sql statement
$finalresults = $mysql->query($sql);
if(!$finalresults){
    echo "Could NOT save changes. Try again.";
    echo $mysql->error;
    exit();
}
echo "Changes saved!";
?>


<div>
    <a href="class_sched_search.php">Back to search page.</a>
</div>