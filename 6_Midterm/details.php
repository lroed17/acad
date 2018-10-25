<?php
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

if(empty($_REQUEST['recordid'])) {
    echo "ALERT. You did NOT come through the search page correctly!";
    echo " Go to the ". "<a href='search.php'>search page</a>.";
    exit();
}

?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>A276 Fall 2017 Exam: Details</title>
    <style>
        .container {
            width:  800px;
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
        .details {
            border:     1px solid #990000;
            width:      600px;
            margin:     auto;
            margin-top: 20px;
            padding:    20px;
        }
        table {
            height: 300px;
            width:      100%;
        }
        table img {
            height: 300px;

        }
        img {
            width: 300px;

        }
        .label {
            text-align: right;
            width:      20%;
            padding:    3px 10px 3px;
        }
        .data {
            width: 40%;
        }
        .input>input, .input>select {
            width:  100%;
        }
        .nav-link{
            margin: 10px 0px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Mobile Device Database: Details Page</h1>
    <div class="nav-link">
        <a href="search.php"><< Back to Search Page</a>
    </div>
    <?php
    echo "Returning class details for " .
        $_REQUEST["recordid"];

    $sql = "SELECT * FROM devices, manufacturers, types, systems WHERE device_id=".
        $_REQUEST["recordid"];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    ?>
    <div class="details">
        <table>
            <tr>
                <td rowspan="5" class="img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLSc5M0hh5A5s91IIVx16V05mno_XhawYhSZB1_wmlSpZHfbw2" class="img">
                </td>
                <?php $currentrow = $results->fetch_assoc(); ?>
                <td class="label">Name:</td>
                <td class="data"><strong><em><?php  echo $currentrow['name'];?></em></strong></td>
            </tr>
            <tr>
                <td class="label">Price:</td>
                <td><strong><?php  echo $currentrow['price'];?></strong></td>
            </tr>
            <tr>
                <td class="label">Manufacturer:</td>
                <td><?php  echo $currentrow['manufacturer'];?></td>
            </tr>
            <tr>
                <td class="label">System:</td>
                <td><?php  echo $currentrow['system'];?></td>
            </tr>
            <tr>
                <td class="label">Type:</td>
                <td><?php  echo $currentrow['type'];?></td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>