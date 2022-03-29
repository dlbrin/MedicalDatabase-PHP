<?php include 'includes/config.php' ?>
<?php
if($userid == false){
  header('Location: index.php');
}
if($superadmin == false){
  header('Location: home.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Doctor</title>
	</head>
	<body>
		<div class="view-doctor">
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
			<form action="modal/sick.inc.php" method="POST">
				<input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
				<div class="view-doctor-middle">
					<div class="view-doctor-middle-first">
						<h3>Family History of Hair Loss:</h3> &nbsp &nbsp &nbsp
						<h1 style="font-size: 28px; color: teal;"><?php echo sec($row['Family_History_of_Hair_Loss']);?><h1>
					</div>
					<?php } ?>
					<div class="view-doctor-middle-medical">
						<?php
						$num = sec($_GET['num']);
						$query = mysqli_query($db , "SELECT * FROM `medical_history` WHERE `sick_id` = '$num'");
						while($row = mysqli_fetch_assoc($query)){?>
						<h3>Medical History:</h3>
						<table width="1000px" border="1">
							<tr style="background-color: teal; color: white;">
								<td>Diseases</td>
								<td>Yes_NO</td>
								<td>More Explain</td>
								<td>Medication</td>
							</tr>
							<tr>
								<td><?php echo sec($row['Anemia']);?></td>
								<td><?php echo sec($row['Anemia_Yes_No']);?></td>
								<td><?php echo sec($row['Anemia_More_Explain']);?></td>
								<td><?php echo sec($row['Anemia_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Cardiovascular']);?></td>
								<td><?php echo sec($row['Cardiovascular_Yes_No']);?></td>
								<td><?php echo sec($row['Cardiovascular_More_Explain']);?></td>
								<td><?php echo sec($row['Cardiovascular_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Hypertension']);?></td>
								<td><?php echo sec($row['Hypertension_Yes_No']);?></td>
								<td><?php echo sec($row['Hypertension_More_Explain']);?></td>
								<td><?php echo sec($row['Hypertension_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Diabetes']);?></td>
								<td><?php echo sec($row['Diabetes_Yes_No']);?></td>
								<td><?php echo sec($row['Diabetes_More_Explain']);?></td>
								<td><?php echo sec($row['Diabetes_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Asthma']);?></td>
								<td><?php echo sec($row['Asthma_Yes_No']);?></td>
								<td><?php echo sec($row['Asthma_More_Explain']);?></td>
								<td><?php echo sec($row['Asthma_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Skin_disease']);?></td>
								<td><?php echo sec($row['Skin_disease_Yes_No']);?></td>
								<td><?php echo sec($row['Skin_disease_More_Explain']);?></td>
								<td><?php echo sec($row['Skin_disease_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Allergy']);?></td>
								<td><?php echo sec($row['Allergy_disease_Yes_No']);?></td>
								<td><?php echo sec($row['Allergy_disease_More_Explain']);?></td>
								<td><?php echo sec($row['Allergy_disease_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Kidney_disease']);?></td>
								<td><?php echo sec($row['Kidney_disease_Yes_No']);?></td>
								<td><?php echo sec($row['Kidney_disease_More_Explain']);?></td>
								<td><?php echo sec($row['Kidney_disease_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Epilepsy']);?></td>
								<td><?php echo sec($row['Epilepsy_disease_Yes_No']);?></td>
								<td><?php echo sec($row['Epilepsy_disease_More_Explain']);?></td>
								<td><?php echo sec($row['Epilepsy_disease_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Gastrointestinal_Disorders']);?></td>
								<td><?php echo sec($row['Gastrointestinal_Disorders_Yes_No']);?></td>
								<td><?php echo sec($row['Gastrointestinal_Disorders_More_Explain']);?></td>
								<td><?php echo sec($row['Gastrointestinal_Disorders_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Coagulopathy_disorders']);?></td>
								<td><?php echo sec($row['Coagulopathy_disorders_Yes_No']);?></td>
								<td><?php echo sec($row['Coagulopathy_disorders_More_Explain']);?></td>
								<td><?php echo sec($row['Coagulopathy_disorders_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Psychiatric_disorders']);?></td>
								<td><?php echo sec($row['Psychiatric_disorders_Yes_No']);?></td>
								<td><?php echo sec($row['Psychiatric_disorders_More_Explain']);?></td>
								<td><?php echo sec($row['Psychiatric_disorders_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['History_of_previous_surgery']);?></td>
								<td><?php echo sec($row['History_of_previous_surgery_Yes_No']);?></td>
								<td><?php echo sec($row['History_of_previous_surgery_More_Explain']);?></td>
								<td><?php echo sec($row['History_of_previous_surgery_Medication']);?></td>
							</tr>
							<tr>
								<td><?php echo sec($row['Other']);?></td>
								<td><?php echo sec($row['Other_Yes_No']);?></td>
								<td><?php echo sec($row['Other_More_Explain']);?></td>
								<td><?php echo sec($row['Other_Medication']);?></td>
							</tr>
						</table>
						<?php } ?>
					</div>
					<?php
					$num = sec($_GET['num']);
					$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$num'");
					while($row = mysqli_fetch_assoc($query)){?>
					<div class="view-doctor-middle-habits">
						<h3>Habits: </h3>
						<table width="1000px" border="1">
							<tr style="background-color: teal; color: white;">
								<td></td>
								<td>Yes_No</td>
								<td>Dose</td>
							</tr>
							<tr>
								<td>Smoke</td>
								<td><?php echo sec($row['smoke_yesno']);?></td>
								<td><?php echo sec($row['smoke_dose']);?></td>
							</tr>
							<tr>
								<td>Alcohol</td>
								<td><?php echo sec($row['alcohol_yesno']);?></td>
								<td><?php echo sec($row['alcohol_dose']);?></td>
							</tr>
							<tr>
								<td>Hookah</td>
								<td><?php echo sec($row['hookah_yesno']);?></td>
								<td><?php echo sec($row['hookah_dose']);?></td>
							</tr>
							<tr>
								<td>Opium</td>
								<td><?php echo sec($row['opium_yesno']);?></td>
								<td><?php echo sec($row['opium_dose']);?></td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<hr width="90%">
					<br>
					<div class="view-doctor-middle-hairlosspattern">
						<h3>Hair Loss Pattern: </h3>
						<div class="hairlosspattern-img">
							<?php $hait_pattern = sec($row['hair_loss_pattern']);
							if($hait_pattern == 'I'){?>
							<img src="assets/images/i.png">
							<?php }elseif($hait_pattern == 'II'){?>
							<img src="assets/images/ii.png" alt="">
							<?php }elseif($hait_pattern == 'III'){?>
							<img src="assets/images/iii.png" alt="">
							<?php }elseif($hait_pattern == 'III Vertex'){?>
							<img src="assets/images/iii vertex.png" alt="">
							<?php }elseif($hait_pattern == 'IV'){?>
							<img src="assets/images/iv.png" alt="">
							<?php }elseif($hait_pattern == 'V'){?>
							<img src="assets/images/v.png" alt="">
							<?php }elseif($hait_pattern == 'VI'){?>
							<img src="assets/images/vi.png" alt="">
							<?php }elseif($hait_pattern == 'VII'){?>
							<img src="assets/images/vii.png" alt="">
							<?php } ?>
						</div>
					</div>
					<hr width="90%">
					<br>
					<div class="view-doctor-middle-donorsitecondition">
						<h3>Donor Site Condition: </h3>
						<div class="donorsitecondition-first">
							<h3>Density: </h3> &nbsp
							<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['density']);?></h1>
						</div>
						<div class="donorsitecondition-first">
							<h3>Appearance: </h3> &nbsp
							<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['appearance']);?></h1>
							
						</div>
						<div class="donorsitecondition-first">
							<h3>hairlossprogress: </h3> &nbsp
							<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['hair_loss_progress']);?></h1>
						</div>
					</div>
					<div class="view-doctor-middle-physician">
						<h3>Physician Note: </h3>
						<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['physiciannote_donor']);?></h1>
					</div>
					<div class="view-doctor-middle-surgical ">
						<h3>Surgical Procedure: </h3> &nbsp
						<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['surgical_procedure']);?></h1>
					</div>
					<div class="view-doctor-middle-restoration">
						<h3>Restoration (Transplantation) Plan: </h3>
						<table width="1000px" border="1">
							<tr style="background-color: teal; color: white;">
								<td>Frontal</td>
								<td>Mid scalp</td>
								<td>Vertex</td>
								<td>Other</td>
							</tr>
							<tr>
								<td><?php echo sec($row['frontal']);?></td>
								<td><?php echo sec($row['mid_scalp']);?></td>
								<td><?php echo sec($row['vertex']);?></td>
								<td><?php echo sec($row['other_plan']);?></td>
							</tr>
						</table>
					</div>
					<div class="view-doctor-middle-physician">
						<h3>Physician Note: </h3>
						<h1 style="font-size: 26px; color: teal;"><?php echo sec($row['physiciannote_plan']);?></h1>
					</div>
					<div class="sig">
					    <h3>Patient Signature</h3>
					    <h3>Physician Signature</h3>
					</div>
					<hr width="90%">
					<br>
					<?php
					$sick_name = sec($row['name']);
					}
					$query = mysqli_query($db , "SELECT * FROM `sick_signature` WHERE `sick_name` = '$sick_name'");
					while($row = mysqli_fetch_assoc($query)){?>
					<div class="view-doctor-middle-text">
						<center><img src="assets/uploads/<?php echo sec($row['technician']);?>" alt=""></center>
					</div>
			      	<div class="print-doctor-middle-button">
			             <center><input id="myPrntbtn" type="button" value="Print" onclick="window.print();" ></center>
		            </div>
					<?php } ?>
				</div>
			</form>
		</div>
	</body>
</html>