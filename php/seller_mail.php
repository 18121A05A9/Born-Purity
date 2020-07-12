<?php
$email=$fname=$mob=$address=$state=$pin=$city="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname=test_input($_POST["fname"]);
	$email=test_input($_POST["gmail"]);
	$mob=test_input($_POST["mob"]);
	$address=test_input($_POST["subject"]);
	$city=test_input($_POST['city']);
	$state=test_input($_POST['state']);
	$pin=test_input($_POST['pin']);
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$formcontent="From:$fname \n mail:$email \n Mobile Number:$mob \n state:$state \n city:$city \n pincode:$pin \n Address:$address";
$recipient="thecreatormahi98@gmail.com";
$subject="seller form";
$mail_sent=@mail($recipient, $subject, $formcontent);
echo $mail_sent ? "Thank you for providing your details our team contact you soon" : "failed to send";
?>