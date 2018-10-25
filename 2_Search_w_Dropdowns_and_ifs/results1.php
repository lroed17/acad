<?php
print_r($_REQUEST);
echo "|" . $_REQUEST["genre"] . "|";

//BLOCK OF SERVOR CONNECTION CODE
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";

$mysql = new mysqli (
    $host,
    $userid,
    $userpw,
    $db
);

//now stop and make sure there are no errors

if($mysql->connect_errno){
//errno means error number and it will generate if it fails

    echo "DB ERROR" .
        $mysql->connect_error;
    exit("STOPPING PAGE");

//exit means stop the page
}
else { echo "GOOD DB... continuing";}

$sql = 		"SELECT * FROM movieView WHERE title LIKE '%" .
    $_REQUEST['title'] . "%'";
if($_REQUEST['rating'] != "ALL" ) {
    $sql .= " AND rating ='" . $_REQUEST["rating"] . "'";
}
if($_REQUEST['genre'] != "ALL" ) {
    $sql .=		" AND genre = '" . $_REQUEST["genre"] . "'";
}
$sql .=		" ORDER BY " . $_REQUEST['sortorder'];


$results = $mysql->query($sql);

// echo "<hr>SQL:" . $sql . "<hr>";

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}


echo "Your results returned " .
    $results->num_rows .
    " results.<hr>";


while($currentrow = $results->fetch_assoc()) {
    echo "<strong>" .
        $currentrow['title'] .
        "</strong> <em>(Rated " .
        $currentrow["rating"] .
        "), ".
        $currentrow["genre"] .
        "</em><br>";
}