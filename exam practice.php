<?php

if(empty($_REQUEST['recordid'])){
header('Location: search.php');
exit();
}
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_schedule";

$sql =  new mysqli(
$host,
$userid,
$userpw,
$db);

if($mysql->connect_errno){
    echo "db connection error" . $mysql->connect_error;
    exit();
}

    ?>

<html>
<body>
<form action="page2">
    <div>Title:</div>
    <input type="radio" name="gender" value="class" checked> Class<br>
    <input type="radio" name="gender" value="classroom"> Classroom<br>
    <input type="radio" name="gender" value="class_number"> Class Number
<?php
$sql = "SELECT * FROM roed_schedule_view";

$results = $mysql->query($sql);

if(!$results){
    echo "results error" . $mysql->error;
    exit();
}

INSERT INTO dvd_titles (title, rating, genre_id, date)
VALUE ('movie1', 'R', 1, 2018)

UPDATE dvd_title
SET
title = "movie1",
rating = "R",
genre_id = 1,
date = "2018"
WHERE dvd_title_id = 5131

DELETE FROM dvd_titles
WHERE dvd_title_id = 14;

while($currentrow = $results->fetchassoc()){
echo "<a href='details_class_sched.php?classid=" . $currentrow[title_id];
}

$sql = "SELECT * FROM dvdtitles WHERE id =" $_REQUEST['class_id'];

echo $results->num_rows;

?>
</form>
</body>
</html>
