<?php
//BLOCK OF SERVOR CONNECTION CODE
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
?>

<html>
<head>
    <title>Search Class Schedule</title>
    <style>
        .form{
            color: darkred;
            text-align: center;
            padding-top: 8%;
            font-size: 14pt;
            font-family: futura;
        }
        body {
            background-color: palegoldenrod;
        }
    </style>
</head>
<body>
<h1 class="form">Class Schedule Search</h1>
<form class="form" action="sched_email_results.php">
    Class Name: <select name="class">
        <option value="ALL">Select a Class</option>
        <?php
        $sql = "SELECT * FROM class_table";
        $results = $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<option>" .
                $currentrow["class"] .
                "</option>";
        }
        ?></select><br><br>
    Class Type: <select name="type">
        <option value="ALL">Select a Type</option>
        <?php
        $sql = "SELECT * FROM type_table";
        $results = $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<option>" .
                $currentrow["type"] .
                "</option>";
        }
        ?>
    </select><br><br>
    Class Location: <select name="classroom">
        <option value="ALL">Select a Room</option>
        <?php
        $sql = "SELECT * FROM classroom_table";
        $results = $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<option>" .
                $currentrow["classroom"] .
                "</option>";
        }
        ?>
    </select><br><br>
    Class meetings <i>after</i> date (please use yyyy-mm-dd format): <br><input type="text" name="afterdate" value="yyyy-mm-dd"><br><br>
    Sort By: <select name="sortorder">
        <option value="type">type</option>
        <option value="classroom">classroom</option>
        <option value="date">date</option>
    </select><br><br>
    Email:<br>
    <input type="text" name="useremail"/>
    <br/><br>
    <input type="submit">

</form>
