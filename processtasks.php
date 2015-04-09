<?php
header('Access-Control-Allow-Origin: *');
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database
   $db = $m->thesisdb;
   //echo "Database thesisdb selected";
   $collection = $db->tasks;
   $joe = $collection->find();
   //echo $joe["taskid"];
   echo "<br>";
   foreach($m as $joe){
   	echo $m['taskid'];
   }

?>