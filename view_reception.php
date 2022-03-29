<?php include 'includes/config.php' ?>
<?php
if($userid == false){
    header('Location: index.php');
}
if($reception == false){
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
        while($row = mysqli_fetch_assoc($query)){ 
            $hair_type = sec($row['types_of_transplant']);
            $gender = sec($row['gender']);
            $source = sec($row['source']);
            ?>
        <div class="form">
            <form action="modal/sick.inc.php" method="POST">
                <img src="assets/images/logo.png" alt="">
                <div class="title">
                    <h1>Personal Information</h1>
                </div>
                <input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
                <div class="form-detials">
                    <div>
                        <label > Name:&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="text" name="edit_name" value="<?php echo sec($row['name']);?>">
                    </div>
                    <div>
                        <label >Age  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="number" name="edit_age" value="<?php echo sec($row['age']);?>">
                    </div>
                    <div>
                        <label >Address:&nbsp;</label> <input type="text" name="edit_address" value="<?php echo sec($row['address']);?>">
                    </div>
                    <div>
                        <label >Number:&nbsp;</label> <input type="text" name="edit_number" value="<?php echo sec($row['number']);?>">
                    </div>
                    <div>
                        <label >Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="date" name="edit_date" value="<?php echo sec($row['date']);?>">
                    </div>
                    <h1>Types of Transplant:</h1>
                    <div class="checkbox">
                        <label for="">Hair:</label><input type="checkbox" name="edit_type[]" value="Hair" <?php if($hair_type == 'Hair'){?> checked <?php }else{}?>>
                        <label for="">Beard:</label><input type="checkbox" name="edit_type[]" value="Beard" <?php if($hair_type == 'Beard'){?> checked <?php }else{}?>>
                        <label for="">Eyebrow:</label><input type="checkbox" name="edit_type[]" value="Eyebrow" <?php if($hair_type == 'Eyebrow'){?> checked <?php }else{}?>>
                    </div>
                    <h1>Gender:</h1>
                    <div class="checkbox">
                        <label for="">Male:</label><input type="checkbox" name="edit_gender[]" value="Male" <?php if($gender == 'Male'){?> checked <?php }else{}?>>
                        <label for="">Female:</label><input type="checkbox" name="edit_gender[]" value="Female" <?php if($gender == 'Female'){?> checked <?php }else{}?>>
                    </div>
                    <h1>Source:</h1>
                    <div class="checkbox">
                        <label for="">Social:</label><input type="checkbox" name="edit_source[]" value="Social" <?php if($source == 'Social'){?> checked <?php }else{}?>>
                        <label for="">Tv:</label><input type="checkbox" name="edit_source[]" value="Tv" <?php if($source == 'Tv'){?> checked <?php }else{}?>>
                        <label for="">Referenced:</label><input type="checkbox" name="edit_source[]" value="Referenced" <?php if($source == 'Referenced'){?> checked <?php }else{}?>>
                        <label for="">Roadside Adverts:</label><input type="checkbox" name="edit_source[]" value="Roadside Adverts" <?php if($source == 'Roadside Adverts'){?> checked <?php }else{}?>>
                    </div>
                </div>
                <center>
                <button name="edit_submit">Send</button>
                </center>
                </form>
                </div >
            <?php } ?>
            </body>
        </html>