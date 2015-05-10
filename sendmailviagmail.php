<?php 
// do not forget to install pear for php before running this code!
header('Access-Control-Allow-Origin: *');
require_once "Mail.php";

function sendmail($toperson,$name){

$from = 'arpitjain099@gmail.com';
$to = $toperson;
$subject = 'Registered on mCrowd!';
$body = "Hi ".($name).",\n\n You have been registered on mCrowd - an initiative by IIT Kanpur! \n Hope you have a good experience!\n\n Regards\n mCrowd!";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'arpitjain099@gmail.com',
        'password' => 'password'
    ));

$mail = $smtp->send($to, $headers, $body);


}

?>
