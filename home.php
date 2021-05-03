
<?php
   //include('session.php');
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$query = "SELECT * FROM log_switch WHERE status=0";
			$result = mysqli_query($conn,$query);
			$user_data = mysqli_fetch_assoc($result);
			$user_id= $user_data['user_id'];
			$result= mysqli_query($conn,"INSERT INTO log_event (user_id,Activity,date_time) VALUES('".$user_id."','Log out', '".date("Y-m-d H:i:s")."')");
			$result = mysqli_query($conn,"UPDATE log_switch SET status=1 WHERE status=0");
			

		
		 
			// Unset all of the session variables
			$_SESSION = array();
			 
			// Destroy the session.
			session_destroy();
			 
			// Redirect to login page
			header("location: login.php");
			exit;
		}
}
?>



<HTML>
<HEAD>
<TITLE>HOME</TITLE> 
<style type="text/css">
	.input1{
		background-color:rgba(172,16,16,0.8); padding: 5px 15px;color: #e8e8e8; font-size: 14pt; font-weight: bold;border-radius: 40px;
	}
	.input1:hover{
		font-size: 18pt;
		background-color: white;
		color: brown;
	}
	.input2{
		background-color:rgba(38,150,83,0.8); padding: 5px 15px;color: #e8e8e8; font-size: 14pt; font-weight: bold;border-radius: 40px; margin-right: 30px;
	}
	.input2:hover{
		font-size: 18pt;
		background-color: white;
		color: brown;
	}
</style>
</HEAD>
<BODY background="bg2.jpg">	
    <center style="font-size:15px"> <h1> Hey, Log in Success!</h1>
	<img src="source.gif">
		<form method="POST">
			<div class="form-group">
			<a href="eventlog.php"><input type="button" class="input2" name="submit" id="submit" value="Event Log"></a>
			<input type="submit" class="input1" name="submit" id="submit" value="Log Out">
		</div>
		</form>
	</center>
</BODY>
</HTML>