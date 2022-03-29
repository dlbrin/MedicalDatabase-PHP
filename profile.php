<?php include 'includes/config.php' ?>
<?php
if($userid == false){
  header('Location: index.php');
}
if($edara == false){
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
		<title>Profile</title>
	</head>
	<body>
		<div class="all-card">
			<?php
			$num = sec($_GET['num']);
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$num'");
			while($row = mysqli_fetch_assoc($query)){?>
			<div class="card">
				<img src="assets/images/doctor.jpg" alt="">
				<h1>Surgery</h1>
				<br>
				<br>
				<div class="cart-button">
					<a href="view_doctor.php?num=<?php echo sec($row['id']);?>"><button>Edit</button></a>
					<a href="seen_view_doctor.php?num=<?php echo sec($row['id']);?>"><button>Seen</button></a>
				</div>
			</div>
			<div class="card">
				<img src="assets/images/images.jpg" alt="">
				<h1>Images</h1>
				<br>
				<br>
				<a href="view_images.php?num=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>
			<div class="card">
				<img src="assets/images/adminstration.jpg" alt="">
				<h1>Administration</h1>
				<br>
				<br>
				<a href="view_adminstration.php?num=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>
			<div class="card">
				<img src="assets/images/Laboratory.jpg" alt="">
				<h1>Laboratory</h1>
				<br>
				<br>
				<a href="library.php?num=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>
			<div class="card">
				<img src="assets/images/doctor-edit.jpg" alt="">
				<h1>Doctor</h1>
				<br>
				<br>
				<a href="edit_doctor.php?num=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>
			<div class="card">
				<img src="assets/images/receptionp.png" alt="">
				<h1>Reception</h1>
				<br>
				<br>
				<a href="view_reception.php?num=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>\
			<div class="card">
				<img src="assets/images/plazma-image.jpg" alt="">
				<h1>Plazma</h1>
				<br>
				<br>
				<a href="plazma.php?searchid=<?php echo sec($row['id']);?>"><button>View</button></a>
			</div>
			<?php } ?>
		</div>
	</body>
</html>