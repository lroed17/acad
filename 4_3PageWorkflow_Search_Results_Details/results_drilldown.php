<?php

if(empty($_REQUEST['genre'])) {
//  echo "Please go through search page. (or redirect)";
    header('Location: search_drilldown.php');
    //immediate push to search page instead of giving an error (location redirect)
    exit();
}

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
?>
<html>
<head>
    <title>Drill down: Movie results</title>
    <style>
        body {
            background-color: burlywood;
            margin: 0 200px;
            text-align: center;
        }

        #container {
            padding: 30px;
            margin-top: 100px;
            background-color: olive;
            width: 650px;
            text-align: left;
            color:white;
        }

        .label {
            float:left;
            clear:both;
            width: 120px;
        }
        .title {
            width: 500px;

            float:left;
        }

        .link {
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

    $sql = 		"SELECT * FROM movieView2 WHERE 1=1";
    $sql .= " AND title LIKE '%" .
        $_REQUEST['title'] . "%'";
    if($_REQUEST['rating'] != "ALL") {
        $sql .= " AND rating ='" . $_REQUEST["rating"] . "'";
    }
    if($_REQUEST['genre'] != "ALL") {
        $sql .=		" AND genre = '" . $_REQUEST["genre"] . "'";
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
        echo "<div class='title'><strong>" .
            "<a href='details_drilldown.php?recordid=" .
            //use this as a variable recordid= then current row in a string
            $currentrow["dvd_title_id"].
            "'>".
            $currentrow['title'] . "</a>".
            "</strong>".
            " (<em>Rated " . $currentrow['rating'] . "</em>) </div>" .
            "<div class='link''>" . "  " . "</div>"  .
            "<br style='clear:both;'>";

    }
    ?>

</div>

</body></html>