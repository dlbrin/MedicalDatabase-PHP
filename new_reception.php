<?php include 'includes/config.php' ?>
<?php
if($userid == false){
	header('Location: index.php');
}
if($reception == false){
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
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Reception</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<div class="sarake-image">
			<img  src="assets/images/logo.png" alt="">
			<div class="sarake-new">
				<h1><a href="reception.php" style="color: white;"><i class="fas fa-plus"></i> New</a></h1>
			</div>
		</div>
		<table class="table-sarake" >
			<tr>
				<th>#</th>
				<th>Name</th>
				<th >Date</th>
				<th>Address</th>
				<th>Number</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			$date = date("Y-m-d");
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `date` = '$date'");
			while($row = mysqli_fetch_assoc($query)){?>
			<tr>
				<td><?php echo sec($row['id']);?></td>
				<td><?php echo sec($row['name']);?></td>
				<td><?php echo sec($row['date']);?> : (<?php echo sec($row['times']);?>)</td>
				<td><?php echo sec($row['address']);?></td>
				<td><?php echo sec($row['number']);?></td>
				<td><button data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'];?>">Edit</button></td>
				<td><button type="delete_reception"><a style="color: black; text-decoration: none;" href="modal/sick.inc.php?delete_reception=<?php echo $row['id'];?>">Delete </a></button></td>
			</tr>
		<?php } ?>
		</table>
		<!-- MODAL EDIT -->
		<?php
		$query = mysqli_query($db , "SELECT * FROM `sick`");
		while($row = mysqli_fetch_assoc($query)){?>
		<div class="modal fade" id="edit<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
						<form method="POST" action="modal/sick.inc.php">
							<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
							<img src="assets/images/face.png" style="width: 150px;">
							<br>
							<br>
							<label style="direction: rtl;">Name: </label> <br><input type="text" name="name_edit" value="<?php echo sec($row['name']);?>">
							<br>
							<br>
							<label style="direction: rtl;">Date : </label> <br><input type="date" name="date_edit" value="<?php echo sec($row['date']);?>">
							<br>
							<br>
							<label style="direction: rtl;">Address : </label> <br><input type="text" name="address_edit" value="<?php echo sec($row['address']);?>">
							<br>
							<br>
							<label style="direction: rtl;">Number : </label> <br><input type="text" name="number_edit" value="<?php echo sec($row['number']);?>">
							<br>
							<br>
							<button type="button" style="background-color: red;" class="btn btn-secondary btn-lg mt-2 w-25" data-bs-dismiss="modal">بگرە</button>
							<button name="reception_edit" class="btn btn-primary btn-lg mt-2 w-25">بگۆهرە</button>
						</form>
						</center>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</body>
</html>