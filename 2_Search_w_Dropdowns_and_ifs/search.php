<?php
//BLOCK OF SERVOR CONNECTION CODE
$host = "webdev.iyaserver.com";
$userid = "roed";
$userpw = "Iya2446607277";
$db = "roed_dvd";

$mysql = new mysqli (
$host,
$userid,
$userpw,
$db
);

//now stop and make sure there are no errors

if($mysql->connect_errno){
//errno means error number and it will generate if it fails

echo "DB ERROR" .
$mysql->connect_error;
exit("STOPPING PAGE");

//exit means stop the page
}
else { echo "GOOD DB... continuing";}
?>

<html>
<head>
    <title>Search films</title>
</head>
<body>
<form action="results1.php">
    Title:<input type="text" name="title"><br>
    Rating: <select name="rating">
        <option value="ALL">PLEASE SELECT RATING</option>
        <?php
        $sql = "SELECT * FROM ratings";
        $results = $mysql->query($sql);
        //if(!$results) {
        //    echo "SQL ERROR" . $mysql->error .
        //        "<hr>" . $sql . "<hr>";
        //} else {
        //    echo " DB SQL WAS GOOD. RESULTS";
        //}
        while($currentrow = $results->fetch_assoc()){
            echo "<option>" .
                $currentrow["rating"] .
                "</option>";
        }
        ?>
    </select>
    <br>
    Genre: <select name="genre">
        <option value=""ALL">PLEASE SELECT ONE</option>
        <?php

        $sql = "SELECT * FROM genres";
        //variable meaning select all from genres
        $results = $mysql->query($sql);
        //from all in genres have a query that pulls the results
        //if(!$results) {
        //    echo "SQL ERROR" . $mysql->error .
        //        "<hr>" . $sql . "<hr>";
        //} else {
        //    echo " DB SQL WAS GOOD. RESULTS";
        //}
        while($currentrow = $results->fetch_assoc()){
            echo "<option>" .
            $currentrow["genre"] .
            "</option>";
        }
        ?>

        <option>Sci-fi</option>
        <option>Comedy</option>
        <option>Action/Adventure</option>
    </select>
    <br>
    Sort order: <select name="sortorder">
        <option>title</option>
        <option>genre</option>
        <option>rating</option>
    </select>

    <input type="submit">
</form>

</body>
</html>