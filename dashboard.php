<?php include 'includes/config.php' ?>
<?php
if($userid == false){
  header('Location: index.php');
}
if($superadmin == false){
  header('Location: home.php');
}
?>
<?php
$query = "SELECT answer, count(*) as number FROM sick GROUP BY answer";
$result1 = mysqli_query($db, $query);
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
		<title>Dashboard</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart()
		{
		var data = google.visualization.arrayToDataTable([
		['Gender', 'Number'],
		<?php
		while($row = mysqli_fetch_array($result1))
		{
		echo "['".$row["answer"]."', ".$row["number"]."],";
		}
		?>
		]);
		var options = {
		title: 'Percentage of Confirm and Reject and Pending sick',
		//is3D:true,
		pieHole: 0.4
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data, options);
		}
		</script>
	</head>
	<body style="background-color: #e5e5e5">
		<div class="all-cart-type">
			<div class="all-transplant-type">
				<div class="transplant-type">
					<?php
					$result=mysqli_query($db , "SELECT types_of_transplant, COUNT(types_of_transplant) AS cnt FROM sick GROUP BY types_of_transplant HAVING COUNT(types_of_transplant) > 0;");
					while($row = mysqli_fetch_assoc($result)){?>
					<div class="transplant-type-info">
						<div>
							<h1>Admission <?php echo sec($row['types_of_transplant']);?></h1>
							<h1><?php echo sec($row['cnt']);?></h1>
							<meter value="<?php echo sec($row['cnt']);?>" min="0" max="1000"></meter>
						</div>
						<div>
							<i class="far fa-user"></i>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="transplant-type">
					<?php
					$result=mysqli_query($db , "SELECT `answer`, COUNT(answer) AS ans FROM `sick` GROUP BY `answer` HAVING COUNT(answer) > 0;");
					while($row = mysqli_fetch_assoc($result)){ ?>
					<div class="transplant-type-info" style="border-left: 3px solid #3498db;">
						<div>
							<h1>Admission <?php echo sec($row['answer']);?></h1>
							<h1><?php echo sec($row['ans']);?></h1>
							<meter value="<?php echo sec($row['ans']);?>" min="0" max="1000"></meter><br>
						</div>
						<div>
							<i class="fas fa-briefcase-medical" style="color: #3498db;"></i>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="gender-design" style="width:35%; align-self: stretch; background-color: white; border: 1px solid white; border-radius: 10px; margin: 10px; display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">
				<div id="piechart" style="width: 100%; height: 300px;"></div>
			</div>
		</div>
		<!--PHP Search source-->
		<?php
		if(isset($_POST['submit'])){
			$data = sec($_POST['search']);
			$data1 = sec($_POST['search1']);
			$sql = mysqli_query($db , "SELECT `source`, COUNT(source) AS sou FROM `sick` WHERE `date` BETWEEN '$data' AND '$data1' GROUP BY `source` HAVING COUNT(source) > 0;");
		if(mysqli_num_rows($sql) > 0){ ?>
		<div class="source-design">
			<?php
			while($row = mysqli_fetch_assoc($sql)){ ?>
			<div class="source-middle">
				<h1><i class="fas fa-poll"></i>  <?php echo sec($row['source']);?> : <span><?php echo sec($row['sou']);?></span></h1>
				<meter value="<?php echo sec($row['sou']);?>" min="0" max="1000" title="<?php echo sec($row['sou']);?>"></meter><br>
			</div>
			<?php
			} ?>
		</div>
		<?php }else{
			echo "niya";
		}
		}
		?>
		<div class="middle-dashboard">
			<div class="source-design">
				<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="date" name="search">
					<input type="date" name="search1">
					<input  type="submit" name="submit" value="Search">
				</form>
				<?php
				$result=mysqli_query($db , "SELECT `source`, COUNT(source) AS sou FROM `sick` GROUP BY `source` HAVING COUNT(source) > 0;");
				while($row = mysqli_fetch_assoc($result)){ ?>
				<div class="source-middle">
					<h1><i class="fas fa-poll"></i>  <?php echo sec($row['source']);?> : <span><?php echo sec($row['sou']);?></span></h1>
					<meter value="<?php echo sec($row['sou']);?>" min="0" max="1000" title="<?php echo sec($row['sou']);?>"></meter><br>
				</div>
				<?php } ?>
			</div>
			</div>
			<div class="surgery-dashboard-date">
			<div class="surgery-dashboard">
				<table>
					<tr>
						<td style="background-color: #26de81; color: white;">Name</td>
						<td style="background-color: #a55eea; color: white;">Surgery Date</td>
						<td style="background-color: green; color: white;">Profile</td>
					</tr>
					<?php
					$y = date('Y-m-d', strtotime( $d . " -1 days"));
					echo $y;
					$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `surgery_date` = '$y'");
					while($row = mysqli_fetch_assoc($query)){ ?>
					<tr>
						<td><?php echo sec($row['name']);?></td>
						<td><?php echo sec($row['surgery_date']);?></td>
						<td><a style="color: black;" href="profile.php?num=<?php echo sec($row['id']);?>">Seen</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="surgery-dashboard">
				<table>
					<tr>
						<td style="background-color: #26de81; color: white;">Name</td>
						<td style="background-color: #a55eea; color: white;">Surgery Date</td>
						<td style="background-color: green; color: white;">Profile</td>
					</tr>
					<?php
					$surgery_date = date("Y-m-d");
					echo $surgery_date;
					$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `surgery_date` = '$surgery_date'");
					while($row = mysqli_fetch_assoc($query)){ ?>
					<tr>
						<td><?php echo sec($row['name']);?></td>
						<td><?php echo sec($row['surgery_date']);?></td>
						<td><a style="color: black;" href="profile.php?num=<?php echo sec($row['id']);?>">Seen</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="surgery-dashboard">
				<table>
					<tr>
						<td style="background-color: #26de81; color: white;">Name</td>
						<td style="background-color: #a55eea; color: white;">Surgery Date</td>
						<td style="background-color: green; color: white;">Profile</td>
					</tr>
					<?php
					$n = date('Y-m-d', strtotime( $d . " +1 days"));
					echo $n;
					$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `surgery_date` = '$n'");
					while($row = mysqli_fetch_assoc($query)){ ?>
					<tr>
						<td><?php echo sec($row['name']);?></td>
						<td><?php echo sec($row['surgery_date']);?></td>
						<td><a style="color: black;" href="profile.php?num=<?php echo sec($row['id']);?>">Seen</a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			</div>
		<center>
		    <div class="koga-dashboard">
			<div class="koga-middle">
				<table width="100%">
					<tr style="background-color: teal; color: white;">
						<td>Items</td>
						<td>Last</td>
						<td>Total</td>
						<td>Daily Check Date</td>
						<td>Note</td>
					</tr>
					<?php
					$store_date = date("Y-m-d");
					echo $store_date;
					$sql = mysqli_query($db , "SELECT * FROM `store`");
					while($row = mysqli_fetch_assoc($sql)){ ?>
					<tr>
						<td><?php echo sec($row['items']);?></td>
						<td><?php echo sec($row['last']);?></td>
						<td><?php echo sec($row['last']);?></td>
						<td><?php echo sec($row['daily_check_date']);?></td>
						<td><?php echo sec($row['user_name']);?> <?php echo sec($row['note']);?></td>
					</tr>
					<?php
					} ?>
				</table>
			</div>
		</div>
		<div class="koga-dashboard">
			<h2 style="color: teal;">Search For Store</h2>
			<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<label for="start">Start: </label>
				<input type="date" name="koga_date" id="start">&nbsp &nbsp
				<label for="end">End: </label>
				<input type="date" name="koga_date1" id="end"> &nbsp &nbsp
				<input  type="submit" name="koga_sub" value="Search" style="background-color: teal; color: white;">
			</form>
			<!--PHP Search store-->
			<div class="koga-middle">
				<table width="100%">
					<tr style="background-color: teal; color: white;">
						<td>Items</td>
						<td>Last</td>
						<td>Total</td>
						<td>Daily Check Date</td>
						<td>Note</td>
					</tr>
					<?php
					if(isset($_POST['koga_sub'])){
					$koga_date = sec($_POST['koga_date']);
					$koga_date1 = sec($_POST['koga_date1']);
					$sql = mysqli_query($db , "SELECT * FROM `store` WHERE `daily_check_date` BETWEEN '$koga_date' AND '$koga_date1'");
					if(mysqli_num_rows($sql) > 0){ ?>
					<?php
					while($row = mysqli_fetch_assoc($sql)){ ?>
					<tr>
						<td><?php echo sec($row['items']);?></td>
						<td><?php echo sec($row['last']);?></td>
						<td><?php echo sec($row['last']);?></td>
						<td><?php echo sec($row['daily_check_date']);?></td>
						<td><?php echo sec($row['user_name']);?> <?php echo sec($row['note']);?></td>
					</tr>
					<?php
					} ?>
					<?php }else{
						echo "niya";
					}
					}
					?>
				</table>
			</div>
			<a href="koga.php">Go Store</a>
		</div>
		</center>
		<center>
		<div class="xarji-dashboard">
			<br>
			<h2 style="color: teal;">All Cost</h2>
			<center>
			<div class="cost-cart">
				<?php
				$query = mysqli_query($db , "SELECT * FROM `slfa` ORDER BY `id` DESC");
				while($row = mysqli_fetch_assoc($query)){?>
				<div class="cost-cart-info">
					<img src="assets/images/costt.png">
					<h1><span>CashPay : </span><?php echo sec($row['slfa_price']);?></h1>
					<h1><span>Date: </span><?php echo sec($row['date']);?></h1>
					<center><div class="cost-cart-info-link">
						<a href="cost.php?slfa_id=<?php echo sec($row['id']);?>">Seen</a>
					</div></center>
				</div>
				<?php } ?>
			</div>
			</center>
		</div>
		</center>
		<center>
		<div class="xarji-dashboard-search">
			<h2 style="color: teal;">Search For Cost</h2>
			<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<label for="start">Item: </label>
				<select name="cost">
					<option>کارت</option>
					<option>مەوادی پاک کەرەوە</option>
					<option>مەوادی پزیشکی</option>
					<option>مەوادی خۆراکی</option>
					<option>شتی تر</option>
				</select>
				Start: <input type="date" name="searchc"> &nbsp &nbsp
			    End: <input type="date" name="searchc1">
				<input  type="submit" name="cost_sub" value="Search" style="background-color: teal; color: white;">
			</form>
			<!--PHP Search store-->
			<table width="100%">
				<tr style="background-color: teal; color: white;">
					<td>Items</td>
					<td>price</td>
					<td>date</td>
				</tr>
				<?php
				if(isset($_POST['cost_sub'])){
					$total = 0;
				$cost = sec($_POST['cost']);
				$sql = mysqli_query($db , "SELECT * FROM `cost` WHERE `date` LIKE '%$searchc%' AND `date` LIKE '%$searchc1%' AND `subject` LIKE '%$cost%'");
				if(mysqli_num_rows($sql) > 0){ ?>
				<?php
				while($row = mysqli_fetch_assoc($sql)){
				$price = sec($row['price']); ?>
				<tr>
					<td><?php echo sec($row['subject']);?></td>
					<td><?php echo sec($row['price']);?></td>
					<td><?php echo sec($row['date']);?></td>
				</tr>
				<?php $total += $price; } ?>
				<?php }else{
					echo "niya";
				}?>
				<tr>
					<td colspan="2" style="text-align: center; background-color: teal; color: white;">Total: <?php echo $total; ?></td>
				</tr>
				<?php }
				?>
			</table>
			<a href="new_cost.php">Go Cost</a>
		</div>
		</center>
	</body>
</html>