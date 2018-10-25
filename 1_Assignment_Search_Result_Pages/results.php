<?php

echo "You asked for films with the genre " . $_REQUEST["genre"];
echo "<hr>";
//echo "Your form contained" . print_r($_REQUEST);

$db = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";
//include '../pdloginvariables.php';

$mysqli = new mysqli (
    $host,
    $userid,
    $userpw,
    $db
);

if($mysqli->connect_errno){
    echo "db connection error " . $mysqli->connect_error;
    exit("STOPPING page");
} else {
    echo "Connection SUCCESSFUL";
}

$sql = "
    SELECT *
    FROM movieView
    WHERE genre = '" . $_REQUEST["genre"] . "'";
echo $sql;

$results = $mysqli->query($sql);
//here's the sequel statement I wrote and now what I'm calling from the db store that here

if(!$results){
    echo "SQL error: " . $mysqli->error;
}
else {
    echo " query successful";
}
echo
    "Your search returned " .
    $results->num_rows .
//number of record and number of rows
    " records";

echo "<br>";
echo "<br>";
while($currentrow = $results->fetch_assoc()){
    echo "<strong>" . $currentrow["title"]. "</strong>" . "(Rated " .
        $currentrow["rating"] .
        ")<br>";
}
    //fetch one row or record at a time from the query and store it under currentrow
?>