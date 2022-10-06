<?php


$fileName = $_FILES["userfile"]["name"]; // The file name
$fileTmpLoc = $_FILES["userfile"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["userfile"]["type"]; // The type of file it is
$fileSize = $_FILES["userfile"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["userfile"]["error"]; // 0 for false... and 1 for true
echo $fileErrorMsg;
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")){
    echo "$fileName upload is complete";
} else {
    echo "move_uploaded_file function failed";
}
?>