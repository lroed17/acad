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
        body{
            background-image: url("https://pbs.twimg.com/profile_images/836629578554748928/DHbaSYYv_400x400.jpg");
            background-image: 500px;
            background-repeat: repeat-y;
        }
    </style>
</head>
<body>
<br>
<h1 class="form"><i>Movie Search</i></h1>
<br>
<hr>
<br>
<div id="box">
    <form action = "movie_results.php" class = "form"><br>
        Movie Title: <input type="text" name="movietitle" class="width"><br><br>
        Rating: <input type="text" name="rating" class="width"><br><br>
        <input type="submit"><br><br>
    </form>
</div>

</body>
</html>