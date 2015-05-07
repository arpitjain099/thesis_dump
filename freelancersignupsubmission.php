<?php
header('Access-Control-Allow-Origin: *');
include 'sendmailviagmail.php';
include 'way2sms.php';
//sendmail($_POST['email'],$_POST['name']);
//sendmail("arpitj@iitk.ac.in","arpit");


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
   if($joe)echo "User already exists! Try logging in!";
   else{
   $collection->insert(array("password"=> $_POST['password'], "phonenumber"=>$_POST['phonenumber'], "email"=>$_POST['email'],"name"=> $_POST['name'],"collegename" => $_POST['collegename'], "wallet"=>0,"level"=>0, "photo"=>"http://img2.wikia.nocookie.net/__cb20090709062312/starwars/images/d/d6/Human_NEGAS.jpg"));	


   

   //create new directory for recruiter
   if (!file_exists($_POST['email']))
   mkdir((string)$_POST['email'],0777);
   try{
      sendmail($_POST['email'],$_POST['name']);
   send_sms($_POST['phonenumber']);
   //echo "user inserted";
}




 catch (Exception $e) {
   echo "Exception caught";

}
   echo "User registered!";











































	



























   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>