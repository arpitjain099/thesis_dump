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
   $collection = $db->users;
   $joe = $collection->findOne(array("emailid" => $_POST['emailid']));
   if($joe)echo "User already exists! Try logging in!";
   else{
   $collection->insert(array("password"=> "", "emailid"=>$_POST['email'],"name"=> $_POST['name'],"collegename" => "", "wallet"=>0,"level"=>0,"photo"=>$_POST['photo'],"phone"=>""));
   exec('python createdirfreelancer.py '.$_POST['emailid']);	
try{
      //sendmail($_POST['email'],$_POST['name']);
   //send_sms($_POST['phonenumber']);
   //echo "user inserted";
}




 catch (Exception $e) {
   echo "Exception caught";

}
   
   echo "User registered!";

   //create new directory for recruiter
  
	

   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>