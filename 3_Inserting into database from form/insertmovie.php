<?php
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


echo "YOUR FORM:";
print_r($_REQUEST);

$sql = "
    INSERT INTO dvd_titles
    (title, release_date, label_id, sound_id, genre_id, rating_id, format_id)
    VALUES
    (
    '" . $_REQUEST["title"] . "',
    '" . $_REQUEST["release_date"] . "',
    " . $_REQUEST["label"] . ", 
    " . $_REQUEST["sound"] . ", 
   " . $_REQUEST["genre"] . ", 
    " . $_REQUEST["rating"] . ", 
    " . $_REQUEST["format"] . ")";

echo $sql;
echo "<hr><hr>";
//make sure if there are 7 fields, there are 7 values also
//also names should be in single quotes, but the id #s are not
//in php can use single and double quotes, but in SQL only single quotes

$results = $mysql->query($sql);
if(!$results){
    echo $mysql->error;
    exit();
} else{
    echo "I have added your movie ". $_REQUEST["title"];
}
?>