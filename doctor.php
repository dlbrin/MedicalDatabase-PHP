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
    $id = sec($_GET['id']);
    $query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$id'");
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
          <div class="view-doctor-middle-hairlosspattern">
          <div class="hairlosspattern-img">
              <div class="i">
                <img src="assets/images/h1.png" alt="">
                <br>
                <center><input type="checkbox" value="I" name="hair_round[]"></center>
              </div>
              <div class="ii">
                <img src="assets/images/h2.png" alt="">
                <br>
                <center><input type="checkbox" value="IIIa" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h3.png" alt="">
                <br>
                <center><input type="checkbox" value="IV" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h4.png" alt="">
                <br>
                <center><input type="checkbox" value="Va" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h5.png" alt="">
                <br>
                <center><input type="checkbox" value="II" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h6.png" alt="">
                <br>
                <center><input type="checkbox" value="III" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h7.png" alt="">
                <br>
                <center><input type="checkbox" value="IVa" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h8.png" alt="">
                <br>
                <center><input type="checkbox" value="VI" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h9.png" alt="">
                <br>
                <center><input type="checkbox" value="IIa" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h10.png" alt="">
                <br>
                <center><input type="checkbox" value="IIvertex" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h11.png" alt="">
                <br>
                <center><input type="checkbox" value="V" name="hair_round[]"></center>
              </div>
              <div>
                <img src="assets/images/h12.png" alt="">
                <br>
                <center><input type="checkbox" value="VII" name="hair_round[]"></center>
              </div>
            </div>
          </div>
        
        <div class="chek">
          <label for="">Frontal</label><input type="checkbox" value="Frontal" name="banck[]">
          <label for="">Mid scalp</label><input type="checkbox" value="Mid scalp" name="banck[]">
          <label for="">Vertex</label><input type="checkbox" value="Vertex" name="banck[]">
          <label for="">Eyebrow</label><input type="checkbox" value="Eyebrow" name="banck[]">
          <label for="">Beard</label><input type="checkbox" value="Beard" name="banck[]">
          <label for="">Maustash</label><input type="checkbox" value="Maustash" name="banck[]">
          <br>
          <br>
          <label for="">BHT</label><input type="checkbox" value="BHT" name="bht">
          <br>
          <br>
          <label for="">Mid</label><input type="checkbox" value="Mid" name="mid[]">
          <label for="">Mid to moderate</label><input type="checkbox" value="Mid to moderate" name="mid[]">
          <label for="">Moderate</label><input type="checkbox" value="Moderate" name="mid[]">
          <label for="">Good</label><input type="checkbox" value="Good" name="mid[]">
        </div>
        <div class="price">
          <div>
            <label for="">Highest Price:</label><input type="text" name="high_price">
          </div>
          <div>
            <label for="">Lowest Price:</label><input type="text" name="low_price">
          </div>
        </div>
      </div>
      <center>
      <button name="insert_doc">Send</button>
      </center>
    </form>
    </div >
  <?php } ?>
  </body>
</html>