<?PHP
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
echo "Connected ";
 			$date_get = new DateTime('now');
			/////////////////////CURRENT TIME PRINT//////////////////////
			$check = $date_get->format("Y/m/d h:i:s");
			echo $check;
/////////////////////////////////////////////////// AND is_expired!=1 AND NOW()<=DATE_ADD(create_at,INTERVAL 5 MINUTES)
$current_id = mysqli_insert_id($conn);
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$otp_sub=$_POST["otp"];
			if(!empty($otp_sub)){ 
				$query = "SELECT * FROM otp_code WHERE otp='$otp_sub'";
				$result=mysqli_query($conn,$query);
									if ($result && mysqli_num_rows($result) > 0) {
										 $user_data = mysqli_fetch_assoc($result);
										 $otp_get= new DateTime($user_data['create_at']);
										 $otp_year = $otp_get->format("Y");
										 $otp_month = $otp_get->format("M");
										 $otp_secs = $otp_get->format("s");
										
								/////////////////// DAYS INTERVAL //////////////////////
										 $otp_day = $otp_get->format("d");
										 $now_day = $date_get->format("d");
										 	$day_interval=$now_day-$otp_day;
								/////////////////// HOURS INTERVAL //////////////////////	
										 $otp_hour = $otp_get->format("h");
										 $now_hour = $date_get->format("h");
										 	$hour_interval=$now_hour-$otp_hour;
								/////////////////// MINUTES INTERVAL //////////////////////	
										 $otp_min = $otp_get->format("i");
										 $now_min = $date_get->format("i");
											 $min_interval=$now_min-$otp_min;

								//////////////////////////////////CONDITION TIIIIIIME ///////////////////////////////////////////////////////			 
										 	if($user_data['is_expired']!=1){
										 		if($day_interval<1 && $hour_interval<1 && $min_interval<=5){
										 					$user_id=$user_data['user_id'];
										 					$result = mysqli_query($conn,"UPDATE otp_code SET is_expired=1 WHERE otp ='$otp_sub'");
															
															$result= mysqli_query($conn,"INSERT INTO log_event (user_id,Activity,date_time) VALUES('".$user_id."','Log In', '".date("Y-m-d H:i:s")."')");
															$result= mysqli_query($conn,"INSERT INTO log_switch (user_id,status) VALUES('".$user_id."','0')");
																$success = 2;

															header("Location: home.php");
														    die;
										 		}
										 		else{
														echo "<script>alert('OTP expired.')</script>";
												}

											}
											else{
											echo "<script>alert('OTP expired.')</script>";
											}
									}
									else{
										echo "<script>alert('Invalid OTP.')</script>";
									}
					
			}
	}
}
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Authentication</TITLE>
</HEAD>
<BODY background="bg1.png"> <center>
		
		<div style="width:300px;height: 200px; margin:100pt auto; background-color: transparent;box-shadow: 0 0 9px 9px rgba(0, 0, 0.2, 0.2); padding: 13px 50px; margin: 80px auto;">
		<h1> Authentication</h1>
		<form method="POST">
	
			<input  type="text" name="otp" class="text" style="width: 200" required  placeholder="insert OTP Code"> <br> <br>	

			<div class="form-group" >
			<input type="submit" class="btn btn-primary" name="submit_otp" value="submit" style="background-color:#084b8a; padding: 5px 10px;color: #e8e8e8; font-size: 11pt; font-weight: 700;">
		  </div>
		</form>
		
	</div>			
</BODY>
</HTML>