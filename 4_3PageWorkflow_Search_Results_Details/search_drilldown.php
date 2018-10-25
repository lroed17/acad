<?php
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";

//include '../pdloginvariables.php';

$mysql = new mysqli (
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
    <title>Drill down: Search page</title>
</head>
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
        width: 300px;
        text-align: left;
        color:white;
    }

    .label {
        float:left;
        clear:both;
        width: 120px;
    }
</style>

<body>
<div id="container">
    <div style="text-align: center">Movie search</div>
    <hr>

    <form action="results_drilldown.php">
        <div class="label">Title:</div> <input type="text" name="title">
        <br style="clear:both;">

        <div class="label">Rating:</div> <select name="rating">
            <option value="ALL">Select a rating</option>
            <option value="ALL">---------------</option>
            <?php

            $sql = "SELECT * FROM ratings";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['rating'] . "</option>";
            }
            ?>


        </select>
        <br style="clear:both;">


        <div class="label">Genre:</div>    <select name="genre">
            <option value="ALL">Select a genre</option>
            <?php

            $sql = "SELECT * FROM genres ORDER BY genre";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['genre'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">Order results by:</div>
        <select name="orderby">
            <option>title</option>
            <option>rating</option>
            <option>genre</option>
        </select>
        <br style="clear:both;">
        <br style="clear:both;">
        <div style="text-align:center;"><input type="submit" value="Search movies" style="background-color: darkolivegreen; color: white; border: 0"></div>
</div>
</form>
</body>
</html>