<?php
header('Access-Control-Allow-Origin: *');
include 'sendmailviagmail.php';
include 'way2sms.php';

//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->recruiter;
   $joe = $collection->findOne(array("username" => $_POST['username']));
   echo $joe['name'];
   if($joe){
      sendmail($joe['email'],$joe['name'],",\n\n Your password is ".$joe['password']." .\n\n Regards\n mCrowd!","mCrowd: Password recovery");
   }
   
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>