<?php

if(empty($_REQUEST['device_name'])) {
    echo "Please go through search page.";
    echo " <br>Redirect here: <a href='search.php'>search page</a>.";
    exit();
}
if(empty($_REQUEST['type'])) {
    echo "Please go through search page.";
    echo " <br>Redirect here: <a href='search.php'>search page</a>.";
    exit();
}
if(empty($_REQUEST['system'])) {
    echo "Please go through search page.";
    echo " <br>Redirect here: <a href='search.php'>search page</a>.";
    exit();
}
if(empty($_REQUEST['manufacturer'])) {
    echo "Please go through search page.";
    echo " <br>Redirect here: <a href='search.php'>search page</a>.";
    exit();
}

$host = "webdev.iyaserver.com";
$userid = "dent_guest";
$userpw = "Troj@n2018";
$db = "dent_exam";

$mysql = new mysqli (
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
<head lang="en">
    <meta charset="UTF-8">
    <title>Acad276 Fall 2017 Exam: Results</title>
    <style>
        .container {
            width:  600px;
            margin: auto;
        }
        h1 {
            margin: auto;
            text-align: center;
            background-color:   #900;
            color:  #FC0;
            height: 60px;
            line-height: 60px;
        }
        .num-results {
            margin: 20px 10px;
        }
        table {
            margin: auto;
            margin-bottom: 20px;
            width:  80%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #900;
            border-collapse: collapse;
            padding:    10px;
            text-align: center;
        }
        img {
            width: 100px;
        }
        .nav-link{
            margin: 10px 0px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Mobile Device Database: Search Results</h1>
    <div class="nav-link">
        <a href="search.php"><< Back to Search Page</a>
    </div>

    <?php


$sql = "
    SELECT * FROM devices, manufacturers, types, systems
    WHERE name LIKE '%" . $_REQUEST["device_name"] . "%' ";
    if($_REQUEST['type'] != "ALL") {
        $sql .= " AND type ='" . $_REQUEST["type"] . "'";
    }
    if($_REQUEST['system'] != "ALL") {
        $sql .=		" AND system = '" . $_REQUEST["system"] . "'";
    }
    if($_REQUEST['manufacturer'] != "ALL") {
        $sql .=		" AND manufacturer = '" . $_REQUEST["manufacturer"] . "'";
    }
    //echo $sql;


$results = $mysql->query($sql);


if(!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}
//else{
//    echo " query successful";
//}

echo "<div class='num-results'><em>Your search returned <strong>" . $results->num_rows .
    "</strong> results.</em></div>";
?>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Manufacturer</th>
            <th>System</th>
            <th>Type</th>
        </tr>
        <?php
        while($currentrow = mysqli_fetch_array($results)) {
        ?>
        <tr>
            <td><?php echo "<a href='details.php?recordid=" . $currentrow['device_id']."'>" . $currentrow['name'] . "</a>";?></td>
            <td><?php  echo $currentrow['price'];?></td>
            <td><?php  echo $currentrow['manufacturer'];?></td>
            <td><?php  echo $currentrow['system'];?></td>
            <td><?php  echo $currentrow['type'];?></td>
        </tr>
<?php
}
?>
    </table>

</body>
</html>