<html>
<head>
    <style>
        #outcome{
            text-align: center;
        }
        .title{
            float:left;
            width: 40%;
            background-color: aliceblue;
        }
        .rating{
            float: left;
            width: 10%;
            font-style: italic;
            text-align: center;
            background-color: azure;
        }
        .genre {
            width: 15%;
            float: left;
            font-style: italic;
            background-color: azure;
            text-align: center;
        }
        .label {
            width: 15%;
            float: left;
            text-align: center;
            background-color: aliceblue;
        }
        .sound {
            width: 20%;
            float: left;
            text-align: center;
            background-color: aliceblue;
        }
        body{
        background-color: paleturquoise;
        }


    </style>
</head>
<body>

<div id="outcome">

    <?php

    echo "<br>";
    echo "You searched the movie " . "<strong>" . $_REQUEST["movietitle"] ."</strong>". " with the rating: " ."<strong>".$_REQUEST["rating"] .  "</strong>";

    $db = "webdev.iyaserver.com";
    $userid = "roed";
    $userpw = "Iya2446607277";
    $db = "roed_dvd";

    $mysqli = new mysqli (
        $host,
        $userid,
        $userpw,
        $db
    );

    //if($mysqli->connect_errno){
   //     echo "db connection error " . $mysqli->connect_error;
   //     exit("STOPPING page");
   // } else {
   //     echo "Connection SUCCESSFUL";
    //}

    //echo
        //$results->num_rows .
        //" search results";

    echo "<br>";
    echo "<br>";

    $sql = "
    SELECT *
    FROM overall_view_new
    WHERE title LIKE '%" . $_REQUEST["movietitle"] . "%' " .
    " AND rating LIKE '%" . $_REQUEST["rating"] . "%'";
 
    //echo $sql;

    $results = $mysqli->query($sql);
    //here's the sequel statement I wrote and now what I'm calling from the db store that here

    //if(!$results){
        //echo "SQL error: " . $mysqli->error;
    //}
    //else {
     //   echo " query successful";
    //}

    echo
        "Your search returned " .
        $results->num_rows .
        " records:";
    echo "<br>";
    echo "<br>";
    ?>
</div>
<strong><div class="title">Title:<hr></div>
<div class="genre">Genre:<hr></div>
<div class="label">Label:<hr></div>
<div class="rating">Rating:<hr></div>
<div class="sound">Sound:<hr></div></strong>
<br style="clear:both;">
    <?php
while($currentrow = mysqli_fetch_array($results)) {
    ?>
    <div class="title">
        <?php  echo $currentrow['title'] . "<br>". "<br>"; ?>
    </div>
    <div class="genre">
        <?php echo $currentrow['genre']. "<br>". "<br>"; ?>
    </div>
    <div class="label">
        <?php echo $currentrow['label'] . "<br>". "<br>"; ?>
    </div>
    <div class="rating">
        <?php echo $currentrow['rating'] . "<br>". "<br>"; ?>
    </div>
    <div class="sound">
        <?php echo $currentrow['sound'] . "<br>". "<br>"; ?>
    </div>
    <br style="clear:both;">
    <?php
}
?>


</body>
</html>