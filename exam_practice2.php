<?php
if(empty($_RESULTS['recordid'])){
    header('Location: exam_practice.php');
}
//



$host = "iyaserver.webdev.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_schedule";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql->connect_errno){
    echo "error:" . $mysql->connect_error;
    exit();
}

$sql = "SELECT * FROM dvd_titles WHERE titles != '' ORDER BY title";

$results = $mysql->query($sql);

if(!$results){
    echo "error:" . $mysql->connect_error;
}
//


INSERT INTO dvd_titles (title, rating_id, date)
VALUES ('movie1', 1, 2018)

UPDATE dvd_titles
SET
title = 'movie1',
rating_id = 1,
date = 2018
WHERE title_id = 10

DELETE FROM dvd_titles
WHERE title_id =10



    //results page
while($currentrow = $results->fetchassoc()){
    echo "<a href = 'exam_practice1.php?recordid'>". $currentrow["title_id"] ."Click</a>";
}
//
//details page
$sql = "SELECT * FROM dvd_titles WHERE title_id= " . $_REQUEST["$recordid"];
//





echo $results->num_rows;

<input type="radio" name="gender" value="female"> Dog
    <input type="radio" name="gender" value="male"> Cat

<select>
<option value="volvo">Volve</option>
etc.
<select>


//two quotes or one quote in REQUEST AND CURRENT ROW [    ]



?>