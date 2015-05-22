<?php
//$username=$_POST['username'];
header('Access-Control-Allow-Origin: *');

//echo $_POST['username'];
exec('python approvetransactions.py '.$_POST['username']);
echo "Please find the .csv file <a href='recruiterdir/".$_POST['username']."/evaluation/evaluation.csv' download>here</a>.";
?>
