<?php
$fname=$uname=$psw=$repsw="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$fname=test_input($_POST["fname"]);
	$uname=test_input($_POST["uname"]);
	$psw=test_input($_POST["psw"]);
	$repsw=test_input($_POST["repsw"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
if ($psw!=$repsw) {
	# code...
	echo "password mismatch";
	exit();
}
if (!filter_var($uname, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
  exit();
}
$hpsw=password_hash($psw,PASSWORD_DEFAULT);
$hpsw= substr( $hpsw, 0, 60 );
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
$sql = "SELECT * FROM users WHERE email='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "User is already registered,please login";
}else{
$sql = "INSERT INTO users (fullName,email,password)
VALUES ('$fname','$uname','$hpsw')";

if ($conn->query($sql) === TRUE) {
  echo "Registration succefull";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
