<?php
// Include config file
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

    $user_name = "";
    $password = "";
    $email = "";
    $conf_password = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['create'] )) {
    //////Declaration
    $user_name = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = ($_POST["email"]);
    $conf_password = ($_POST["confirm_password"]);

        
    // Validate username
    if(empty($username) && empty($password) && empty($email) && empty($conf_password)) {
        echo "Please fill up forms.";
    }
    else{
        // Prepare a select statement
        $query = "SELECT * from loginfo";

            $result = mysqli_query($conn,$query);

            $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['username'] === $user_name) {
                        echo "<script>alert('Username is already taken.')</script>";  
                    }

                    else {
                        if($password === $conf_password){

                           if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                    if(strlen($password) < 8){
                                        echo "<script>alert('Password must have atleast 8 characters.')</script>";        
                                     }
                                    else if(!preg_match("/(?=.*?[#?!@$%^&*-])/",$_POST['password'])){
                                        echo "<script>alert('Password must contain atleast 1 special characters.')</script>"; 
                                    }
                                    else if(!preg_match("/(?=.*?[0-9])/",$_POST['password'])){
                                        echo "<script>alert('Password must contain atleast 1 number.')</script>";       }
                                    else if(!preg_match("/(?=.*?[a-z])/",$_POST['password'])){
                                        echo "<script>alert('Password must contain atleast 1 lowercase letter.')</script>";
                                    }
                                    else if(!preg_match("/(?=.*?[A-Z])/",$_POST['password'])){
                                        echo "<script>alert('Password must contain atleast 1 uppercase letter.')</script>"; 
                                    }
                                    else{
                                        $query = "INSERT INTO loginfo (username,password,email) VALUES ('$user_name','$password','$email')";
                                        mysqli_query($conn,$query);
                                        header("Location: login.php");
                                        die;
                                    }
                            }
                            else{
                                echo "<script>alert('Invalid email.')</script>";
                             }
                        }
                        else {
                                    echo("<script>alert('Password did not match.')</script>");
                        } 
                    }
                        
    }
    }
    
}
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<style type="text/css">
    label{font-family: Palatino Linotype; font-size: 11pt; position: "center";padding: all; font-weight: 700;}
    h1{font-family: Engravers MT; font-size: 40;}
    input{font-family: Palatino Linotype; font-size: 10pt; position: "right"}
    
</style>
<body background="bg1.png">
    <div style="width:300px;margin:100pt auto; background-color: transparent;box-shadow: 0 0 9px 9px rgba(0, 0, 0.2, 0.2); padding: 15px 40px; margin: 80px auto;">
        <center>
        <h1>Sign Up</h1>
        <p style="color: white; font-size: 11pt;font-family: Calibri;">Please fill this form to create an account.</p>
        <form action="register.php" method="post">
            
            <div class="form-group">
                <input type="text" name="username" class="form-control"style="width:250px;" required  placeholder="username">
                <span class="help-block"></span> <br>
            </div>    

            <div class="form-group">
                 <input type="text" name="email" class="form-control" style="width:250px" required  placeholder="email">
                <span class="help-block"></span><br>
            </div>

            <div class="form-group">
                 <input type="password" name="password" class="form-control"style="width:250px" required  placeholder="pasword">
                <span class="help-block"></span>   <br>
            </div>

            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" style="width:250px"  required  placeholder="confirm password" >
                <span class="help-block"></span> <br>
            </div>

      <br>
            <center>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="create" value="Submit" style="background-color:#084b8a; padding: 5px 10px;color: #e8e8e8; font-size: 11pt; font-weight: 700;">
                <input type="reset" class="btn btn-default" value="Clear" style="background-color:#04db33; padding: 5px 12px;font-size: 11pt; font-weight: 700">
            </div>
             
            <p><i style="font-size: 11pt">Already have an account? </i><a href="login.php">Login here</a>. </p>
            </center>
        </form>
    </div>
        </div>
        </center>
     
</body>
</html>


