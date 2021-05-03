<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 <!-- jQuery library -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <!-- Popper JS -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	 <!-- Latest compiled JavaScript -->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body> <center>
	<div style="width: 200px">
						<img id="pic-box" style='width:170px; height:150px;  margin-top:7px; margin-left:5px; margin-right: 5px; background:none; border:thin solid black'>
					 <input type="file" accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" style="width: 180px;font-size: 10pt;" id="uploadfile" name="uploadfile" value=""/> 
					<label for="file" class="upload"> Upload New Image </label>
					 
					 </div>
					 <div>
						<label for="path">Image Path</label>
						<input type="text" name="picpath" id="picpath" style="width: 300px; height: 30px;">
					</div>
</center>
</body>
<script>
var loadFile = function(event) {
	var image = document.getElementById('pic-box');
	image.src = URL.createObjectURL(event.target.files[0]);
	document.getElementById('picpath').value=image.src;
};
</script>
</html>