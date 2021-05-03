<!DOCTYPE HTML>
<html>
   <head>
        <title> User Log In</title>
		<style>
		body {
  			background: linear-gradient(270deg,indigo,#9370db);
  			background-blend-mode: screen;
  			background-repeat: no-repeat;
			background-attachment: fixed;
		}
    h2{
            color: black;
            font-family: 'Just Another Hand', cursive;
          }
          .button1{
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 12pt;
                font-weight: bold;
                color: white;
                background-color: blue;
                border-radius: 5px;
              }
              .button1:hover{
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 12pt;
                font-weight: bold;
                color: blue;
                background-color: white;
                border-radius: 5px;
                border: 4px solid blue;
              }
              .button2{
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 12pt;
                font-weight: bold;
                color: white;
                background-color: indigo;
                border-radius: 5px;
              }
              .button2:hover{
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 12pt;
                font-weight: bold;
                color: indigo;
                background-color:white;
                border-radius: 5px;
                border: 4px solid indigo;
              }
              img{
                margin-right: 5px;
                margin-bottom: 0px;
              }
              .div{
                width:250px;
                height: 280px;
                margin:100pt auto; 
                background-color: transparent;
                box-shadow: 0 0 9px 9px rgba(0, 0, 0.2, 0.2); 
                padding: 13px 50px; 
                margin: 80px auto;
                border-radius: 20px;
              }
</style>
<body>

<div class="div">
    <form method="post" action="/action_page.php">
      <h2><img src="img/guest_icon1.png">Hello, Dear Customer!</h2>
      <center>
      <input  type="text" name="username" style="width: 200px; height: 20px;" required  placeholder="username"> <br> <br> 
      <input type="password" name="password" class="form-control" style="width: 200px;height: 20px;" required  placeholder="password"><br> <br>

      <div class="form-group" >
      <input type="submit" class="button1" value="Log In">
      <input type="submit" class="button2" value="Cancel" >
      </div>
    </center>
    </form>
    
  </div>


</body>

</html>
