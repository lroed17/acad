<html>
<head>
    <style>
        .form{
            color: darkred;
            text-align: center;
        }
        .width{
            width: 300px;
        }
        #box{
            background-color: whitesmoke;
            width: 700px;
            margin: auto;
            border-style: solid;
        }
    </style>
</head>
<body>
<br>
<h1 class="form"><i>Class Schedule Search Fall 2018</i></h1>
<br>
<hr>
<br>
<div id="box">
    <form action = "class_sched_results.php" class = "form"><br>
        Class Name: <input type="text" name="class" class="width"><br><br>
        Classroom: <input type="text" name="classroom" class="width"><br><br>
        <input type="submit"><br><br>
    </form>
</div>

</body>
</html>
