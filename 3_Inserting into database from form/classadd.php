 <?php
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
        <title>Inserting Records</title>
    </head>
    <style>
        .form{
            color: navy;
            text-align: center;
        }
    </style>
<body>
<br>
<br>
<h1 class="form">Insert a new Class:</h1>
<form class="form" action="class_sched_insertclass.php">
    <br>
    <br>
    New Class Name: <input type="text" name="new_entry"><br><br>
    <input type="submit">
    <br>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
</form>
<h1 class="form">Insert a Class Meeting Date:</h1>
<form class="form" action="class_sched_insertmeeting.php">
    <br>
    <br>
    Class: <select name="class">
        <?php
        $sql = "SELECT * FROM class_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['class_id'] . "'>" . $currentrow['class'] . "</option>";
        }
        ?>
    </select><br><br>
    Class Meeting Date: <input type="text" name="newdate" value="yyyy-mm-dd"> (in YYYY-MM-DD format)
    <br>
    <br>
    Start Time: <select name="start_time">
        <?php
        $sql = "SELECT * FROM start_time_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['start_time_id'] . "'>" . $currentrow['start_time'] . "</option>";
        }
        ?>
    </select><br><br>
    End Time: <select name="end_time">
        <?php
        $sql = "SELECT * FROM end_time_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['end_time_id'] . "'>" . $currentrow['end_time'] . "</option>";
        }
        ?>
    </select><br><br>
    Type: <select name="type">
        <?php
        $sql = "SELECT * FROM type_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['type_id'] . "'>" . $currentrow['type'] . "</option>";
        }
        ?>
    </select><br><br>

    Classroom: <select name="classroom">
        <?php

        $sql = "SELECT * FROM classroom_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['classroom_id'] . "'>" . $currentrow['classroom'] . "</option>";
        }
        ?>
    </select><br><br>

    Class Number: <select name="class_number">
        <?php

        $sql = "SELECT * FROM class_number_table";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['class_number_id'] . "'>" . $currentrow['class_number'] . "</option>";
        }
        ?>
    </select><br><br>
    <input type="submit">
</form>
</body>
</html>