<?php
$uname=$psw="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$uname=test_input($_POST["uname"]);
	$psw=$_POST["psw"];
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdetails";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   if(password_verify($psw, $row['password'])){
   	echo "Login SuccessFull";
   }else{
   	echo "Invalid Login credentials";
   }
}
} else {
  echo "No user is registered with this userName,to register please go to signup section";
}
$conn->close();
?>