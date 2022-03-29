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
		<title>Document</title>
	</head>
	<body>
		<?php
			$num = sec($_GET['num']);
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$num'");
		while($row = mysqli_fetch_assoc($query)){?>
		<div class="view-doctor-header">
			<div class="view-doctor-header-img">
				<img src="assets/images/face.jpg" alt="">
			</div>
			<div class="view-doctor-header-info">
				<div>
					<h3><span>Full Name: </span><?php echo sec($row['name']);?></h3>
					<h3><span>Age: </span><?php echo sec($row['age']);?></h3>
				</div>
				<div>
					<h3><span>Date of Birth: </span><?php echo sec($row['age']);?></h3>
					<h3><span>Date: </span><?php echo sec($row['date']);?></h3>
				</div>
				<div>
					<h3><span>Mob: </span><?php echo sec($row['number']);?></h3>
					<h3><span>Address: </span><?php echo sec($row['address']);?></h3>
				</div>
			</div>
		</div>
		<div class="library-insert">
			<form action="modal/sick.inc.php" method="POST">
				<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
				<input type="text" name="library" placeholder="Enter Link">
				<button name="library_sub">Insert</button>
			</form>
			<a href="<?php echo sec($row['library']);?>" target="_blank">open</a>
		</div>
	<?php } ?>
	</body>
</html>