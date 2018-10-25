<?php
print_r($_FILES);
echo "<hr>";

echo "Original name of file" .
    $_FILES["myfile"]["name"] .
    "<br>" .
    "TMP file location" .
    $_FILES["myfile"]["tmp_name"];

move_uploaded_file(
    $_FILES["myfile"]["tmp_name"],
    $_SERVER["CONTEXT_DOCUMENT_ROOT"] .
    "/uploads/" .
    $_FILES["myfile"]["name"]
);

echo "NEW FILE: " .
    $_SERVER["CONTEXT_DOCUMENT_ROOT"] .
    "/uploads/" .
    $_FILES["myfile"]["name"];
?>