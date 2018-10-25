<?php

//Check that we have been passed the recordid
if(empty($_REQUEST["recordid"]) ){
    echo "Error. No record id exists.";
    exit();
}
else{
    echo "About to update a DVD record..." ."<br><br>";
}

$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";


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

//Write SQL to update this record

$sql = "UPDATE dvd_titles SET " .
    "title ='" . $_REQUEST["title"] . "'," .
    " genre_id =" . $_REQUEST["genre"] .
    " WHERE dvd_title_id =".$_REQUEST["recordid"];
echo "<hr>" . $sql . "<hr>";

//submit the sql statement
$results = $mysql->query($sql);
if(!$results){
    echo "Could NOT save changes. Try again.";
    echo $mysql->error;
    exit();
}
echo "Changes saved!";
//Link back to search
?>


<div>
    <a href="search_drilldown.php">Back to search page.</a>
</div>