<?php include 'includes/config.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Login</title>
	</head>
	<body style="background: #f1f1f1;">
		<div class="container">
			<center>
			<div class="details">
				<img src="assets/images/arina.png">
				<form method="POST" action="modal/login.inc.php">
					<input type="email" name="email" placeholder="Enter Email">
					<br>
					<input type="password" name="password" placeholder="Enter Password">
					<br>
					<input type="submit" name="submit" value="Login">
				</form>
			</div>
			</center>
		</div>
		<script language=JavaScript>
		<!--
		var message="Function Disabled!";
		///////////////////////////////////
		function clickIE4(){
		if (event.button==2){
		alert(message);
		return false;
		}
		}
		function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
		if (e.which==2||e.which==3){
		alert(message);
		return false;
		}
		}
		}
		if (document.layers){
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown=clickNS4;
		}
		else if (document.all&&!document.getElementById){
		document.onmousedown=clickIE4;
		}
		document.oncontextmenu=new Function("return false")
		// ->
		</script>
	</body>
</html>