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
        <link rel="icon" href="assets/images/arinalogos.JPG">
        <title>Reception</title>
    </head>
    <body>
        <div class="form">
            <form action="modal/sick.inc.php" method="POST">
                <img src="assets/images/logo.png" alt="">
                <div class="title">
                    <h1>Personal Information</h1>
                </div>
                <div class="form-detials">
                    <div>
                        <label > Name:&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="text" name="name">
                    </div>
                    <div>
                        <label >Age  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="number" name="age">
                    </div>
                    <div>
                        <label >Address:&nbsp;</label> <input type="text" name="address">
                    </div>
                    <div>
                        <label >Number:&nbsp;</label> <input type="text" name="number">
                    </div>
                    <div>
                        <label >Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="date" name="date">
                    </div>
                    <h1>Types of Transplant:</h1>
                    <div class="checkbox">
                        <label for="">Hair:</label><input type="checkbox" name="type[]" value="Hair" checked>
                        <label for="">Beard:</label><input type="checkbox" name="type[]" value="Beard">
                        <label for="">Eyebrow:</label><input type="checkbox" name="type[]" value="Eyebrow">
                    </div>
                    <h1>Gender:</h1>
                    <div class="checkbox">
                        <label for="">Male:</label><input type="checkbox" name="gender[]" value="Male" checked>
                        <label for="">Female:</label><input type="checkbox" name="gender[]" value="Female">
                    </div>
                    <h1>Source:</h1>
                    <div class="checkbox">
                        <label for="">Social:</label><input type="checkbox" name="source[]" value="Social">
                        <label for="">Tv:</label><input type="checkbox" name="source[]" value="Tv">
                        <label for="">Referenced:</label><input type="checkbox" name="source[]" value="Referenced">
                        <label for="">Roadside Adverts:</label><input type="checkbox" name="source[]" value="Roadside Adverts">
                    </div>
                </div>
                <center>
                <button name="first_submit">Send</button>
                </center>
                <form action="modal/sick.inc.php" method="POST">
                </div >
            </body>
        </html>