<html>
<head>
    <style>
        .form{
            color: navy;
            text-align: center;
        }
        .width{
            width: 300px;
        }
        #box{
            background-color: whitesmoke;
            width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
<br>
<h2 class="form"><i>Contact Form</i></h2>
<br>
<hr>
<br>
<div id="box">
<form action = "contact_form_results.php" class = "form"><br>
    First Name: <input type="text" name="firstname" class="width"><br><br>
    Last Name: <input type="text" name="lastname" class="width"><br><br>
    Email: <input type="text" name="email" class="width"><br><br>
    Comment: <input type="text" name="comment" class="width"><br><br>
    <input type="submit"><br><br>
</form>
</div>

</body>
</html>