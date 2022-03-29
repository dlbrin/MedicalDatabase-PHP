<?php include '../includes/config.php' ?>

<?php
//insert koga
if(isset($_POST['submit'])){
    $items = sec($_POST['items']);
    $items_num = sec($_POST['items_num']);
    $date = date('m/d/Y', time());

    $query = mysqli_query($db , "INSERT INTO `store`(`items` , `last` , `daily_check_date`) VALUES ('$items' , '$items_num' , CURRENT_TIMESTAMP)");
    if ($query) {
                header("Location: ../koga.php?drsta");
            }
}


//edit koga 
if(isset($_POST['edit'])){
    $edittotal = sec($_POST['edit_total']);
    $user_name = sec($_POST['user_name']);
    $note = sec($_POST['note']);
    $id = sec($_POST['id']);
    $query = mysqli_query($db , "UPDATE `store` SET `last` = '$edittotal' , `daily_check_date` = CURRENT_TIMESTAMP , `user_name` = '$user_name' , `note` = '$note' WHERE `id` = '$id'");
              if($query){
            header('Location: ../koga.php?drsta');
          }
        }
?>