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
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/arinalogos.JPG">
    <title>Edara</title>
  </head>
  <body>
    <div class="form-dctor">
      <form action="modal/sick.inc.php" method="POST">
      <?php
      $id = sec($_GET['id']);
      $query = mysqli_query($db , "SELECT * FROM `sick` WHERE `id` = '$id'");
      while($row = mysqli_fetch_assoc($query)){?>
        <input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
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
      <div class="form-detials-edara">
          <div class="price-edara">
          <div class="price1">
            <label for="">Hair Round:</label><p><?php echo sec($row['hair_round']);?></p>
          </div>
          <div class="price1">
            <label for="">Banck:</label><p><?php echo sec($row['banck']);?></p>
          </div>
          <div class="price1">
            <label for="">BHT:</label><p><?php echo sec($row['bht']);?></p>
          </div>
        </div>
        <div class="price-edara">
          <div class="price1">
            <label for="">Highest Price:</label><p><?php echo sec($row['high_price']);?>$</p>
          </div>
          <div class="price1">
            <label for="">Lowest Price:</label><p><?php echo sec($row['low_price']);?>$</p>
          </div>
        </div>
      <?php } ?>
        <div class="lastprice">
          <label for=""> Price:</label><input type="text" name="price">
        </div>
        <div class="lastprice">
          <label for=""> Pre-Price:</label><input type="text" name="pre_price">
        </div>
        <div class="lastprice">
          <label for=""> Surgery Date:</label><input type="date" name="surgery_date">
        </div>
        <div class="price-edara">
            <label for="" style="color: white;">Note:</label><input type="text" name="sick_note_val" value="<?php echo sec($row['sick_note']); ?>">
        </div>
        <center>
        <div class="custom-select" style="width:250px;">
          <select name="answer">
            <option value="0">Select Answer :</option>
            <option value="Confirm">Confirm</option>
            <option value="Reject">Reject</option>
            <option value="Pending">Pending</option>
          </select>
        </div>
        <div>
            <div class="price-edara" style="display: flex; justify-content: space-between; width: 25%; color: white;" >
                <h3>Extra: </h3>
                <div>
            PRP <br>
			<input type="checkbox" name="prp_plus" value="1"
			<?php
			$prp_plus_val = sec($row['prp_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			</div>
			<br>
			<div>
			Meso <br>
			<input type="checkbox" name="meso_plus" value="1"
			<?php
			$prp_plus_val = sec($row['meso_plus']);
			if($prp_plus_val == '1'){?>
			checked
			<?php }else{
			}?>
			>
			</div>
			</div>
        </div>
        </center>
      </div>
      <br>
      <br>
      <br>
      <center>
      <button class="btn-edara" name="insert_edara">Save</button>
      </center>
    </form>
    </div >
    <script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
    /*when an item is clicked, update the original select box,
    and the selected item:*/
    var y, i, k, s, h, sl, yl;
    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
    sl = s.length;
    h = this.parentNode.previousSibling;
    for (i = 0; i < sl; i++) {
    if (s.options[i].innerHTML == this.innerHTML) {
    s.selectedIndex = i;
    h.innerHTML = this.innerHTML;
    y = this.parentNode.getElementsByClassName("same-as-selected");
    yl = y.length;
    for (k = 0; k < yl; k++) {
    y[k].removeAttribute("class");
    }
    this.setAttribute("class", "same-as-selected");
    break;
    }
    }
    h.click();
    });
    b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
    /*when the select box is clicked, close any other select boxes,
    and open/close the current select box:*/
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
    });
    }
    function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
    arrNo.push(i)
    } else {
    y[i].classList.remove("select-arrow-active");
    }
    }
    for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
    x[i].classList.add("select-hide");
    }
    }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
    </script>
  </body>
</html>