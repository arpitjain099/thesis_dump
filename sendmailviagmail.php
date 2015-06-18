<?php 
// do not forget to install pear for php before running this code!
header('Access-Control-Allow-Origin: *');
require_once "Mail.php";

function sendmail($toperson,$name, $body,$subject){

$from = 'mcrowdthesis@gmail.com';
$to = $toperson;
$body = "Hi ".($name).($body);

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'mcrowdthesis@gmail.com',
        'password' => 'iitkcserox'
    ));

$mail = $smtp->send($to, $headers, $body);


}

?>
