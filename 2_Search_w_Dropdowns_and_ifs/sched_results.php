<?php
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_schedule";

$mysql = new mysqli (
    $host,
    $userid,
    $userpw,
    $db
);

echo "You asked for the class " . "<strong>" . $_REQUEST["class"] ."</strong>" . " with class type " .
"<strong>" .$_REQUEST["type"] . "</strong>" . " in room " ."<strong>"  . $_REQUEST["classroom"] . "</strong>". " on the date "
   ."<strong>" . $_REQUEST["date"] . "</strong>". ". The results are sorted by " ."<strong>" . $_REQUEST["sortorder"] . "</strong>". ".";
echo "<hr>";

$sql = 	"SELECT * FROM schedule_overview WHERE date LIKE '%" .
    $_REQUEST['date'] . "%'";
if($_REQUEST['class'] != "ALL" ) {
    $sql .= " AND class ='" . $_REQUEST["class"] . "'";
}
if($_REQUEST['type'] != "ALL" ) {
    $sql .= " AND type ='" . $_REQUEST["type"] . "'";
}
if($_REQUEST['classroom'] != "ALL" ) {
    $sql .=		" AND classroom = '" . $_REQUEST["classroom"] . "'";
}
if($_REQUEST['afterdate'] != " " ) {
   $sql .=		" AND date >= '" . $_REQUEST["afterdate"] . "'";
}
//if($_REQUEST['sortorder'] = "ALL" ) {
  //  $sql .=		" AND sortorder = '" . $_REQUEST["sortorder"] . "'";
//}
$sql .=		" ORDER BY " . $_REQUEST['sortorder'];


$results = $mysql->query($sql);

//echo "<hr>SQL:" . $sql . "<hr>";

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}


echo "Your results returned " .
    $results->num_rows .
    " results.<hr>";


while($currentrow = $results->fetch_assoc()) {
    echo "<strong>" .
        $currentrow['class'] .
        "</strong> <em>(Type: " .
        $currentrow["type"] .
        "), ".
        $currentrow["classroom"] . "<br>". $currentrow["date"].
        "</em><br><br>";  } ?>
