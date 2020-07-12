<!DOCTYPE html>
<html>
<head>
	<title>Born purity/password_reset</title>
	<link rel="stylesheet" type="text/css" href="../css/password_reset_style.css">
	
</head>
<body>
	
<div id="update" class="modal">
	<h1>BORN PURITY</h1>
	<form method="post" action=""> 
		 <div id="update_password-part">
  	 	<section>
  	 		<h2  class="text-center">update password</h2>
  	 		<p class="text-center">Please fill all the fields in this form</p>
  	 	</section>
  	 </div> 
  	 <p>
		<label for="psw"><b>New Password:</b></label>
   		<input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" required>
   	</p>
   	<p>   		
     	<label for="repsw"><b>Confirm Password:</b></label>

    	<input type="password" placeholder="Re-enter Password" name="repsw" required>
    	</p>
     <button id="continue-btn" type="submit">continue</button>
    	
	</form>
	<span class="error">*</span>
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
</div>

</body>
</html>