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
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
  </head>
  <body>
    <?php
    $num = sec($_GET['num']);
    $query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$num'");
    while($row = mysqli_fetch_assoc($query)){?>
    <div class="form-dctor">
      <div class="title">
        <div class="naxosh">
          <h1>Name:</h1>
          <h2><?php echo sec($row['name']);?></h2>
        </div>
        <div class="naxosh">
          <h1>Address:</h1>
          <h2><?php echo sec($row['address']);?></h2>
        </div>
        <div class="naxosh">
          <h1>Age:</h1>
          <h2><?php echo sec($row['age']);?></h2>
        </div>
      </div>
      <form action="modal/sick.inc.php" method="POST">
        <div class="form-detials">
          <input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
          <?php $hair = sec($row['hair_round']); ?>
          <div class="view-doctor-middle-hairlosspattern">
            <div class="hairlosspattern-img">
              <div class="i">
                <img src="assets/images/h1.png" alt="">
                <br>
                <center><input type="checkbox" value="I" name="hair_round_edit[]" <?php if($hair == 'I'){?> checked <?php } ?>></center>
              </div>
              <div class="ii">
                <img src="assets/images/h2.png" alt="">
                <br>
                <center><input type="checkbox" value="IIIa" name="hair_round_edit[]" <?php if($hair == 'IIIa'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h3.png" alt="">
                <br>
                <center><input type="checkbox" value="IV" name="hair_round_edit[]" <?php if($hair == 'IV'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h4.png" alt="">
                <br>
                <center><input type="checkbox" value="Va" name="hair_round_edit[]" <?php if($hair == 'Va'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h5.png" alt="">
                <br>
                <center><input type="checkbox" value="II" name="hair_round_edit[]" <?php if($hair == 'II'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h6.png" alt="">
                <br>
                <center><input type="checkbox" value="III" name="hair_round_edit[]" <?php if($hair == 'III'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h7.png" alt="">
                <br>
                <center><input type="checkbox" value="IVa" name="hair_round_edit[]" <?php if($hair == 'IVa'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h8.png" alt="">
                <br>
                <center><input type="checkbox" value="VI" name="hair_round_edit[]" <?php if($hair == 'VI'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h9.png" alt="">
                <br>
                <center><input type="checkbox" value="IIa" name="hair_round_edit[]" <?php if($hair == 'IIa'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h10.png" alt="">
                <br>
                <center><input type="checkbox" value="IIvertex" name="hair_round_edit[]" <?php if($hair == 'IIvertex'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h11.png" alt="">
                <br>
                <center><input type="checkbox" value="V" name="hair_round_edit[]" <?php if($hair == 'V'){?> checked <?php } ?>></center>
              </div>
              <div>
                <img src="assets/images/h12.png" alt="">
                <br>
                <center><input type="checkbox" value="VII" name="hair_round_edit[]" <?php if($hair == 'VII'){?> checked <?php } ?>></center>
              </div>
            </div>
          </div>
          
          <div class="chek">
            <?php $banck = sec($row['banck']);?>
            <label for="">Frontal</label><input type="checkbox" value="Frontal" name="banck_edit[]" <?php if($banck == 'Frontal'){?> checked <?php } ?>>
            <label for="">Mid scalp</label><input type="checkbox" value="Mid scalp" name="banck_edit[]" <?php if($banck == 'Mid scalp'){?> checked <?php } ?>>
            <label for="">Vertex</label><input type="checkbox" value="Vertex" name="banck_edit[]" <?php if($banck == 'Vertex'){?> checked <?php } ?>>
            <label for="">Eyebrow</label><input type="checkbox" value="Eyebrow" name="banck_edit[]" <?php if($banck == 'Eyebrow'){?> checked <?php } ?>>
            <label for="">Beard</label><input type="checkbox" value="Beard" name="banck_edit[]" <?php if($banck == 'Beard'){?> checked <?php } ?>>
            <label for="">Maustash</label><input type="checkbox" value="Maustash" name="banck_edit[]" <?php if($banck == 'Maustash'){?> checked <?php } ?>>
            <br>
            <br>
            <?php $bht = sec($row['bht']);?>
            <label for="">BHT</label><input type="checkbox" value="BHT" name="bht_edit" <?php if($bht == 'BHT'){?> checked <?php } ?>>
            <br>
            <br>
            <?php $mid = sec($row['mid']);?>
            <label for="">Mid</label><input type="checkbox" value="Mild" name="mid_edit[]" <?php if($mid == 'Mild'){?> checked <?php } ?>>
            <label for="">Mid to moderate</label><input type="checkbox" value="Mild to moderate" name="mid_edit[]" <?php if($mid == 'Mild to moderate'){?> checked <?php } ?>>
            <label for="">Moderate</label><input type="checkbox" value="Moderate" name="mid_edit[]" <?php if($mid == 'Moderate'){?> checked <?php } ?>>
            <label for="">Good</label><input type="checkbox" value="Good" name="mid_edit[]" <?php if($mid == 'Good'){?> checked <?php } ?>>
          </div>
          <div class="price">
            <div>
              <label for="">Highest Price:</label><input type="text" name="edit_hprice" value="<?php echo sec($row['high_price']);?>">
            </div>
            <div>
              <label for="">Lowest Price:</label><input type="text" name="edit_lprice" value="<?php echo sec($row['low_price']);?>">
            </div>
          </div>
          <center>
          <button name="edit_doc">Send</button>
          </center>
        </div>
      </form>
      <?php } ?>
    </body>
  </html>