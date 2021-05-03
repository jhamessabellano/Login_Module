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

        $email = ($_POST["email"]);
        $new_pass = ($_POST["password"]);

        if(!empty($email)) {
            //read the database
            $query = "select * from loginfo where email = '$email'";

            $result = mysqli_query($conn,$query);

                if ($result) {
                        if ($result && mysqli_num_rows($result) > 0) {
                    
                            $user_data = mysqli_fetch_assoc($result);

                                    if ($user_data['email'] === $email) {
                        
                                        $old_pass = $user_data['password'];

                                        $result= mysqli_query($conn,"INSERT INTO password_reset (email,previous_pass,new_pass,reset_date) VALUES('".$email."', '".$old_pass."','".$new_pass."' ,'".date("Y-m-d H:i:s")."')");

                                        $result = mysqli_query($conn,"UPDATE loginfo SET password = '$new_pass' WHERE email='$email'");
                                        
                                        echo "<script>alert('Password changed. You may now login.'); window.location = 'login.php'</script>";
                                            //die;
                                        }
                                    else {
                                        echo "<script>alert('Email not found.')</script>";
                                        }
                        }

                        else {
                            echo "<script>alert('Email not found.')</script>";
                        }
                }


            }
            
        }
    }
?>

<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Password Reset</TITLE>
<STYLE>
    .main{
        background-image:url('bg1.png') ; width:300px;margin:100pt auto;box-shadow: 0 0 9px 9px rgba(0, 0, 0.2, 0.2); padding: 13px 50px; margin: 80px auto; border-radius: 10px;
    }
</STYLE>
</HEAD>
<BODY bgcolor="grey"> <center>
		
		<div class="main">
		<h1> FORGOT PASSWORD </h1>
		<form method="post">
	
			<input  type="text" name="email" class="text" style="width: 200" required  placeholder="Enter your registered email to proceed."> <br> <br>
            <input type="password" name="password" class="form-control" style="width: 200" required  placeholder="Enter new password."><br> <br>

			<div class="form-group" >
			<input type="submit" class="btn btn-primary" value="Confirm" style="background-color:#084b8a; padding: 5px 10px;color: #e8e8e8; font-size: 11pt; width: 250px; font-weight: bold; border-radius: 3px;">
		  </div>
		</form>
		
	</div>			
</BODY>
</HTML>

