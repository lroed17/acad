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
    <title>Drill down: Edit Movie</title>
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
    <h1>Edit Movie<hr></h1>

    <?php


    $sql = "SELECT * from movieView2 WHERE dvd_title_id = " .
        $_REQUEST['recordid'];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    //Go get all the genres. This is a separate SQL query.
    //run a query so you can get all the dvd genres that are available to put into the dropdown
    $genre_sql = "SELECT * FROM genres";
    $genre_results = $mysql->query($genre_sql);
    if(!$genre_results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    while($currentrow = $results->fetch_assoc()) {
        ?>
        <form action="update_drilldown.php">
        <input type="hidden" name="recordid" value="<?php echo $currentrow['dvd_title_id']?>"/>
            <em>Title:</em><strong>
            <input type="text" name="title" value="<?php echo $currentrow['title']; ?>"/>
        </strong>
        <br>

        <em>Rating:</em>
        <?php echo $currentrow['rating']; ?>
        <br>

        <em>Genre:</em>

        <?php echo $currentrow['genre']; ?>
            <select name="genre">
                <?php echo "<option value='" . $currentrow['genre_id'] . "'>" .
                $currentrow["genre"] . "</option>";
                //this make it auto fill what the movie genre currently is
                ?>
                <?php
                while( $genrerow = $genre_results->fetch_assoc()){
                   echo "<option value='" . $genrerow['genre_id'] . "'>" .
                    $genrerow["genre"] . "</option>";
                }
                ?>
            </select>
        <br>

        <em>Studio:</em>
        <?php echo $currentrow['label']; ?>
        <br>
        <em>Format:</em>
        <?php echo $currentrow['format']; ?>
        <br>
        <em>Sound:</em>
        <?php echo $currentrow['sound']; ?>
        <br><br>
<input type="submit" value="Edit Movie"/>
        </form>
        <?php
    } // end loop
    ?>
</div>

</body></html>