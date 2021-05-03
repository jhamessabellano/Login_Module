<?php
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
echo "Connected successfully";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $user_name = ($_POST["username"]);
        $password = trim($_POST["password"]);

        if(!empty($username) && !empty($password)) {
            //read the database
            $query = "select * from loginfo where username = '$user_name'";

            $result = mysqli_query($conn,$query);

            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
            
                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['username'] === $user_name) {
            
                        if ($user_data['password'] === $password) {
                                $user_id= $user_data['ID'];
                                $result= mysqli_query($conn,"INSERT INTO otp_code (user_id) VALUES('".$user_id."')");

                                $_SESSION['ID'] = $user_data['ID'];
                                header("Location: otp_source.php");

                            die;
                        }
                        else {
                            echo "<script>alert('Invalid Password')</script>";
                            }
                    }

                    else {
                        echo "<script>alert('Invalid Username')</script>";
                    }
                }


            }
            
        }
        }
    }
?>

<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Log in Module</TITLE>
<STYLE>
    .main{
        background-image:url('bg1.png') ; width:300px;margin:100pt auto;box-shadow: 0 0 9px 9px rgba(0, 0, 0.2, 0.2); padding: 13px 50px; margin: 80px auto; border-radius: 10px;
    }
</STYLE>
</HEAD>
<BODY bgcolor="grey"> <center>
		
		<div class="main">
		<h1> LOG IN</h1>
		<form method="post">
	
			<input  type="text" name="username" class="text" style="width: 200" required  placeholder="username"> <br> <br>	
			<input type="password" name="password" class="form-control" style="width: 200" required  placeholder="password"><br> <br>

			<div class="form-group" >
			<input type="submit" class="btn btn-primary" value="Log In" style="background-color:#084b8a; padding: 5px 10px;color: #e8e8e8; font-size: 11pt; width: 250px; font-weight: bold; border-radius: 3px;">
		  </div>
          <p style="font-size: 10pt;"> <a href="forgot_pass.php" style=" color: white;">Forgot Password?</a></p>
		<p style="font-size: 10pt">Don't have an account? <a href="register.php"> Create an account.</a></p>
		</form>
		
	</div>			
</BODY>
</HTML>

