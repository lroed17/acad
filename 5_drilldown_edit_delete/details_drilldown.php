<?php

if(empty($_REQUEST['recordid'])) {
    echo "Please go through <a href='search_drilldown.php'>search</a> page.";
    exit();
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
?>
<html>
<head>
    <title>Drill down: Movie Details</title>
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
    <h1> Movie Details<hr></h1>

    <?php


    $sql = "SELECT * from movieView2 WHERE dvd_title_id = " .
        $_REQUEST['recordid'];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }


    while($currentrow = $results->fetch_assoc()) {
        ?>
        <em>Title:</em><strong>
            <?php echo $currentrow['title']; ?>
        </strong>
        <br>
        <em>Rating:</em>
        <?php echo $currentrow['rating']; ?>
        <br>
        <em>Genre:</em>
        <?php echo $currentrow['genre']; ?>
        <br>
        <em>Studio:</em>
        <?php echo $currentrow['label']; ?>
        <br>
        <em>Format:</em>
        <?php echo $currentrow['format']; ?>
        <br>
        <em>Sound:</em>
        <?php echo $currentrow['sound']; ?>
        <br>
        <?php
    } // end loop
    ?>
</div>

</body></html>