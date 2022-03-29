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
		<div class="add-table-masraf">
		    <center><button id="btn" class="btn" style="margin-bottom: 10px; width: 200px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 16px;">back</button></center>
			<table>
				<tr style="background-color: teal;">
					<td>بابەت</td>
					<td>نرخ</td>
					<td>بەروار</td>
					<td>ژ.پسۆڵە</td>
					<td>تێبینی</td>
					<td>داخلکرن</td>
				</tr>
				<form method="POST" action="modal/cost.inc.php">
					<?php
					$slfa_id = sec($_GET['slfa_id']);
					$query = mysqli_query($db , "SELECT * FROM `slfa` WHERE `id` = '$slfa_id'");
					while($row = mysqli_fetch_assoc($query)){?>
					<tr style="background-color: rgb(230, 230, 230);">
						<td>
							<input type="text" name="slfa_id" value="<?php echo sec($row['id']);?>" hidden>
							<select name="subject">
								<option>کارت</option>
								<option>مەوادی پاک کەرەوە</option>
								<option>مەوادی پزیشکی</option>
								<option>مەوادی خۆراکی</option>
		<option>مەوادی پاک کەرەوە + مەوادی خۆراکی</option>
								<option>شتی تر</option>
							</select>
						</td>
						<td><input type="number" name="price"></td>
						<td><input type="date" name="date"></td>
						<td><input type="number" name="form_num"></td>
						<td><input type="text" name="note"></td>
						<td><button name="cost_submit">داخلکردن</button></td>
					</tr>
					<?php } ?>
				</form>
			</table>
		</div>
		<table class="table-masraf" >
			<tr>
				<th>#</th>
				<th>بابەت</th>
				<th >نرخ</th>
				<th>بەروار</th>
				<th>ژ.پسۆڵە</th>
				<th>تێبینی</th>
				<th>دەستکاری</th>
				<th>سڕینەوە</th>
			</tr>
			<?php
			$slfa_id = sec($_GET['slfa_id']);
			$query = mysqli_query($db , "SELECT * FROM `cost` WHERE `slfa_id` = '$slfa_id'");
			while($row = mysqli_fetch_assoc($query)){?>
			<tr>
				<td><?php echo sec($row['id']);?></td>
				<td><?php echo sec($row['subject']);?></td>
				<td>
					<center>
					<input type="text" class="price" value="<?php echo sec($row['price']);?>" readonly>
					</center>
				</td>
				<td><?php echo sec($row['date']);?></td>
				<td><?php echo sec($row['form_num']);?></td>
				<td><?php echo sec($row['note']);?></td>
				<td><button style="background-color: green; color: white;" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'];?>">دەستکاری</button> </td>
				<td><button type="delete" style="background-color: red;"><a style="color: white;" href="modal/cost.inc.php?delete=<?php echo $row['id'];?>">سڕینەوە   </a></button></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" style="color: teal">کۆی گشتی  </td>
				<td><select name="all_price">
					<option class="all_price"></option>
				</select> <h4>هەزار دینار</h4></td>
			</tr>
			<?php
				$slfa_id = sec($_GET['slfa_id']);
				$query = mysqli_query($db , "SELECT * FROM `slfa` WHERE `id` = '$slfa_id'");
			while($row = mysqli_fetch_assoc($query)){?>
			<tr>
				<td colspan="2" style="color: teal"> سلفە  </td>
				<td class="slfa-input">
					<input type="text" class="slfa" value="<?php echo sec($row['slfa_price']);?> هەزار      =" readonly>
				</td>
				<td style="color: teal">بەرواری تومارکردن</td>
				<td><h3><?php echo sec($row['date']);?></h3></td>
			</tr>
			<tr>
				<td colspan="2" style="color: teal"> باقی  </td>
				<td><select name="all_price">
					<option class="all_sfra"></option>
				</select> <h4>هەزار دینار</h4></td>
			</tr>
			<?php } ?>
		</table>
		</center>
		<!-- MODAL EDIT -->
		<?php
		$query = mysqli_query($db , "SELECT * FROM `cost`");
		while($row = mysqli_fetch_assoc($query)){?>
		<div class="modal fade" id="edit<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" style="direction: rtl;">
						<center>
						<form method="POST" action="modal/cost.inc.php">
							<input type="text" name="id" value="<?php echo $row['id'];?>" hidden>
							<img src="assets/images/costt.png" style="width: 150px;">
							<br>
							<br>
							<label>بابەت: </label>
							<br>
							<select name="edit_subject" class="edit-select-cost">
								<option>کارت</option>
								<option>مەوادی پاک کەرەوە</option>
								<option>مەوادی پزیشکی</option>
								<option>مەوادی خۆراکی</option>
									<option>مەوادی پاک کەرەوە + مەوادی خۆراکی</option>
								<option>شتی تر</option>
							</select>
							<br>
							<label>نرخ: </label>
							<br>
							<input type="text" name="edit_price" value="<?php echo sec($row['price']);?>">
							<br>
							<label>بەروار: </label>
							<br>
							<input type="date" name="edit_date" value="<?php echo sec($row['date']);?>">
							<br>
							<label>ژ.پسۆڵە: </label>
							<br>
							<input type="text" name="edit_form_num" value="<?php echo sec($row['form_num']);?>">
							<br>
							<label>تێبینی: </label>
							<br>
							<input type="text" name="edit_note" value="<?php echo sec($row['note']);?>">
							<br>
							<br>
						<button type="button" style="background-color: red;" class="btn btn-secondary btn-lg mt-2 w-25" data-bs-dismiss="modal">گەرانەوە</button>
						<button name="edit_cost" class="btn btn-primary btn-lg mt-2 w-25">گۆرین</button>
					</form>
					</center>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<script src="jquery-3.5.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$('.price , .slfa').on('blur', function(e) {
	var row = $(this).closest('tr');
	var price_pr = $('.price', row),
	all_price_pr = $('.all_price', row),
	slfa_pr = $('.slfa', row);
	price_pr_pr = parseInt(price_pr.val());
	slfa_pr_pr = parseInt(slfa_pr.val());
		var totalsum = 0;
				$(".price").each(function(){
				var inputVal = $(this).val();
				if($.isNumeric(inputVal)){
				totalsum += parseFloat(inputVal);
				}
				$(".all_price").text(totalsum);
				$(".all_sfra").text(slfa_pr_pr - totalsum);
				});
	});
	</script>
	<script type="text/javascript">
          const button = document.getElementById("btn");
  const goBack = () => {
    window.history.back();
  };
  button.addEventListener("click", (event) => {
    goBack();
  })
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>