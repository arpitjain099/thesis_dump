<?php
header('Access-Control-Allow-Origin: *');
include 'sendmailviagmail.php';


//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->users;
   $joe = $collection->findOne(array("email" => $_POST['email']));
   if($joe)echo "user exists";
   else{
   $collection->insert(array("password"=> "", "email"=>$_POST['email'],"name"=> $_POST['name'],"collegename" => "", "wallet"=>0,"level"=>0,"photo"=>$_POST['photo']));	
try{
      sendmail($_POST['email'],$_POST['name']);
   //send_sms($_POST['phonenumber']);
   echo "user inserted";
}




 catch (Exception $e) {
   echo "Exception caught";

}
   
   

   //create new directory for recruiter
   mkdir((string)$_POST['email'],0777);
	echo "user inserted";

   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>