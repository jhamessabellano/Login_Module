<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{

		$result = mysqli_query($conn,"SELECT * FROM log_event");

		echo " <center>
		<h1 style='margin-top:50px;'>Log In Event</h1>
		<table border='1' style='width:700px;background-color:rgba(239,233,187,0.5);padding: 5px 5px;'>
		<tr>
		<th style='font-size:14pt;border:none;'>User ID</th>
		<th style='font-size:14pt;border:none;'>Activity</th>
		<th style='font-size:14pt;border:none;'>Date&Time</th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
		echo "<tr style='font-size:14pt;border:none;margin-bottom:5px;padding:5px 5px;text-align:center;'>";
		echo "<td style='border:none;margin-bottom:5px;padding:5px 5px;'>" . $row['user_id'] . "</td>";
		echo "<td style='border:none;margin-bottom:5px;padding:5px 5px;'>" . $row["Activity"] . "</td>";
		echo "<td style='border:none;margin-bottom:5px;padding:5px 5px;'>" . $row['date_time'] . "</td>";
		echo "</tr>";
		}
		echo "</table></center>";


		mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Event Log</title>
	<style type="text/css">
		input{
			margin-top: 50px;
			font-size: 16pt;
			background-color: white;
			border-radius: 40px;
			padding: 5px 10px;

		}
		input:hover{
			background-color: brown;
			color: white;
			font-size: 17pt;
		}
	</style>
</head>
<body  background='bg2.jpg'>
<center>
<a href="home.php"><input type="button" name="close" value="CLOSE"></a>
</center>
</body>
</html>