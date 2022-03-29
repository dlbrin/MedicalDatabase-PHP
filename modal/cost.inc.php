<?php include '../includes/config.php' ?>




<?php
//insert slfa
if(isset($_POST['slfa_submit'])){
    $slfa = sec($_POST['slfa']);
    $slfa_date = sec($_POST['slfa_date']);

    $query = mysqli_query($db , "INSERT INTO `slfa`(`slfa_price` , `date`) VALUES ('$slfa' , '$slfa_date')");
    if ($query) {
                header("Location: ../new_cost.php?drsta");
            }
}

//insert cost
if(isset($_POST['cost_submit'])){
    $subject = sec($_POST['subject']);
    $price = sec($_POST['price']);
    $date = sec($_POST['date']);
    $form_num = sec($_POST['form_num']);
    $note = sec($_POST['note']);
    $slfa_id = sec($_POST['slfa_id']);


    $query = mysqli_query($db , "INSERT INTO `cost`(`subject` , `price` , `date` , `form_num` , `note` , `slfa_id`) VALUES ('$subject' , '$price' , '$date' , '$form_num' , '$note' , '$slfa_id' )");
    if ($query) {
                header("Location: ../cost.php?slfa_id=$slfa_id");
            }
}

//edit slfa
if(isset($_POST['edit'])){
    $slfa_edit = sec($_POST['slfa_edit']);
    $date_edit = sec($_POST['date_edit']);
    $id = sec($_POST['id']);


    $query = mysqli_query($db , "UPDATE `slfa` SET `slfa_price` = '$slfa_edit' , `date` = '$date_edit' WHERE `id` = '$id'");
    if ($query) {
                header("Location: ../new_cost.php?drsta");
            }
}

//edit cost
if(isset($_POST['edit_cost'])){
    $edit_subject = sec($_POST['edit_subject']);
    $edit_price = sec($_POST['edit_price']);
    $edit_date = sec($_POST['edit_date']);
    $edit_form_num = sec($_POST['edit_form_num']);
    $edit_note = sec($_POST['edit_note']);
    $cost_id = sec($_POST['id']);


    $query = mysqli_query($db , "UPDATE `cost` SET `subject` = '$edit_subject' , `price` = '$edit_price' , `date` = '$edit_date' , `form_num` = '$edit_form_num' , `note` = '$edit_note' WHERE `id` = '$cost_id'");
    if ($query) {
                header("Location: ../cost.php?slfa_id=$cost_id");
            }
}


//delete cost
if(isset($_GET['delete'])){
    $id = htmlspecialchars($_GET['delete']);
    $cost_id = sec($_POST['id']);
    $query = mysqli_query($db , "DELETE FROM `cost` WHERE `id` = '$id'");
    if($query){
        header("Location: ../new_cost.php?delete");
    }
}
?>

