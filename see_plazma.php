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
	    <div class="search-form">
	        <center><h1>Prp: &nbsp</h1></center>
			<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="date" name="search">
				<button>Search</button>
			</form>
		</div>
		<!--PHP Search -->
		<?php
		if(isset($_GET['search'])){
			$data = ($_GET['search']);
			$sql = mysqli_query($db , "SELECT * FROM `sick` WHERE `prp` LIKE '%$data%' ");
		if(mysqli_num_rows($sql) > 0){ ?>
		<center>
		<table class="table-plazma" >
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Number</th>
				<th>PRP</th>
				<th>Eltra</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<form method="POST" action="modal/plazma.inc.php">
					<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
					<td><?php echo sec($row['name']);?></td>
					<td><?php echo sec($row['surgery_date']);?></td>
					<td><?php echo sec($row['number']);?></td>
				    <td><?php echo sec($row['prp']);?></td>
		<td>PRP <br>
			<input type="checkbox" name="prp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<br>
			Meso <br>
			<input type="checkbox" name="meso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
	</form>
</tr>
<?php } ?>
</table>
</center>
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
		
		<div class="search-form">
	        <center><h1>Meso: &nbsp</h1></center>
			<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="date" name="msearch">
				<button>Search</button>
			</form>
		</div>
		<!--PHP Search meso-->
		<?php
		if(isset($_GET['msearch'])){
			$data = ($_GET['msearch']);
			$sql = mysqli_query($db , "SELECT * FROM `sick` WHERE `meso` LIKE '%$data%' ");
		if(mysqli_num_rows($sql) > 0){ ?>
		<center>
		<table class="table-plazma" >
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Number</th>
				<th>Meso</th>
				<th>Eltra</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<form method="POST" action="modal/plazma.inc.php">
					<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
					<td><?php echo sec($row['name']);?></td>
					<td><?php echo sec($row['surgery_date']);?></td>
					<td><?php echo sec($row['number']);?></td>
			        <td><?php echo sec($row['meso']);?></td>
		<td>PRP <br>
			<input type="checkbox" name="prp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<br>
			Meso <br>
			<input type="checkbox" name="meso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
	</form>
</tr>
<?php } ?>
</table>
</center>
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
		
		<center>
		<table class="table-plazma" >
			<tr>
				<th>Name</th>
				<th>Surgery Date</th>
				<th>Number</th>
				<th>Control</th>
				<th>PRP</th>
				<th>Meso</th>
				<th>Eltra</th>
				<th>Print</th>
			</tr>
			<?php
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `answer` = 'Confirm' ORDER BY `surgery_date` DESC");
			while($row = mysqli_fetch_assoc($query)){?>
			<tr>
				<form method="POST" action="modal/plazma.inc.php">
					<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
					<td><?php echo sec($row['name']);?></td>
					<td><?php echo sec($row['surgery_date']);?></td>
					<td><?php echo sec($row['number']);?></td>
					<td><?php echo sec($row['control']);?></td>
				    <td><?php echo sec($row['prp']);?></td>
			        <td><?php echo sec($row['meso']);?></td>
		<td>PRP <br>
			<input type="checkbox" name="prp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<br>
			Meso <br>
			<input type="checkbox" name="meso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
		<td style="background-color: green"><a href="plazma_print.php?id=<?php echo sec($row['id']);?>">Print</a></td>
	</form>
</tr>
<?php } ?>
</table>
</center>
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