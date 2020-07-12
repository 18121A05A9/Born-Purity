<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$email=$_POST['gmail'];
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $pass=password_hash($row['password'], PASSWORD_DEFAULT);
   $name=$row['fullName'];
}
 $link="<a href='localhost/water-website/php/password_reset.php?key=".$email."&reset=".$pass."' target='_blank'>Click To Reset password</a>";
$formcontent="Hi $name \n $link <br> If you are not requested to reset password then leave it <br> For any queries contact us:<br> our email: naveen515501@gmail.com";
$recipient=$email;
$subject="Reset password";
$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
$mail_sent=@mail($recipient, $subject, $formcontent,$headers);
echo $mail_sent ? "ckeck your email and click on password reset link" : "failed try again";

}else{
	echo "NO user is registered with this email id.<br>
	please provide valid email";
}
$conn->close();
?>