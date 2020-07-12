<?php
	$psw=$repsw="";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$psw=test_input($_POST["psw"]);
		$repsw=test_input($_POST["repsw"]);
	}
	function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
 	 $data = htmlspecialchars($data);
 	 return $data;
	}
	if ($psw!=$repsw) {
		echo "Re-check your confirmed password";
		exit();
	}
	$hpsw=password_hash($psw, PASSWORD_DEFAULT);
	$hpsw=substr($hpsw,0,60);
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE users SET password='$hpsw' WHERE email='".$_GET['key']."'";

if ($conn->query($sql) === TRUE) {
  echo "New password is updated successfully";
} else {
  echo "Error in updating password try again " . $conn->error;
}

$conn->close();
	?>