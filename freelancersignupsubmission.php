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
   $joe = $collection->findOne(array("emailid" => $_POST['emailid']));
   if($joe)echo "User already exists! Try logging in!";
   else{
   $collection->insert(array("password"=> $_POST['password'], "phone"=>$_POST['phonenumber'], "emailid"=>$_POST['emailid'],"name"=> $_POST['name'],"collegename" => $_POST['collegename'], "wallet"=>0,"level"=>0, "photo"=>"http://img2.wikia.nocookie.net/__cb20090709062312/starwars/images/d/d6/Human_NEGAS.jpg"));	


   

   //create new directory for recruiter
   
   try
   {
      echo exec('python createdirfreelancer.py '.$_POST['emailid']);}
   catch (Exception $e) {
   echo "Exception caught";

}
   try{
      sendmail($_POST['emailid'],$_POST['name'],",\n\n You have been registered on mCrowd - an initiative by IIT Kanpur! \n Hope you have a good experience!\n\n Regards\n mCrowd!","Registered on mCrowd!");
   send_sms($_POST['phonenumber'],"Hi ".$_POST['name'].". You have been registered on mCrowd! For any bugs, please report to mcrowdthesis@gmail.com!! Have a good stay!");
   //echo "user inserted";
}




 catch (Exception $e) {
   //echo "Exception caught";

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