<?php

if(empty($_REQUEST['classid'])) {
    echo "Please go through <a href='class_sched_search'>search</a> page.";
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
    <title>Edit Class</title>
    <style>
        body {
            background-color: aliceblue;
            margin: 0 200px;
            text-align: center;
        }

        #container1 {
            padding: 30px;
            margin-top: 100px;
            background-color: cornflowerblue;
            width: 650px;
            text-align: left;
            color:white;
        }
    </style>
</head>
<body>
<div id="container1">
    <h1>Edit Class<hr></h1>

    <?php


    $sql = "SELECT * from schedule_overview_new09_20 WHERE class_sched_id = " .
        $_REQUEST['classid'];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }




    while($currentrow = $results->fetch_assoc()) {
        ?>
        <form action="class_sched_update.php">
            <input type="hidden" name="classid" value="<?php echo $currentrow['class_sched_id']?>"/>
            <em>Date:</em><strong><br>
                <input type="text" name="date" value="<?php echo $currentrow['date']; ?>"/>
            </strong>
            <br><br>

                <em>Class:</em><br>
                <select name="class">
                    <?php echo "<option value='" . $currentrow['class_id'] . "'>" .
                        $currentrow["class"] . "</option>";
                    ?>

                    <?php
                    $class_sql = "SELECT * FROM class_table";
                    $class_results = $mysql->query($class_sql);
                    if(!$class_results) {
                    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                    echo "SQL Error: " . $mysql->error . "<hr>";
                    exit();
                    }
                    ?>

                    <?php
                    while($classrow = $class_results->fetch_assoc()){
                        echo "<option value='" . $classrow['class_id'] . "'>" .
                            $classrow["class"] . "</option>";
                    }
                    ?>
                </select>
                <br><br>

                <em>Type:</em><br>
                <select name="type">
                    <?php
                    echo "<option value='" . $currentrow['type_id'] . "'>" .
                    $currentrow["type"] . "</option>";
                    ?>

                    <?php
                    $type_sql = "SELECT * FROM type_table";
                    $type_results = $mysql->query($type_sql);

                    if(!$type_results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }

                    while($typerow = $type_results->fetch_assoc()) {
                        echo "<option value='" . $typerow['type_id'] ."'>" . $typerow['type'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>

                <div class="label">Class Number:</div>    <select name="class_number">
                    <?php

                    $class_number_sql = "SELECT * FROM class_number_table";

                    $class_number_results = $mysql->query($class_number_sql);

                    if(!$class_number_results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }

                    echo "<option value='" . $currentrow['class_number_id'] . "'>" .
                        $currentrow["class_number"] . "</option>";

                    while($numberrow = $class_number_results->fetch_assoc()) {
                        echo "<option value='" . $numberrow['class_number_id'] ."'>" . $numberrow['class_number'] . "</option>";
                    }
                    ?>
                </select>

            <br><br>

                <div class="label">Classroom:</div>    <select name="classroom">
                    <?php

                    $classroom_sql = "SELECT * FROM classroom_table";

                    $classroom_results = $mysql->query($classroom_sql);

                    if(!$classroom_results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }

                    echo "<option value='" . $currentrow['classroom_id'] . "'>" .
                        $currentrow["classroom"] . "</option>";

                    while($classroomrow = $classroom_results->fetch_assoc()) {
                        echo "<option value='" . $classroomrow['classroom_id'] ."'>" . $classroomrow['classroom'] . "</option>";
                    }
                    ?>
                </select>

            <br><br>

                <div class="label">Start Time:</div> <select name="start_time">
                    <?php

                    $start_sql = "SELECT * FROM start_time_table";

                    $start_results = $mysql->query($start_sql);

                    if(!$start_results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }

                    echo "<option value='" . $currentrow['start_time_id'] . "'>" .
                        $currentrow["start_time"] . "</option>";

                    while($startrow = $start_results->fetch_assoc()) {
                        echo "<option value='" . $startrow['start_time_id'] ."'>" . $startrow['start_time'] . "</option>";
                    }
                    ?>

                </select>

            <br><br>

                <div class="label">End Time:</div>    <select name="end_time">
                    <?php

                    $end_sql = "SELECT * FROM end_time_table";

                    $end_results = $mysql->query($end_sql);

                    if(!$end_results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }

                    echo "<option value='" . $currentrow['end_time_id'] . "'>" .
                        $currentrow["end_time"] . "</option>";

                    while($endrow = $end_results->fetch_assoc()) {
                        echo "<option value='" . $endrow['end_time_id'] ."'>" . $endrow['end_time'] . "</option>";
                    }
                    ?>
                </select>
<br>
                <div style="text-align:center;"><input type="submit" value="Edit Class" style="background-color: blueviolet; color: white; border: 0"></div>
        </form>
        <?php
    } //end loop here
    ?>
</div>

</body></html>