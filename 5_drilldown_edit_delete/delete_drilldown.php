<?php

//Check that we have been passed the recordid
if(empty($_REQUEST["recordid"]) ){
    echo "Error. No record id exists.";
    exit();
}
else{
    echo "About to delete a DVD record..." ."<br><br>";
}

if( $_REQUEST["confirm"] !="yes"){
    echo "Please confirm you want to delete." ."<br><br>";
    ?>

    <form action="">
        <input type="hidden" name="confirm" value="yes"/>
        <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"]?>"/>
        <label>Are you sure you want to delete?</label>
        <input type="submit" value="Yes, I want to delete"/>
    </form>

<?php
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

$sql = "DELETE FROM dvd_titles WHERE dvd_title_id=" . $_REQUEST["recordid"];

echo "<hr>" . $sql . "<hr>";

$results = $mysql->query($sql);

if(!$results) {
    echo "ERROR. Did NOT delete the movie. Something went wrong";
exit();
}

echo "Your movie was deleted.";

?>

<div>
        <a href="search_drilldown.php">Back to search</a>
</div>