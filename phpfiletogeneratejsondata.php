<?php
header('Access-Control-Allow-Origin: *');

$emailid=$_POST['emailid'];
//echo $passworda;
//$device = $_GET['device'];
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->completedtasks;
   $collection2= $db->tasks;
   $joe = $collection->find(array("emailid" => $emailid));//completed tasks one
   //echo $json_encode($joe);
   //$joe2 = $collection2->find();//tasks one
$regex = new MongoRegex("/^$|^([a-z_\.\-])+\@(([a-z\-])+\.)+([a-z]{2,4})+(\s*,\s*([a-z_\.\-])+\@(([a-z\-])+\.)+([a-z]{2,4})+)*$/
/i"); 
$where = array('gps_coordinate' => $regex);
$joe2 = $collection2->find($where);//tasks one

   $tasks=array();
   $completedtasks=array();
   foreach ( $joe as $id => $value1 )
{

  array_push($completedtasks,$value1['taskid']);
}

 foreach ( $joe2 as $id => $value1 )
{
  array_push($tasks,$value1['taskid']);
}
//echo json_encode($tasks);
//echo json_encode($completedtasks);
$diff=array();
foreach($tasks as $a){
  
if (!in_array($a, $completedtasks)) {
  array_push($diff, $a);
}

}
//echo json_encode($diff);
$output=array();
  //$sts="[";
$timeval=0;
   $count=0;
   foreach($diff as $d){
foreach($joe2 as $id=> $value)
  
    if($value['taskid']==$d)
   {
   
    array_push($output,$value);break;
   // $sts=$sts.json_encode($value);// $value;
   }
}
echo json_encode($output);

/*

{ //echo $value1[taskid];
  foreach($joe2 as $id2=> $value2)
  if ($value2['taskid']==$value1['taskid'])
    break;
  else
    { #echo $value2;
      //$list[]=json_encode($value2);
      $sts=$sts.json_encode($value2);
      echo $sts;
      //echo json_encode($value2);echo ",";
  $count=$count+1;
  if($count>=10)break;
} 
}
*/
//echo "]";
   //echo $joe[0].taskid;
   
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";


?>