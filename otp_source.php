<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$otp= rand(100000,999999);
$date_time= date("Y-m-d H:i:s");
//$result= mysqli_query($conn,"INSERT INTO otp_code (otp,is_expired,create_at) VALUES('".."', 0 ,'""')");

$result = mysqli_query($conn,"UPDATE otp_code SET otp='$otp', is_expired =0, create_at= '$date_time' WHERE otp=0");
 echo "<script>alert('Please copy this code to proceed: $otp'); window.location = 'otp.php'</script>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentication Code</title>
</head>
	 
</html>