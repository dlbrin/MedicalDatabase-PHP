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
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">\
		<link rel="icon" href="assets/images/arinalogos.JPG">
		<title>Edara</title>
	</head>
	<body
	    <center><button id="btn" class="btn" style="margin-top: 50px; width: 200px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 20px;">back</button></center>
		<div class="show-personal-card">
			<?php
			$query = mysqli_query($db , "SELECT * FROM `sick` WHERE `confirm_doctor` = '1' AND `confirm_edara` = '0' ORDER BY `id` DESC ");
			while($row = mysqli_fetch_assoc($query)){?>
			<div class="show-personal-data">
				<div class="show-personal-info">
					<div class="show-personal-info-header">
						<label><span>Name:</span>&nbsp<?php echo sec($row['name']);?></label>
						<label><span>Address:</span>&nbsp<?php echo sec($row['address']);?></label>
						<label><span>Age:</span>&nbsp<?php echo sec($row['age']);?></label>
					</div>
					<div class="show-personal-info-middle">
						<div class="personal-middle-data">
							<label><span>Hair Round: </span>&nbsp<?php echo sec($row['hair_round']);?></label>
							<label><span>Banck:</span>&nbsp<?php echo sec($row['banck']);?></label>
							<label><span>BHT:</span>&nbsp<?php echo sec($row['bht']);?></label>
						</div>
						<div class="personal-middle-img">
							<img src="assets/images/logo.png" alt="">
						</div>
					</div>
					<center>
					<button style="float: left;"><a href="edara.php?id=<?php echo sec($row['id']);?>">Open</a></button>
					<button type="delete_edara" style="background-color: teal; float: right;"><a style="color: white;" href="modal/sick.inc.php?delete_edara=<?php echo $row['id'];?>">Delete   </a></button>
					</center>
				</div>
			</div>
			<?php } ?>
		</div>
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