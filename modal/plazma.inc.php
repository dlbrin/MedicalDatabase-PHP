<?php include '../includes/config.php' ?>
<?php
//edit plazma 
if(isset($_POST['plazma_sumbit'])){
    $control = sec($_POST['control']);
    $control_confirm = sec($_POST['control_confirm']);
    $prp = sec($_POST['prp']);
    $prp_confirm = sec($_POST['prp_confirm']);
    $meso = sec($_POST['meso']);
    $meso_confirm = sec($_POST['meso_confirm']);
    $plazma_note = sec($_POST['plazma_note']);
    $id = sec($_POST['id']);
    $query = mysqli_query($db , "UPDATE `sick` SET `control` = '$control' , `control_confirm` = '$control_confirm' , `prp` = '$prp' , `prp_confirm` = '$prp_confirm' , `meso` = '$meso' , `meso_confirm` = '$meso_confirm' , `plazma_note` = '$plazma_note' WHERE `id` = '$id'");
              if($query){
            header('Location: ../plazma.php?drsta');
          }
        }
?>