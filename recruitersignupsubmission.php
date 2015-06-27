<?php
header('Access-Control-Allow-Origin: *');
include 'sendmailviagmail.php';
include 'way2sms.php';
$username = $_POST['username'];
$passworda = $_POST['password'];

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
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
   if($joe)echo "user exists";
   else{
   $collection->insert(array("username" => $_POST['username'],"password"=> $_POST['password'],"name" => $_POST['name'],"phone"=> $_POST['phone'],"email" => $_POST['email'],"address"=> $_POST['address'],"count"=>0));	
   //create new directory for recruiter
   exec('python createdir.py '.$_POST['username']);
   //mkdir('recruiterdir/'.(string)$_POST['username'],777);
   //mkdir('recruiterdir/'.(string)$_POST['username'].'/uploads',777);
	echo "user inserted";
try{
      sendmail($_POST['email'],$_POST['name'],",\n\n You have been registered on mCrowd - an initiative by IIT Kanpur! \n Hope you have a good experience!\n\n Regards\n mCrowd!","Registered on mCrowd!");
   send_sms($_POST['phone'],"Hi ".$_POST['name'].". You have been registered on mCrowd! For any bugs, please report to mcrowdthesis@gmail.com!! Have a good stay!");
   //echo "user inserted";
}




 catch (Exception $e) {
   //echo "Exception caught";

}
   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>