<html>
<head>
    <style>
        #outcome{
            text-align: center;
            color: white;
        }
        .image {
            width: 2%;
            height: auto;
            float: left;
        }
        .date{
            float:left;
            width: 25%;
            background-color: aliceblue;
        }
        .start_time{
            float: left;
            width: 15%;
            font-style: italic;
            text-align: center;
            background-color: azure;
        }
        .classroom {
            width: 10%;
            float: left;
            font-style: italic;
            background-color: azure;
            text-align: center;
        }
        .class {
            width: 35%;
            float: left;
            text-align: center;
            background-color: aliceblue;
        }
        .type {
            width: 12%;
            float: left;
            text-align: center;
            background-color: aliceblue;
        }
        body{
            background-color: midnightblue;
            padding: 1%;
        }
    </style>
</head>
<body>


<div id="outcome">

    <?php

    echo "<br>";
    echo "You searched the class " . "<strong>" . $_REQUEST["class"] ."</strong>". " in classroom " ."<strong>".$_REQUEST["classroom"] .  "</strong>";

    $db = "webdev.iyaserver.com";
    $userid = "roed";
    $userpw = "Iya2446607277";
    $db = "roed_schedule";

    $mysqli = new mysqli (
        $host,
        $userid,
        $userpw,
        $db
    );

    //if($mysqli->connect_errno){
     //    echo "db connection error " . $mysqli->connect_error;
     //    exit("STOPPING page");
     //} else {
    //    echo "Connection SUCCESSFUL";
    //}

    echo "<br>";
    echo "<br>";

    $sql = "
    SELECT *
    FROM schedule_overview
    WHERE class LIKE '%" . $_REQUEST["class"] . "%' " .
        " AND classroom LIKE '%" . $_REQUEST["classroom"] . "%'";

    //echo $sql;

    $results = $mysqli->query($sql);
    //here's the sequel statement I wrote and now what I'm calling from the db store that here

    //if(!$results){
    //echo "SQL error: " . $mysqli->error;
    //}
    //else {
    //  echo " query successful";
    //}

    echo "Your search returned " . $results->num_rows . " records:";
    echo "<br>";
    echo "<br>";
     //how do I put a pencil before each class and how do I make columns?
    //how to get rid of extra 0s

    ?>
</div>
<strong>
    <div class="image">____</div>
    <div class="date">Date of the Month:<hr></div>
    <div class="start_time">Start Time:<hr></div>
    <div class="classroom">Class Location:<hr></div>
    <div class="class">Class Name:<hr></div>
    <div class="type">Class Type:<hr></div></strong>
<br style="clear:both;">
<?php
while($currentrow = mysqli_fetch_array($results)) {
    ?>
    <?php  echo '<img class="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Pencil_icon_vector.svg/2000px-Pencil_icon_vector.svg.png">' ?>
    <div class="date">
        <?php  echo $currentrow['date'] . "<br>". "<br>". "<br>"; ?>
    </div>
    <div class="start_time">
        <?php echo $currentrow['start_time']. "<br>". "<br>". "<br>"; ?>
    </div>
    <div class="classroom">
        <?php echo $currentrow['classroom'] . "<br>". "<br>". "<br>"; ?>
    </div>
    <div class="class">
        <?php echo $currentrow['class'] . "<br>". "<br>". "<br>"; ?>
    </div>
    <div class="type">
        <?php echo $currentrow['type'] . "<br>". "<br>". "<br>"; ?>
    </div>
    <br style="clear:both;">
    <?php
}
?>

</body>
</html>