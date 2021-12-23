<?php
// Include the qrlib file 
include 'phpqrcode/qrlib.php'; 

// Get form data
$passport = $_FILES["passport"]["tmp_name"]; 
$passportname = $_FILES["passport"]["name"];
$name = $_POST['empname'];
$empid = $_POST['EmpId'];
$position = $_POST['position'];
$valid = $_POST['valid'];
$gender = $_POST['gender'];


move_uploaded_file($passport, __DIR__."/images/".basename($_FILES["passport"]["name"]));

$text = "https://codestar.co.ke/verify.php?".$empid;  

// $path variable store the location where to 
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = 'images/'; 
$file = $path.uniqid().".png"; 

// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 5; 

// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size); 
 
?> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="container">
		<div id="idcard" style="width:25%; height:480px; border-radius:10px; border-color:blue; border-style:solid; padding:0px;">
			<div id="heder" style="width:100%; background-color:blue; margin:0px; text-align:center; color:white;">
				<h1 style="margin:0px">STAFF ID CARD</h1>
			</div>
			<div id="pic" style="width:40%; float:left;">
				<img src="images/<?php echo $passportname; ?>" width="180px" height="180px" />
			</div>
			<div id="bio" style="width:50%; float:right;">
				<h3 margin="0">STAFF NAME : <br> <?php echo $name; ?></h3>
				<h3 margin="0">POSITION : <br> <?php echo $position; ?></h3>
				<h3 margin="0">GENDER : <br> <?php echo $gender; ?></h3>
			</div>
			<div id="valid" style="width:100%; clear:both">
				<h2 style="background-color:blue; text-align:center; color:white;">VALID UNTIL : <?php echo $valid; ?> </h2>
			</div>
			<div id="logo"style="width:45%; height:200px; float:left;">
				<img src="images/favicon.PNG" width="150px" height="150px" />
			</div>
			<div id="qr" style="float:left; height:200px; width:45%;">
				<?php echo "<center><img src='".$file."'></center>"; ?>
			</div>
		</div>
	</div>
</body>
</html>
