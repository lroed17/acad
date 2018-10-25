<?php
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";

//include '../pdloginvariables.php';

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



echo "Returning movie details for " .
    $_REQUEST["recordid"];

$sql = "SELECT * from movieView2 WHERE dvd_title_id=".
    $_REQUEST["recordid"];

$results = $mysql->query($sql);

$currentrow = $results->fetch_assoc();
echo "<h1>Title: ".
    $currentrow["title"] .
"</h1>";
echo "is Rated " . $currentrow["rating"].
" and is of the genre <strong>" .
$currentrow["genre"] . "</strong>";


?>

<hr>

