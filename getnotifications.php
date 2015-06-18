<?php
//header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
//echo $_POST['emailid'];
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->notifications;
   //$joe = $collection->findOne(array("email" => $_POST['email']));
   //if($joe)echo "user exists";
   //else{
   //array("emailid" => $_POST['emailid'])
//array("emailid" => "arpitjain099@gmail.com")
   //echo $collection;
   $joe = $collection->find(array("emailid" => $_POST['emailid']));  
    $i=0;
 $return =array();
   foreach($joe as $item){
       $return[$i] = array(
           '_id'=>$item['_id'],
           'timestamp'=>$item['timestamp'],
           'notif'=>$item['notif'],
           'emailid'=>$item['emailid'],
          
                    );
       $i++;
   }




   if($joe)echo json_encode($return);
   else{
   echo "user not found!";

   }

   //}
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>