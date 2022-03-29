<?php include 'includes/config.php' ?>
<?php
if($userid == false){
  header('Location: index.php');
}
if($ahmed == false){
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
        <title>Koga</title>
    </head>
    <body>
        <div class="table-koga-add">
            <center><button id="btn" class="btn" style="width: 200px; margin: 0 30px; height: 30px; background-color: white; color: teal; border: 1px solid teal; font-size: 20px;">back</button></center>
            <h1 style="width: 100%; color: teal;"><marquee >Add Items</marquee></h1>
            <table width="100%" >
                <form action="modal/koga.inc.php" method="POST">
                    <tr style="background-color: teal; color: black; font-size: 20px;">
                        <td>Items</td>
                        <td>Items Number</td>
                        <td>Enter</td>
                    </tr>
                    <tr style="background-color: rgb(65, 65, 65);">
                        <td><input type="text" name="items"></td>
                        <td><input type="number" name="items_num"></td>
                        <td><button name="submit">Enter</button></td>
                    </tr>
                </form>
            </table>
        </div>
        <h1 style="width: 100%; color: teal;"><marquee >All Items</marquee></h1>
        <center>
        <table class="table-koga">
            <tr>
                <th>#</th>
                <th>Items</th>
                <th>Last</th>
                <th>Daily Check +</th>
                <th>Daily Check -</th>
                <th>Total</th>
                <th>Daily Check Date</th>
                <th>Day</th>
                <th>Name</th>
                <th>Write Note</th>
                <th>Note</th>
                <th>Edit</th>
            </tr>
            <?php
            $query = mysqli_query($db , "SELECT * FROM `store`");
            while($row = mysqli_fetch_assoc($query)){ 
            $last =  sec($row['last']);
            $day =  sec($row['day']);?>
            <form method="POST" action="modal/koga.inc.php">
                <input type="text" name="id" value="<?php echo sec($row['id']);?>" hidden>
                <tr>
                    <td><?php echo sec($row['id']);?></td>
                    <td><?php echo sec($row['items']);?></td>
                    <td><select class="last">
                        <option><?php echo sec($row['last']);?></option>
                    </select></td>
                    <td>
                        <input type="number" class="plus" >
                    </td>
                    <td >
                        <input type="number" class="sub">
                    </td>
                    <td>
                        <select name="edit_total" style="color: white;">
                            <option class="result" ><?php echo sec($row['last']);?></option>
                        </select>
                    </td>
                    <td style="background-color: rgb(190, 84, 84);"><?php echo sec($row['daily_check_date']);?></td>
                    <td><?php echo $last / $day ?> </td>
                    <td class="name">
                        <select name="user_name">
                            <option value="0">Select Name</option>
                            <option value="خانمی کۆمار">خانمی کۆمار</option>
                            <option value="خانمی روستەمی">خانمی روستەمی</option>
                            <option value="خانمی یەگانا">خانمی یەگانا</option>
                            <option value="خانمی ئەمینی">خانمی ئەمینی</option>
                            <option value="خانمی فتوحی">خانمی فتوحی</option>
                            <option value="خانمی ئەمیری">خانمی ئەمیری</option>
                            <option value="خانمی شوکری">خانمی شوکری</option>
                            <option value="خانمی حاجی">خانمی حاجی</option>
                            <option value="سومەیە">سومەیە</option>
                                 <option value="الهام">الهام</option>
                            
                        </select>
                    </td>
                    <td style="background-color: rgb(190, 84, 84); width: 50px;"><input type="text" name="note" style="width: 50px;"></td>
                     <td><?php echo sec($row['user_name']);?> <?php echo sec($row['note']);?></td>
                    <td><button name="edit">Edit</button></td>
                </tr>
            </form>
            <?php } ?>
        </table>
        </center>
        <script src="jquery-3.5.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        $('.last, .plus, .sub').on('blur', function(e) {
        var row = $(this).closest('tr');
        var last_pr = $('.last', row),
        plus_pr = $('.plus', row),
        sub_pr = $('.sub', row),
        result_pr = $('.result', row);
        last_pr_pr = parseInt(last_pr.val());
        plus_pr_pr = parseInt(plus_pr.val());
        sub_pr_pr = parseInt(sub_pr.val());
        if (!isNaN(last_pr_pr) && !isNaN(plus_pr_pr)) {
        result_pr.text((last_pr_pr + plus_pr_pr).toFixed(2));
        }
        if (!isNaN(last_pr_pr) && !isNaN(sub_pr_pr)) {
        result_pr.text((last_pr_pr - sub_pr_pr).toFixed(2));
        }
        });
        </script>
        <script type="text/javascript">
          const button = document.getElementById("btn");
  const goBack = () => {
    window.history.back();
  };
  button.addEventListener("click", (event) => {
    goBack();
  })
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>