<?php
 header('Access-Control-Allow-Origin: *');
$m = new MongoClient();
   //echo "Connection to database successfully";
   //echo "<br>";
   // select a database

   $db = $m->phonegaptest;$dirname = "uploads/";
   //echo "Database thesisdb selected";
   $collection = $db->uploads;
   $emailid=$_POST['emailid'];$uri=$_POST['uri'];
   $uri=str_replace("content://com.android.providers.media.documents/document/","",$uri);
   $taskid=$_POST['taskid'];
   $date = new DateTime();
        //move_uploaded_file("uploads/".$uri, "freelancerdir/".$emailid."/uploads/".$uri);
if (copy("uploads/".$uri, "freelancerdir/".$emailid."/uploads/".$uri)) {

            $delete[] = "uploads/".$uri;
        }
        foreach ( $delete as $file ) {
        unlink( $file );
    }

exec('python moveuploadedphoto.py '.$_POST['emailid'].' '.$uri);
$collection->insert(array( "emailid"=>$emailid, "taskid"=>$taskid,"uri"=>$uri,"timestamp"=>$date->getTimestamp()));
$m2 = new MongoClient();
$db2=$m2->thesisdb;
$collection_thesis=$db2->completedtasks;
$uri=str_replace("%","%25",$uri);
$collection_thesis->insert(array( "emailid"=>$emailid, "taskid"=>$taskid,"response"=>"freelancerdir/".$emailid."/uploads/".$uri,"timestamp"=>$date->getTimestamp(),"username"=>$_POST['username']));

//	"filename"=>$dirname."/".$_FILES["file"]["name"]));	


 //rename ($dirname."/".$_FILES["file"]["name"], "newfile.ext");
?>
