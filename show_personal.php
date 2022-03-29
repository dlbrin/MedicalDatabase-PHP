<?php include 'includes/config.php' ?>
<?php
if($userid == false){
  header('Location: index.php');
}
if($superadmin == false){
  header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Doctor</title>
	</head>
	<body style="background-color: teal;">
		<div id="show"></div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				setInterval(function () {
					$('#show').load('reload.php')
				}, 1000);
			});
		</script>
	</body>
</html>