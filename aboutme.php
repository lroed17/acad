<html>
<head>
    <title>laura page</title>
</head>
<body>
    <h1>Laura's Page</h1>

    You are using

    <?php
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";

    echo mktime();
    echo "<br>";
    echo date("m/d/y");
    echo "<br>";

    $age = 50;
    $favcolor = "gray";
    $age = $age + 1;

    echo "My age is " . $age;
    echo "<br>";
    echo "I like the color " . $favcolor;
    ?>

<p>what was my again again?</p>
    <?php
    echo $age;
    ?>

<div>
    Labs:
</div>

<div>
    Assignments:
</div>
</body>
</html>