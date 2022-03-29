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
		<title>Document</title>
	</head>
	<body>
		<div class="plazma-form">
			<?php
			$id = sec($_GET['id']);
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$id'");
			while($row = mysqli_fetch_assoc($query)){ 
				$control = sec($row['control']);
				$prp = sec($row['prp']);
				$meso = sec($row['meso']);
				?>
			<div class="plazma-form-info">
			    <div style=""direction: ltr;">
			        <h3>Name: <?php echo sec($row['name']);?></h3>
			    <h3>id: <?php echo sec($row['id']);?></h3>
			    </div>
			    
				<table>
					<tr>
						<td>مەبەست</td>
						<td>ڕۆژی هەفتە</td>
						<td>بەروار</td>
					</tr>
					<tr>
						<td>Control</td>
						<td><?php echo $date = date('l', strtotime($control));
						if($date == 'Friday'){
							echo 'هەینی';
						}elseif($date == 'Saturday'){
							echo 'شەمە';
						}elseif($date == 'Sunday'){
							echo 'یەک شەمە';
						}elseif($date == 'Monday'){
							echo 'دوو شەمە ';
						}elseif($date == 'Tuesday'){
							echo 'سێ شەمە ';
						}elseif($date == 'Wednesday'){
							echo 'چوار شەمە ';
						}elseif($date == 'Thursday'){
							echo 'پێنچ شەمە ';
						}
						?></td>
						<td><?php echo sec($row['control']);?></td>
					</tr>
					<tr>
						<td>PRP</td>
						<td><?php echo $date = date('l', strtotime($prp));
						if($date == 'Friday'){
							echo 'هەینی';
						}elseif($date == 'Saturday'){
							echo 'شەمە';
						}elseif($date == 'Sunday'){
							echo 'یەک شەمە';
						}elseif($date == 'Monday'){
							echo 'دوو شەمە ';
						}elseif($date == 'Tuesday'){
							echo 'سێ شەمە ';
						}elseif($date == 'Wednesday'){
							echo 'چوار شەمە ';
						}elseif($date == 'Thursday'){
							echo 'پێنچ شەمە ';
						}
						?></td>
						<td><?php echo sec($row['prp']);?></td>
					</tr>
					<tr>
						<td>Meso</td>
						<td><?php echo $date = date('l', strtotime($meso)); 
						if($date == 'Friday'){
							echo 'هەینی';
						}elseif($date == 'Saturday'){
							echo 'شەمە';
						}elseif($date == 'Sunday'){
							echo 'یەک شەمە';
						}elseif($date == 'Monday'){
							echo 'دوو شەمە ';
						}elseif($date == 'Tuesday'){
							echo 'سێ شەمە ';
						}elseif($date == 'Wednesday'){
							echo 'چوار شەمە ';
						}elseif($date == 'Thursday'){
							echo 'پێنچ شەمە ';
						}
						?></td>
						<td><?php echo sec($row['meso']);?></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: left; padding: 0 0 0 100px;">کاتژمێر (٣ی ئێوارە)</td>
						<td>
						    <div style="display: flex; justify-content: center;">
						        <div>
						    <?php $prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
						    <h6>PRP</h6> 
			<input style="width: 15px; margin:0 20px;" type="checkbox" name="eprp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<?php } ?>
			</div>
			<br>
			<div>
			<?php $prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			 <h6>Meso</h6>
			<input style="width: 15px; margin:0 20px;" type="checkbox" name="emeso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			<?php } ?>
			</div>
			</div>
						</td>
					</tr>
					<tr>
					<td colspan="3" style="direction: ltr;"> www.arinacenter.com  : ماڵپەر<br>
			( چوونە ژوورەوە )
					<br>
							Username : arinacenter
							<br>
							Password : arina123
						</td>
					</tr>
					<tr>
					<td colspan="3" style="direction: ltr;">
					    <img src="assets/images/arinaqr.jpg" width="120">
					</tr>
				</table>
				<center><input id="myPrntbtn" type="button" value="Print" onclick="window.print();" ></center>
			</div>
			<?php } ?>
		</div>
	</body>
</html>