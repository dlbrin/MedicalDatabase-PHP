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
		<title>Cost</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<center>
		    <center><button id="btn" class="btn" style="margin-top: 50px; width: 200px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 16px;">back</button></center>
		<form method="POST" action="modal/cost.inc.php">
			<div class="add-table-masraf">
				<table width="100%">
					<tr style="background-color: teal;">
						<td>سلفە</td>
						<td>بەروار</td>
					</tr>
					<tr style="background-color: rgb(230, 230, 230);">
						<td><input type="number" name="slfa"></td>
						<td><input type="date" name="slfa_date"></td>
					</tr>
				</table>
				<center><button name="slfa_submit">داخلکردن</button></center>
			</div>
		</form>
		</center>
		<center>
		<div class="cost-cart">
			<?php
			$query = mysqli_query($db , "SELECT * FROM `slfa` ORDER BY `id` DESC");
			while($row = mysqli_fetch_assoc($query)){?>
			<div class="cost-cart-info">
				<img src="assets/images/costt.png">
				<h1><span>سلفە : </span><?php echo sec($row['slfa_price']);?></h1>
				<h1><span>بەرواری تومارکردن : </span><?php echo sec($row['date']);?></h1>
				<div class="cost-cart-info-link">
					<button data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'];?>">دەستکاری</button>
					<a href="cost.php?slfa_id=<?php echo sec($row['id']);?>">بینین</a>
				</div>
			</div>
			<?php } ?>
		</div>
		</center>
		<!-- MODAL EDIT -->
		<?php
		$query = mysqli_query($db , "SELECT * FROM `slfa`");
		while($row = mysqli_fetch_assoc($query)){?>
		<div class="modal fade" id="edit<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
						<form method="POST" action="modal/cost.inc.php">
							<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
							<img src="assets/images/costt.png" style="width: 150px;">
							<br>
							<br>
							<label style="direction: rtl;">سلفە: </label> <br><input type="text" name="slfa_edit" value="<?php echo sec($row['slfa_price']);?>">
							<br>
							<br>
							<label style="direction: rtl;">بەرواری تومارکردن : </label> <br><input type="date" name="date_edit" value="<?php echo sec($row['date']);?>">
							<br>
							<br>
							<button type="button" style="background-color: red;" class="btn btn-secondary btn-lg mt-2 w-25" data-bs-dismiss="modal">بگرە</button>
							<button name="edit" class="btn btn-primary btn-lg mt-2 w-25">بگۆهرە</button>
						</form>
						</center>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
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