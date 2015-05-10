<?php
header('Access-Control-Allow-Origin: *');
//questions: questions, username: username,imgurl:imgurl,img1url:img1url,img2url:img2url,heading:heading,mp3url:mp3url,textcontent:textcontent,summary:summary,tasksymbol:tasksymbol
$questions = $_POST['questions'];
$username = $_POST['username'];
$imgurl = $_POST['imgurl'];
$img1url = $_POST['img1url'];
$img2url = $_POST['img2url'];
$heading = $_POST['heading'];
$mp3url = $_POST['mp3url'];
$textcontent = $_POST['textcontent'];
$summary = $_POST['summary'];
$tasksymbol = $_POST['tasksymbol'];
$time = $_POST['time'];
$m = new MongoClient();
 $db = $m->thesisdb;
 $collection = $db->tasks;
 $collection2=$db->recruiter;
 $aa=$collection2->findOne(array('username'=>$_POST['username'][0]));
 //echo $_COOKIE['username'];
 //var_dump(iterator_to_array($aa, true));
 $local=  $aa["count"];//->username;
 //$local=$local+1;
 $collection2->update(array("username"=>($_POST['username'][0])), array('$set'=>array("count"=>$local+count($questions))));

//{ "_id" : ObjectId("554e50a99904fd2ba5967ef5"), "username" : "arpitjain099", "dateofadding" : "1431195817", "textcontent" : "", "img2" : "", "img1" : "", "mp3url" : "", "imgurl" : "http://cdn+AC0-www.i+AC0-am+AC0-bored.com/media/thumbnails/apple+AF8-for+AC0-diabetics+AFs-1+AF0-.jpg", "question" : "yolo", "summary" : "", "tasksymbol" : 1, "taskid" : "arpitjain099_4", "heading" : "" }

for ($x = 0; $x < count($questions); $x++) {
   // echo "The number is: $x <br>";

$collection->insert(array("username"=>$username[$x], 
	"dateofadding"=> time(), 
	"textcontent"=>$textcontent[$x],
	"img2"=>$img2url[$x],
	"img1"=>$img1url[$x],
	"mp3url"=>$mp3url[$x],
	"imgurl"=> $imgurl[$x], 
	"textcontent"=>$textcontent[$x],
	"question"=>$questions[$x],
	"summary"=>$summary[$x],
	"tasksymbol"=>$tasksymbol[$x],
	"taskid"=>$username[0].'_'.(string)($local+$x+1),
	"time"=>$time[$x]	
));	

} 
echo "Data succesfully entered.<br>";
?>