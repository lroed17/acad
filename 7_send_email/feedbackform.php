<?php

if (empty($_REQUEST["submit"])){
//echo "WE NEED TO SHOW THE FORM";
?>


<html>
<head>
    <title>Site Feedback Form</title>
</head>
<style>
    body {
        background-color: steelblue;
    }
    #container {
        background-color: lightsteelblue;
        width: 400px;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
    }

    h1 {
        color: darksteelblue;
        margin-top: 0;
        font-style: italic;
        text-align: center;
    }
    h2 {
    //    text-align: center;
        color: white;
        font-weight: bold;
    }

    hr {
        border-color: steelblue;
    }
    input {
        width: 100%;
    }

    textarea {
        width: 100%;
        height: 90px;
    }
    input[type='submit'] {
        padding: 5px;
        border-radius: 5px;
        color: white;
        background-color: steelblue;
    }

    input[type='submit']:hover {
        background-color: rebeccapurple;
    }
</style>
<body>
<div id="container">

    <h1>Site Feedback Form</h1>

    <h2>Please fill out the form below
        to send an  email to our webmaster</h2>
    <hr/>
    <form action="" method="get">
        <input type="hidden" name="submit" value="y">
        Name:<br>
        <input type="text" name="username"/>
        <br/><br>
        Email:<br>
        <input type="text" name="useremail"/>
        <br/><br>
        Subject:<br>
        <input type="text" name="usersubject"/>
        <br/><br>
        Feedback:<br>
        <textarea name="userfeedback"></textarea>
        <br/><br>
        <input type="submit" value="Send Email"/>
    </form>
</div> <!-- close container -->
</body>
</html>

<?php
} //close IF block from TOP
    else {
        // I received a form. Time to email it.
print_r($_REQUEST);
//exit();
$to ="roed@usc.edu";
    $subject=$_REQUEST["usersubject"];
    $msg=$_REQUEST["userfeedback"];
    $header = "From:" . $_REQUEST["useremail"];

    $test = mail($to, $subject, $msg);

    echo "Your mail was sent? Answer: ". $test;
    }
    ?>