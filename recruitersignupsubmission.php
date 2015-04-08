<?php
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
   mkdir((string)$_POST['username'],0777);
	echo "user inserted";

   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>