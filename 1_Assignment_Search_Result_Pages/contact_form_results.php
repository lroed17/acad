<html>
<head>
    <style>
        #outcome{
            text-align: center;
        }
    </style>
</head>
<body>


<div id="outcome">

<?php

echo "<br>";
echo "Thank you, " . "<strong>" . $_REQUEST["firstname"] . " " .$_REQUEST["lastname"] .  "</strong>" . " (" . $_REQUEST["email"] . ") for contacting us!";
echo "<br>";
echo "<br>";
echo "<i>" . "Your message: " . "</i>" . "<br>" . $_REQUEST["comment"] . "<br>" . "<i>" . " has been sent to our customer service agents who will be happy to help you. :)". "</i>";

?>
</div>

</body>
</html>