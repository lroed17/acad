<?php
$to = "roed@usc.edu";
$subject = "Testing messages again";
$msg = "Email message to me...
more text...
more";
$header = "From: Steve Jobs <jobs@apple.com>";


$test = mail(
    $to,
    $subject,
    $msg,
    $header
);

echo "Your email success code is " . $test;