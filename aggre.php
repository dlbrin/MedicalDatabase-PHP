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
		<title>Agrre</title>
	</head>
	<body>
	    <div class="search-form">
	        <center><button id="btn" class="btn" style="width: 200px; margin: 0 30px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 20px;">back</button></center>
			<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="text" name="search" placeholder="Search for Name , SurgeryDate , Number , Types">
				<button>Search</button>
			</form>
		</div>
		<!--PHP Search -->
		<?php
		if(isset($_GET['search'])){
			$data = ($_GET['search']);
			$sql = mysqli_query($db , "SELECT * FROM `sick` WHERE `name` LIKE '%$data%' OR `surgery_date` LIKE '%$data%' OR `number` LIKE '%$data%' OR `types_of_transplant` LIKE '%$data%'");
		if(mysqli_num_rows($sql) > 0){ ?>
		<table class="table-naxosh" width="100%">
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Price</th>
				<th>Pre-Price</th>
				<th>Number</th>
				<th>types</th>
				<th>Note</th>
				<th>Profile</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<td><?php echo sec($row['name']); ?></td>
				<td><?php echo sec($row['surgery_date']); ?></td>
				<td><?php echo sec($row['price']); ?></td>
				<td><?php echo sec($row['pre_price']); ?></td>
				<td><?php echo sec($row['number']); ?></td>
				<td><?php echo sec($row['types_of_transplant']); ?></td>
					<td><?php echo sec($row['sick_note']); ?></td>
					<td style="background-color: green;"><a style="color: white;" href="profile.php?num=<?php echo sec($row['id']);?>">Profile</a></td>
			</tr>
			<?php } ?>
		</table>
		<?php
		}else{ ?>
		<center>
		<h4 style="font-weight: normal; direction: rtl; margin-top: 10px;">ببورە هیچ ناڤ ب ڤی ناڤی نینە...!</h4>
		<a href="dept.php"><i class="fas fa-arrow-left"></i>&nbspڤەگەرێ</a>
		<br>
		<img src="assets/img/empty-state.gif" style="width: 60%;">
		</center>
		<?php }
		die();
		}
		?>
		<!--PHP Search id -->
		<div class="search-form">
	        <center><button id="btn" class="btn" style="width: 200px; margin: 0 30px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 20px;">back</button></center>
			<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="text" name="searchid" placeholder="Search for Id">
				<button>Search</button>
			</form>
		</div>
		<!--PHP Search id-->
		<?php
		if(isset($_GET['searchid'])){
			$data = ($_GET['searchid']);
			$sql = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` LIKE '$data'");
		if(mysqli_num_rows($sql) > 0){ ?>
		<table class="table-naxosh" width="100%">
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Price</th>
				<th>Pre-Price</th>
				<th>Number</th>
				<th>types</th>
				<th>Note</th>
				<th>Profile</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<td><?php echo sec($row['name']); ?></td>
				<td><?php echo sec($row['surgery_date']); ?></td>
				<td><?php echo sec($row['price']); ?></td>
				<td><?php echo sec($row['pre_price']); ?></td>
				<td><?php echo sec($row['number']); ?></td>
				<td><?php echo sec($row['types_of_transplant']); ?></td>
					<td><?php echo sec($row['sick_note']); ?></td>
					<td style="background-color: green;"><a style="color: white;" href="profile.php?num=<?php echo sec($row['id']);?>">Profile</a></td>
			</tr>
			<?php } ?>
		</table>
		<?php
		}else{ ?>
		<center>
		<h4 style="font-weight: normal; direction: rtl; margin-top: 10px;">ببورە هیچ ناڤ ب ڤی ناڤی نینە...!</h4>
		<a href="dept.php"><i class="fas fa-arrow-left"></i>&nbspڤەگەرێ</a>
		<br>
		<img src="assets/img/empty-state.gif" style="width: 60%;">
		</center>
		<?php }
		die();
		}
		?>
		<table class="table-naxosh" width="100%">
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Price</th>
				<th>Pre-Price</th>
				<th>Number</th>
				<th>types</th>
				<th>Note</th>
				<th>Profile</th>
			</tr>
			<?php
				$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `answer` = 'Confirm' ORDER BY `surgery_date` DESC");
			while($row = mysqli_fetch_assoc($query)){?>
			<tr>
				<td><?php echo sec($row['name']); ?></td>
				<td><?php echo sec($row['surgery_date']); ?></td>
				<td><?php echo sec($row['price']); ?></td>
				<td width="10%"><?php echo sec($row['pre_price']); ?></td>
				<td><?php echo sec($row['number']); ?></td>
				<td><?php echo sec($row['types_of_transplant']); ?></td>
					<td><?php echo sec($row['sick_note']); ?></td>
					<td style="background-color: green;"><a style="color: white;" href="profile.php?num=<?php echo sec($row['id']);?>">Profile</a></td>
			</tr>
			<?php } ?>
		</table>
		<script type="text/javascript">
          const button = document.getElementById("btn");
  const goBack = () => {
    window.history.back();
  };
  button.addEventListener("click", (event) => {
    goBack();
  })
    </script>
	</body>
</html>