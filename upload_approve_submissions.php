<?php

$target_dir = "recruiterdir/".$_POST['username']."/evaluation/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if($ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION)=='csv')
    {echo '<script>console.log("file upload successful");</script>';}
    else echo "Please upload csv files only";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//echo $target_file;
// Check if file already exists

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
       echo exec('python processtasksheet_approvals.py '.$target_file.' '.$_POST['username']);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
}
?>