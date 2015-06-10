<?php
//header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
$emailid = $_POST['emailid'];

//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->users;
   $joe = $collection->findOne(array("emailid" => $emailid));
   //var_dump($joe);
     
     
   
       $return = array(
           '_id'=>$joe['_id'],
           'name'=>$joe['name'],
           'phone'=>$joe['phone'],
           'emailid'=>$joe['emailid'],
          'photo'=>$joe['photo'],
           'wallet'=>$joe['wallet'],
           'level'=>$joe['level'],
                    );
      //echo $joe['emailid'];
   //echo json_encode($return);




   if($joe) echo json_encode($return);
   else{
   echo "user not found!";

   }
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>