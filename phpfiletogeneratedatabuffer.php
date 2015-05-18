<?php
header('Access-Control-Allow-Origin: *');

$emailid="arpitjain099@gmail.com";
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
   $joe = $collection->find(array("emailid" => $emailid));
   //echo $json_encode($joe);
   $joe2 = $collection2->find();
   echo "[";
   $count=0;
   foreach ( $joe as $id => $value1 )
{	//echo $value1[taskid];
	foreach($joe2 as $id2=> $value2)
  if ($value2['taskid']!=$value1['taskid'])
    {
      $list[]=json_encode($value2);
      //echo json_encode($value2);echo ",";
  $count=$count+1;
  if($count>=10)break;
}
    //echo "$id: ";
		    //echo json_encode($value2);

    //var_dump( $value2 );

}
for($i=0;$i<count($list)-1;$i++)
{
  echo $list[$i];
  echo ",";
}
echo $list[count($list)-1];
echo "]";
   //echo $joe[0].taskid;
   
   //echo "Collection selected succsessfully";
   //$joe = $collection->findOne(array("username" => $_POST['username'],"password"=> $_POST['password']));
   //if(!$joe)echo "wrong credentials";
   //
   //else echo "user found";
//echo $result+"";

?>