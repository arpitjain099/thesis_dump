<?php
header('Access-Control-Allow-Origin: *');

//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->completedtasks;
   //$joe = $collection->findOne(array("email" => $_POST['email']));
   //if($joe)echo "user exists";
   //else{
    $date = new DateTime();
   $collection->insert(array("time" =>$_POST['time'], "taskid" =>$_POST['taskid'], "response"=>$_POST['response'],"emailid"=> $_POST['emailid'],"timestamp"=>$date->getTimestamp()));	


   //}
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>