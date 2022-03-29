<?php include 'includes/config.php' ?>
<?php
if($userid == false){
	header('Location: index.php');
}
if($plazma == false){
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
		<title>PRP</title>
	</head>
	<body>
	    <div class="all-card" style="height: 100vh;">
	        <div class="card">
				<img src="assets/images/edit-plz.jpg" alt="">
				<h1>Edit</h1>
				<br>
				<br>
				<a href="plazma.php"><button>Edit</button></a>
			</div>
			<div class="card">
				<img src="assets/images/view-plz.jpg" alt="">
				<h1>View</h1>
				<br>
				<br>
				<a href="see_plazma.php"><button>View</button></a>
			</div>
	   </div>
	</body>
	</html>