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


if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

if(empty($_REQUEST['classid'])) {
    echo "ALERT. You did NOT come through the search page correctly!";
    echo " Go to the ". "<a href='class_sched_search.php'>search page</a>.";
    exit();
}

echo "Returning class details for " .
    $_REQUEST["classid"];

$sql = "SELECT * from schedule_overview_new09_20 WHERE class_sched_id=".
    $_REQUEST["classid"];

$results = $mysql->query($sql);

$currentrow = $results->fetch_assoc();
echo "<br><br>Class: ". "<br><h1>".
    $currentrow["class"] .
    "</h1>";
echo "Class Number: " . $currentrow["class_number"] . "<br>".
    "Class Type " . $currentrow["type"]. "<br>".
    "Start Time: " . $currentrow["start_time"] . "<br>".
    "End Time: " . $currentrow["end_time"] . "<br>".
    "Date: " . $currentrow["date"] . "<br>".
    "Classroom: " . $currentrow["classroom"] . "<br>";
?>

<hr>