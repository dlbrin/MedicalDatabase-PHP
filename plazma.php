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
			$sql = mysqli_query($db , "SELECT * FROM `sick` WHERE `name` LIKE '%$data%' OR `surgery_date` LIKE '%$data%' OR `number` LIKE '%$data%' ");
		if(mysqli_num_rows($sql) > 0){ ?>
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
				<th>Note</th>
				<th>Enter</th>
				<th>Print</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<form method="POST" action="modal/plazma.inc.php">
					<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
					<td><?php echo sec($row['name']);?></td>
					<td><?php echo sec($row['surgery_date']);?></td>
					<td><?php echo sec($row['number']);?></td>
					<td><input name="control" type="date" value="<?php echo sec($row['control']);?>"> <input type="checkbox" name="control_confirm" value="1"
					<?php
					$prp_plus_val = sec($row['control_confirm']);
					if($prp_plus_val == '1'){?>
					checked
					<?php }else{
					}?>
					>
				</td>
				<td><input name="prp" type="date" value="<?php echo sec($row['prp']);?>"> <input type="checkbox" name="prp_confirm" value="1"
				<?php
					$prp_plus_val = sec($row['prp_confirm']);
				if($prp_plus_val == '1'){?>
				checked
				<?php }else{
				}?>
				>
			</td>
			<td><input name="meso" type="date" value="<?php echo sec($row['meso']);?>"> <input type="checkbox" name="meso_confirm" value="1"
			<?php
				$prp_plus_val = sec($row['meso_confirm']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
		<td>PRP <br>
			<input type="checkbox" name="eprp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<br>
			Meso <br>
			<input type="checkbox" name="emeso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
		<td><input type="text" name="plazma_note" value="<?php echo sec($row['plazma_note']);?>"></td>
		<td><button name="plazma_sumbit">Enter</button></td>
		<td style="background-color: green"><a href="plazma_print.php?id=<?php echo sec($row['id']);?>">Print</a></td>
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
		<!--PHP Search id -->
		<div class="search-form">
	        
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
				<th>Number</th>
				<th>Control</th>
				<th>PRP</th>
				<th>Meso</th>
				<th>Eltra</th>
				<th>Note</th>
				<th>Enter</th>
				<th>Print</th>
			</tr>
			<?php while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
				<form method="POST" action="modal/plazma.inc.php">
					<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
					<td><?php echo sec($row['name']);?></td>
					<td><?php echo sec($row['surgery_date']);?></td>
					<td><?php echo sec($row['number']);?></td>
					<td><input name="control" type="date" value="<?php echo sec($row['control']);?>"> <input type="checkbox" name="control_confirm" value="1"
					<?php
					$prp_plus_val = sec($row['control_confirm']);
					if($prp_plus_val == '1'){?>
					checked
					<?php }else{
					}?>
					>
				</td>
				<td><input name="prp" type="date" value="<?php echo sec($row['prp']);?>"> <input type="checkbox" name="prp_confirm" value="1"
				<?php
					$prp_plus_val = sec($row['prp_confirm']);
				if($prp_plus_val == '1'){?>
				checked
				<?php }else{
				}?>
				>
			</td>
			<td><input name="meso" type="date" value="<?php echo sec($row['meso']);?>"> <input type="checkbox" name="meso_confirm" value="1"
			<?php
				$prp_plus_val = sec($row['meso_confirm']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
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
		<td><input type="text" name="plazma_note" value="<?php echo sec($row['plazma_note']);?>"></td>
		<td><button name="plazma_sumbit">Enter</button></td>
		<td style="background-color: green"><a href="plazma_print.php?id=<?php echo sec($row['id']);?>">Print</a></td>
	</form>
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
				<th>Note</th>
				<th>Enter</th>
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
					<td><input name="control" type="date" value="<?php echo sec($row['control']);?>"> <input type="checkbox" name="control_confirm" value="1"
					<?php
					$prp_plus_val = sec($row['control_confirm']);
					if($prp_plus_val == '1'){?>
					checked
					<?php }else{
					}?>
					>
				</td>
				<td><input name="prp" type="date" value="<?php echo sec($row['prp']);?>"> <input type="checkbox" name="prp_confirm" value="1"
				<?php
					$prp_plus_val = sec($row['prp_confirm']);
				if($prp_plus_val == '1'){?>
				checked
				<?php }else{
				}?>
				>
			</td>
			<td><input name="meso" type="date" value="<?php echo sec($row['meso']);?>"> <input type="checkbox" name="meso_confirm" value="1"
			<?php
				$prp_plus_val = sec($row['meso_confirm']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
		</td>
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
		<td><input type="text" name="plazma_note" value="<?php echo sec($row['plazma_note']);?>"></td>
		<td><button name="plazma_sumbit">Enter</button></td>
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