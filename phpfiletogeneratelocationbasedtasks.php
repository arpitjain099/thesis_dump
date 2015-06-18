<?php
header('Access-Control-Allow-Origin: *');
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

$emailid=$_POST['emailid'];
$lat=$_POST['lat'];
$longd=$_POST['longd'];
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
   $joe2 = $collection2->find();//tasks one

$search_string=',';
$regex = new MongoRegex("/,/i"); 
$where = array('gps_coordinate' => $regex);
$joe2 = $collection2->find($where);


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
$min=4200000000;
   foreach($diff as $d){
foreach($joe2 as $id=> $value)
  
    if($value['taskid']==$d)
   {
$lat=(double)explode(",",$value['gps_coordinate'])[0];
$longd=(double)explode(",",$value['gps_coordinate'])[1];
    $temp=distance($_POST['lat'],$_POST['longd'],$lat,$longd,'K');
  if($min>$temp)
    {
      $output=$value;
  $min=$temp;
}
   // $sts=$sts.json_encode($value);// $value;
 
   }
}
echo json_encode($output);


?>