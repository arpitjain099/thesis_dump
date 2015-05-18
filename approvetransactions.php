<?php
//$username=$_POST['username'];
echo exec('python approvetransactions.py '.$_POST['username']);

?>
