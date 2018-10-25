<?php

if(empty($_REQUEST['date'])) {
    header('Location: search_class_sched.php');
    exit();
}

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
?>

<html>
<head>
    <title>Class Schedule Results</title>
    <style>
        body {
            background-color: aliceblue;
            margin: 0 200px;
            text-align: center;
        }
        #container {
            padding: 30px;
            margin-top: 100px;
            background-color: cornflowerblue;
            width: 650px;
            text-align: left;
            color:white;
        }
        .header {
            width: 500px;
            float:left;
        }
        .linkpage {
            width: 100px;
            float:left;
            margin-left: 50px;

        }
    </style>
</head>
<body>
<div id="container">
    <h1> Search results<hr></h1>

    <?php

    $sql = 		"SELECT * FROM schedule_overview_new09_20 WHERE 1=1";
    $sql .= " AND date LIKE '%" .
        $_REQUEST['date'] . "%'";
    if($_REQUEST['type'] != "ALL") {
        $sql .= " AND type ='" . $_REQUEST["type"] . "'";
    }
    if($_REQUEST['classroom'] != "ALL") {
        $sql .=		" AND classroom = '" . $_REQUEST["classroom"] . "'";
    }
    if($_REQUEST['start_time'] != "ALL") {
        $sql .=		" AND start_time = '" . $_REQUEST["start_time"] . "'";
    }
    if($_REQUEST['end_time'] != "ALL") {
        $sql .=		" AND end_time = '" . $_REQUEST["end_time"] . "'";
    }
    if($_REQUEST['class_number'] != "ALL") {
        $sql .=		" AND class_number = '" . $_REQUEST["class_number"] . "'";
    }
    if($_REQUEST['class'] != "ALL") {
        $sql .=		" AND class = '" . $_REQUEST["class"] . "'";
    }
    $sql .= " ORDER BY ". $_REQUEST['orderby'];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    // echo "<em>You searched for Title: " . $_REQUEST['title'] . " and Rating: " . $_REQUEST['rating'] . " and Genre: " . $_REQUEST['genre'] . "</em>";
    // echo "<br><br>";
    // echo "<em>(SQL: " . $sql . "</em>)";
    // echo "<br><br>";
    echo "<em>Your results returned <strong>" .
        $results->num_rows .
        "</strong> results.</em>";
    echo "<br><br>";

    while($currentrow = $results->fetch_assoc()) {
        echo "<div class='header'><strong>" .
            "<a href='details_class_sched.php?classid=" .
            $currentrow["class_sched_id"].
            "'>".
            $currentrow['class'] . "</a>".
            "</strong>". "<br>" . " (<em>Start Time: " . $currentrow['start_time'] . "</em>)". "<br>" .
            " (<em>Date " . $currentrow['date'] . "</em>) </div>" .
            "<div class='linkpage''>" . "  " . "</div>"  .
            "<br style='clear:both;'>";

    }
    ?>

</div>

</body></html>