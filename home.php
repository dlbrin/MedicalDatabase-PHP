<?php include 'includes/config.php' ?>
<?php
if($userid == false){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Home</title>
	</head>
	<body>
		<?php
		$query = mysqli_query($db , "SELECT * FROM `admin` WHERE `id` = '$userid'");
		while($row = mysqli_fetch_assoc($query)){
		$_SESSION['role'] = sec($row['role']);
		$role = $_SESSION['role']; ?>
		<center>
		<div class="home-info">
		    <div class="home-info-img">
				<center><img src="assets/images/<?php echo sec($row['img']);?>" alt=""></center>
				<h1><span>Name: </span><?php echo sec($row['name']);?></h1>
				<h1><span>Role: </span><?php echo sec($row['role']);?></h1>
			</div>
			<div class="home-info-img">
				<center><img src="assets/images/all-doctor1.png" alt=""></center>
				<a href="index.php?logout" style="font-size:30px; color:red;">Logout</a>
			</div>
		</div>
		</center>
		<div class="home-card">
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'edara' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="new_reception.php">
					<?php } ?>
					<i class="fab fa-wpforms"></i>
					<h1>Reception</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'edara' OR $role == 'reception' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="show_personal.php">
					<?php } ?>
					<i class="fas fa-user-md"></i>
					<h1>Doctor</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'reception' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="show_edara_card.php">
					<?php } ?>
					<i class="fas fa-users-cog"></i>
					<h1>Adminstration</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'reception' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="aggre.php">
					<?php } ?>
					<i class="far fa-handshake"></i>
					<h1>Confirm</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="disaggre.php">
					<?php } ?>
					<i class="fas fa-user-times"></i>
					<h1>Reject</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="replay.php">
					<?php } ?>
					<i class="fas fa-chalkboard-teacher"></i>
					<h1>Pending</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'reception' OR $role == 'edara' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="view_plazma.php">
					<?php } ?>
					<i class="fas fa-syringe"></i>
					<h1>PRP + Meso</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'reception' OR $role == 'edara' OR $role == 'plazma'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="koga.php">
					<?php } ?>
					<i class="fas fa-store"></i>
					<h1>Store</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'reception' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="new_cost.php">
					<?php } ?>
					<i class="fas fa-file-invoice-dollar"></i>
					<h1>Cost</h1>
				</a>
			</div>
			<div class="home-cards">
				<?php
				if($role == 'plazma' OR $role == 'edara' OR $role == 'reception' OR $role == 'ahmed'){?>
				<a href="#"></a>
				<?php }else{?>
				<a href="dashboard.php">
					<?php } ?>
					<i class="fas fa-chart-line"></i>
					<h1>Dashboard</h1>
				</a>
			</div>
		</div>
		<?php } ?>
	</body>
</html>