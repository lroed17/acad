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

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
?>
<html>
<head>
    <title>Class Schedule: Search page</title>
</head>
<style>
    body {
        background-color: lightblue;
        margin: auto;
        text-align: center;
    }

    #form {
        padding: 50px;
        background-color: cornflowerblue;
        width: 400px;
        text-align: left;
        color:white;
        margin: auto;
        margin-top: 100px;
    }

    .label {
        float:left;
        clear:both;
        width: 120px;
    }
</style>

<body>
<div id="form">
    <div style="text-align: center">Class search</div>
    <hr>

    <form action="results_class_sched.php">
        <div class="label">Date:</div> <input type="text" name="date">
        <br style="clear:both;">

        <div class="label">Class Name:</div> <select name="class">
            <option value="ALL">Select a class</option>
            <option value="ALL">---------------</option>
            <?php

            $sql = "SELECT * FROM class_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['class'] . "</option>";
            }
            ?>


        </select>
        <br style="clear:both;">


        <div class="label">Type:</div>    <select name="type">
            <option value="ALL">Select a class type</option>
            <?php

            $sql = "SELECT * FROM type_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['type'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">Class Number:</div>    <select name="class_number">
            <option value="ALL">Select a class number</option>
            <?php

            $sql = "SELECT * FROM class_number_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['class_number'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">Classroom:</div>    <select name="classroom">
            <option value="ALL">Select a classroom</option>
            <?php

            $sql = "SELECT * FROM classroom_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['classroom'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">Start Time:</div>    <select name="start_time">
            <option value="ALL">Select a start time</option>
            <?php

            $sql = "SELECT * FROM start_time_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['start_time'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">End Time:</div>    <select name="end_time">
            <option value="ALL">Select an end time:</option>
            <?php

            $sql = "SELECT * FROM end_time_table";

            $results = $mysql->query($sql);

            if(!$results) {
                echo "SQL error: ". $mysql->error;
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<option>" . $currentrow['end_time'] . "</option>";
            }
            ?>
        </select>

        <br style="clear:both;">

        <div class="label">Order results by:</div>
        <select name="orderby">
            <option>class</option>
            <option>date</option>
            <option>classroom</option>
        </select>
        <br style="clear:both;">
        <br style="clear:both;">
        <div style="text-align:center;"><input type="submit" value="Search classes" style="background-color: blueviolet; color: white; border: 0"></div>
</div>
</form>
</body>
</html>