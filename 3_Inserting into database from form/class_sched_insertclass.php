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
//    echo "good connection" . "<br>";
//}


//echo "YOUR FORM:";
#print_r($_REQUEST);
if($_REQUEST["new_entry"] == ""){
    echo "ALERT. You did NOT come through the insert page properly!";
    echo " Go to the ". "<a href='classadd.php'>insert page</a>.";
    exit();
}

$sql = "
    INSERT INTO class_table " .
    "(class)" .
    " VALUES
    ('" . $_REQUEST["new_entry"] . "')";

//echo $sql;
echo "<hr><hr>";

$results = $mysql->query($sql);
if(!$results){
    echo $mysql->error;
    exit();
} else{
    echo "I have added class ". $_REQUEST["new_entry"];
}

//GIVE THE FORM AN EMPTY CHECK TO PROCEED
?>


