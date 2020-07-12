<?php
$email=$fname=$mob=$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname=test_input($_POST["fname"]);
	$email=test_input($_POST["gmail"]);
	$mob=test_input($_POST["mob"]);
	$message=test_input($_POST["message"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$formcontent="From:$fname \n mail:$email \n Mobile Number:$mob \n Message:$message";
$recipient="thecreatormahi98@gmail.com";
$subject="contact form";
$mail_sent=@mail($recipient, $subject, $formcontent);
echo $mail_sent ? "Thank you" : "Mail failed";
?>