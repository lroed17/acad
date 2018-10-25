<?php
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
    <title>Search page</title>
</head>
<body>

<form action="insertmovie.php">
    Title: <input type="text" name="title">
    <br>
    Release Date: <input type="text" name="release_date"> (in 2016-09-09 format)
    <br>
    Award <input type="text" name="award">
    <br>

    Studio: <select name="label">
        <?php

        $sql = "SELECT * FROM labels";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['label_id'] . "'>" . $currentrow['label'] . "</option>";
        }
        ?>
    </select><br>

    Sound: <select name="sound">
        <?php

        $sql = "SELECT * FROM sounds";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['sound_id'] . "'>" . $currentrow['sound'] . "</option>";
        }
        ?>
    </select><br>

    Genre: <select name="genre">
        <?php

        $sql = "SELECT * FROM genres";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['genre_id'] . "'>" . $currentrow['genre'] . "</option>";
        }
        ?>
    </select><br>

    Rating: <select name="rating">
        <?php

        $sql = "SELECT * FROM ratings";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['rating_id'] . "'>" . $currentrow['rating'] . "</option>";
        }
        ?>
    </select><br>

    Format: <select name="format">
        <?php

        $sql = "SELECT * FROM formats";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL problem: " .
                $mysql->error ;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['format_id'] . "'>" . $currentrow['format'] . "</option>";
        }
        ?>
    </select><br>


    <input type="submit">
</form>
</body>
</html>