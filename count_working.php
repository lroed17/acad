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
    <title>Movie counts</title>
    <style>
        body {
            background-color: burlywood;
            margin: 0 20px;
            text-align: center;
        }

        #container {
            padding: 30px;
            background-color: olive;
            text-align: left;
            color:white;
        }

        .label {
            float:left;
            clear:both;
            width: 70px;
            font-style: italic;
        }
        .box {
            float:left;  text-align:right;
            height: 20px; width: 200px; margin: 5px;
        }
        .bar {
            background-color: red; min-width: 30px;
        }

    </style>
</head>
<body>
<div id="container">
    <h1>Movie totals<hr></h1>

    <?php
    $sql1 = "SELECT COUNT(*) AS recordcount
        FROM movieView";
    //single count of everything

    $sql2 = "SELECT COUNT(*) AS recordcount, genre
        FROM movieView
        GROUP BY genre";
    //count of groups of genre
    //can add WHERE statement (so only looking at R rated films e.g.)

    $results1 = $mysql->query($sql1);
    $results2 = $mysql->query($sql2);

    print_r($results2);

    $currentrow1 = $results1->fetch_assoc();

    echo "Total number of movies: " .
        $currentrow1["recordcount"] . "<br><br>";

    echo "Total number of movies by genre:<br>";
    //shows genre AND shows of the 20 genres how many movies are in each
    while($currentrow = $results2->fetch_assoc()){
        echo $currentrow["genre"] . " : " . $currentrow["recordcount"] . "<br>";
    }

    echo "<br><br>Totals visualized...<br><br>";


    $results2->data_seek(0);
    while($currentrow = $results2->fetch_assoc()){
    ?>
    <div class='box'>
        <?php echo $currentrow["genre"]; ?>
    </div>
    <div class='box bar' style='width:
<?php echo $currentrow["recordcount"] ?>px'>&nbsp; </div>
        <?php echo $currentrow["recordcount"] ?><br style='clear:both'>
    <?php } ?>
</body></html>