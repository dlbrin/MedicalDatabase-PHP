<?php include '../includes/config.php' ?>

<?php
if(isset($_POST['first_submit'])){
	$name = sec($_POST['name']);
	$age = sec($_POST['age']);
	$address = sec($_POST['address']);
	$number = sec($_POST['number']);
	$date = sec($_POST['date']);
	$times = date("h:i:a");
	$types = implode(',', $_POST['type']);
	$genders = implode(',', $_POST['gender']);
	$sources = implode(',', $_POST['source']);
    $query = mysqli_query($db , "INSERT INTO `sick`(`name` , `age` , `address` , `number` , `date` , `times` , `types_of_transplant` , `gender` , `source`) VALUES ('$name' , '$age' , '$address' , '$number' , '$date' , '$times' , '" . $types . "' , '" . $genders . "' , '" . $sources . "')");
    if($query){
    	header('Location: ../new_reception.php?drsta');
    }
}
//edit data reception view
if(isset($_POST['edit_submit'])){
    $edit_name = sec($_POST['edit_name']);
    $edit_age = sec($_POST['edit_age']);
    $edit_address = sec($_POST['edit_address']);
    $edit_number = sec($_POST['edit_number']);
    $edit_date = sec($_POST['edit_date']);
    $edit_type = implode(',', $_POST['edit_type']);
    $edit_gender = implode(',', $_POST['edit_gender']);
    $edit_source = implode(',', $_POST['edit_source']);
    $edit_reception = mysqli_real_escape_string($db, $_POST['id']);

    $query = mysqli_query($db , "UPDATE `sick` SET `name`='$edit_name' , `age`='$edit_age' , `address`='$edit_address' , `number`='$edit_number' , `date`='$edit_date' , `types_of_transplant`='" . $edit_type . "' ,  `gender`='" . $edit_gender . "' ,  `source`='" . $edit_source . "' WHERE `id` = '$edit_reception'");
              if($query){
            header("Location: ../view_reception.php?num=$edit_reception");
          }
        }
        
//edit data reception
if(isset($_POST['reception_edit'])){
    $name_edit = sec($_POST['name_edit']);
    $date_edit = sec($_POST['date_edit']);
    $address_edit = sec($_POST['address_edit']);
    $number_edit = sec($_POST['number_edit']);
    $id_reception = mysqli_real_escape_string($db, $_POST['id']);

    $query = mysqli_query($db , "UPDATE `sick` SET `name`='$name_edit' , `date`='$date_edit' , `address`='$address_edit' , `number`='$number_edit' WHERE `id` = '$id_reception'");
              if($query){
            header('Location: ../new_reception.php?update');
          }
        }

        //delete data reception
if(isset($_GET['delete_reception'])){
    $id = htmlspecialchars($_GET['delete_reception']);
    $query = mysqli_query($db , "DELETE FROM `sick` WHERE `id` = '$id'");
    if($query){
        header('Location: ../new_reception.php?delete');
    }
}

//edit data doctor
if(isset($_POST['insert_doc'])){
    $hair_round = implode(',', $_POST['hair_round']);
    $banck = implode(',', $_POST['banck']);
    $bht = sec($_POST['bht']);
    $mid = implode(',', $_POST['mid']);
    $high_price = sec($_POST['high_price']);
    $low_price = sec($_POST['low_price']);
    $id_edit = mysqli_real_escape_string($db, $_POST['id']);

    $query = mysqli_query($db , "UPDATE `sick` SET `hair_round`='" . $hair_round . "' , `banck`='" . $banck . "' , `bht`='$bht' , `mid`='" . $mid . "' , `high_price`='$high_price' , `low_price`='$low_price' , `confirm_doctor`='1' WHERE `id` = '$id_edit'");
              if($query){
            header('Location: ../show_personal.php?update');
          }
        }
        
//edit data doctor
if(isset($_POST['edit_doc'])){
    $hair_round_edit = implode(',', $_POST['hair_round_edit']);
    $banck_edit = implode(',', $_POST['banck_edit']);
    $bht_edit = sec($_POST['bht_edit']);
    $mid_edit = implode(',', $_POST['mid_edit']);
    $edit_hprice = sec($_POST['edit_hprice']);
    $edit_lprice = sec($_POST['edit_lprice']);
    $id_doc = mysqli_real_escape_string($db, $_POST['id']);

    $query = mysqli_query($db , "UPDATE `sick` SET `hair_round`='" . $hair_round_edit . "' , `banck`='" . $banck_edit . "' , `bht`='$bht_edit' , `mid`='" . $mid_edit . "' , `high_price`='$edit_hprice' , `low_price`='$edit_lprice' WHERE `id` = '$id_doc'");
              if($query){
            header("Location: ../edit_doctor.php?num=$id_doc");
          }
}

//delete data dctor
if(isset($_GET['delete_doctor'])){
    $id = htmlspecialchars($_GET['delete_doctor']);
    $query = mysqli_query($db , "DELETE FROM `sick` WHERE `id` = '$id'");
    if($query){
        header('Location: ../show_personal.php?delete');
    }
}


        //edit data edara
if(isset($_POST['insert_edara'])){
    $price = sec($_POST['price']);
    $pre_price = sec($_POST['pre_price']);
    $surgery_date = sec($_POST['surgery_date']);
    $sick_note_val = sec($_POST['sick_note_val']);
    $answer = sec($_POST['answer']);
    $prp_plus = sec($_POST['prp_plus']);
    $meso_plus = sec($_POST['meso_plus']);
    $id_edit_1 = mysqli_real_escape_string($db, $_POST['id']);
    
    if(empty($answer)){
         header("Location: ../edara.php?id=$id_edit_1");
    }else{
    $query = mysqli_query($db , "UPDATE `sick` SET `price`='$price' , `pre_price`='$pre_price' , `surgery_date`='$surgery_date' , `sick_note`='$sick_note_val' , `answer`='$answer' ,  `prp_plus` = '$prp_plus' , `meso_plus` = '$meso_plus' , `confirm_edara`='1' WHERE `id` = '$id_edit_1'");
              if($query){
            header('Location: ../show_edara_card.php?update');
          }
        }
}

        //delete data edara
if(isset($_GET['delete_edara'])){
    $id = htmlspecialchars($_GET['delete_edara']);
    $query = mysqli_query($db , "DELETE FROM `sick` WHERE `id` = '$id'");
    if($query){
        header('Location: ../show_edara_card.php?delete');
    }
}

//         //edit sick note
// if(isset($_POST['sick_note'])){
    
//     $id_edit_sick = mysqli_real_escape_string($db, $_POST['id']);


//     $query = mysqli_query($db , "UPDATE `sick` SET `sick_note`='$sick_note_val' WHERE `id` = '$id_edit_sick'");
//               if($query){
//             header('Location: ../home.php?update');
//           }
//         }

//insert images
if(isset($_POST["img_sub"])){
    $img_link = sec($_POST['img_link']);
    $id_img = mysqli_real_escape_string($db, $_POST['id']);
    if(empty($img_link)){
        header("Location: ../profile.php?num=$id_img?error");
    }else{
         $query = mysqli_query($db , "UPDATE `sick` SET `img_link`= '$img_link' WHERE `id` = '$id_img' ");
            if ($query) {
                header("Location: ../profile.php?num=$id_img");
            }

        }
}

if(isset($_POST['insert_doctor_view'])){
     $history_loss = implode(',', $_POST['history_loss']);
     $smoke_yesno = implode(',', $_POST['smoke_yesno']);
     $smoke_dose = sec($_POST['smoke_dose']);
     $alcohol_yesno = implode(',', $_POST['alcohol_yesno']);
     $alcohol_dose = sec($_POST['alcohol_dose']);
     $hookah_yesno = implode(',', $_POST['hookah_yesno']);
     $hookah_dose = sec($_POST['hookah_dose']);
     $opium_yesno = implode(',', $_POST['opium_yesno']);
     $opium_dose = sec($_POST['hookah_dose']);

     $loss_pattern = implode(',', $_POST['loss_pattern']);
     $density = implode(',', $_POST['density']);
     $appearance = implode(',', $_POST['appearance']);
     $hairlossprogress = implode(',', $_POST['hairlossprogress']);
     $physiciannote_donor = sec($_POST['physiciannote_donor']);
     $surgical_procedure = implode(',', $_POST['surgical_procedure']);

     $frontal = sec($_POST['frontal']);
     $mid_scalp = sec($_POST['mid_scalp']);
     $vertex = sec($_POST['vertex']);
     $other_plan = sec($_POST['other_plan']);
     $physiciannote_plan = sec($_POST['physiciannote_plan']);
     $sick_id = sec($_POST['id']);
     $query = mysqli_query($db , "UPDATE `sick` SET `Family_History_of_Hair_Loss` = '$history_loss' , `smoke_yesno` = '" . $smoke_yesno . "' , `smoke_dose` = '$smoke_dose' , `alcohol_yesno` = '" . $alcohol_yesno . "' , `alcohol_dose` = '$alcohol_dose' , `hookah_yesno` = '" . $hookah_yesno . "' , `hookah_dose` = '$hookah_dose' , `opium_yesno` = '" . $opium_yesno . "' , `opium_dose` = '$opium_dose' , `hair_loss_pattern` = '" . $loss_pattern . "'  , `density` = '" . $density . "'  , `appearance` = '" . $appearance . "'  , `hair_loss_progress` = '" . $hairlossprogress . "' , `physiciannote_donor` = '$physiciannote_donor' , `surgical_procedure` = '" . $surgical_procedure . "' , `frontal` = '$frontal' , `mid_scalp` = '$mid_scalp' , `vertex` = '$vertex' , `other_plan` = '$other_plan' , `physiciannote_plan` = '$physiciannote_plan' WHERE `id` = '$sick_id'");
     if ($query) {
                header("Location: ../profile.php?num=$sick_id");
            }


}


if(isset($_POST['insert_doctor_view'])){
    $anemia =  sec($_POST['anemia']);
    $anemia_yesno = implode(',', $_POST['anemia_yesno']);
    $anemia_more_explain =  sec($_POST['anemia_more_explain']);
    $anemia_medication =  sec($_POST['anemia_medication']);

    $cardiovascular =  sec($_POST['cardiovascular']);
    $cardiovascular_yesno = implode(',', $_POST['cardiovascular_yesno']);
    $cardiovascular_more_explain =  sec($_POST['cardiovascular_more_explain']);
    $cardiovascular_medication =  sec($_POST['cardiovascular_medication']);

    $hypertension =  sec($_POST['hypertension']);
    $hypertension_yesno = implode(',', $_POST['hypertension_yesno']);
    $hypertension_more_explain =  sec($_POST['hypertension_more_explain']);
    $hypertension_medication =  sec($_POST['hypertension_medication']);

    $diabetes =  sec($_POST['diabetes']);
    $diabetes_yesno = implode(',', $_POST['diabetes_yesno']);
    $diabetes_more_explain =  sec($_POST['diabetes_more_explain']);
    $diabetes_medication =  sec($_POST['diabetes_medication']);

    $asthma =  sec($_POST['asthma']);
    $asthma_yesno = implode(',', $_POST['asthma_yesno']);
    $asthma_more_explain =  sec($_POST['asthma_more_explain']);
    $asthma_medication =  sec($_POST['asthma_medication']);

    $skin_disease =  sec($_POST['skin_disease']);
    $skindisease_yesno = implode(',', $_POST['skindisease_yesno']);
    $skindisease_more_explain =  sec($_POST['skindisease_more_explain']);
    $skindisease_medication =  sec($_POST['skindisease_medication']);

    $allergy =  sec($_POST['allergy']);
    $allergy_yesno = implode(',', $_POST['allergy_yesno']);
    $allergy_more_explain =  sec($_POST['allergy_more_explain']);
    $allergy_medication =  sec($_POST['allergy_medication']);

    $kidney_disease =  sec($_POST['kidney_disease']);
    $kidneydisease_yesno = implode(',', $_POST['kidneydisease_yesno']);
    $kidneydisease_more_explain =  sec($_POST['kidneydisease_more_explain']);
    $kidneydisease_medication =  sec($_POST['kidneydisease_medication']);

    $kidney_disease =  sec($_POST['kidney_disease']);
    $kidneydisease_yesno = implode(',', $_POST['kidneydisease_yesno']);
    $kidneydisease_more_explain =  sec($_POST['kidneydisease_more_explain']);
    $kidneydisease_medication =  sec($_POST['kidneydisease_medication']);

    $epilepsy =  sec($_POST['epilepsy']);
    $epilepsy_yesno = implode(',', $_POST['epilepsy_yesno']);
    $epilepsy_more_explain =  sec($_POST['epilepsy_more_explain']);
    $epilepsy_medication =  sec($_POST['epilepsy_medication']);

    $gastrointestinal_disorders =  sec($_POST['gastrointestinal_disorders']);
    $gastrointestinaldisorders_yesno = implode(',', $_POST['gastrointestinaldisorders_yesno']);
    $gastrointestinaldisorders_more_explain =  sec($_POST['gastrointestinaldisorders_more_explain']);
    $gastrointestinaldisorders_medication =  sec($_POST['gastrointestinaldisorders_medication']);

    $coagulopathy_disorders =  sec($_POST['coagulopathy_disorders']);
    $coagulopathydisorders_yesno = implode(',', $_POST['coagulopathydisorders_yesno']);
    $coagulopathydisorders_more_explain =  sec($_POST['coagulopathydisorders_more_explain']);
    $coagulopathydisorders_medication =  sec($_POST['coagulopathydisorders_medication']);

    $psychiatric_disorders =  sec($_POST['psychiatric_disorders']);
    $psychiatricdisorders_yesno = implode(',', $_POST['psychiatricdisorders_yesno']);
    $psychiatricdisorders_more_explain =  sec($_POST['psychiatricdisorders_more_explain']);
    $psychiatricdisorders_medication =  sec($_POST['psychiatricdisorders_medication']);

    $historyofprevioussurgery =  sec($_POST['historyofprevioussurgery']);
    $historyofprevioussurgery_yesno = implode(',', $_POST['historyofprevioussurgery_yesno']);
    $historyofprevioussurgery_more_explain =  sec($_POST['historyofprevioussurgery_more_explain']);
    $historyofprevioussurgery_medication =  sec($_POST['historyofprevioussurgery_medication']);

    $other =  sec($_POST['other']);
    $other_yesno = implode(',', $_POST['other_yesno']);
    $other_more_explain =  sec($_POST['other_more_explain']);
    $other_medication =  sec($_POST['other_medication']);

    $sick_id = sec($_POST['id']);
     $query = mysqli_query($db , "INSERT INTO `medical_history`(`Anemia` , `Anemia_Yes_No` , `Anemia_More_Explain` , `Anemia_Medication` , `Cardiovascular` , `Cardiovascular_Yes_No` , `Cardiovascular_More_Explain` , `Cardiovascular_Medication` , `Hypertension` , `Hypertension_Yes_No` , `Hypertension_More_Explain` , `Hypertension_Medication` , `Diabetes` , `Diabetes_Yes_No` , `Diabetes_More_Explain` , `Diabetes_Medication` , `Asthma` , `Asthma_Yes_No` , `Asthma_More_Explain` , `Asthma_Medication` , `Skin_disease` , `Skin_disease_Yes_No` , `Skin_disease_More_Explain` , `Skin_disease_Medication`  , `Allergy` , `Allergy_disease_Yes_No` , `Allergy_disease_More_Explain` , `Allergy_disease_Medication` , `Kidney_disease` , `Kidney_disease_Yes_No` , `Kidney_disease_More_Explain` , `Kidney_disease_Medication` , `Epilepsy` , `Epilepsy_disease_Yes_No` , `Epilepsy_disease_More_Explain` , `Epilepsy_disease_Medication` , `Gastrointestinal_Disorders` , `Gastrointestinal_Disorders_Yes_No` , `Gastrointestinal_Disorders_More_Explain` , `Gastrointestinal_Disorders_Medication` , `Coagulopathy_disorders` , `Coagulopathy_disorders_Yes_No` , `Coagulopathy_disorders_More_Explain` , `Coagulopathy_disorders_Medication` , `Psychiatric_disorders` , `Psychiatric_disorders_Yes_No` , `Psychiatric_disorders_More_Explain` , `Psychiatric_disorders_Medication` , `History_of_previous_surgery` , `History_of_previous_surgery_Yes_No` , `History_of_previous_surgery_More_Explain` , `History_of_previous_surgery_Medication` , `Other` , `Other_Yes_No` , `Other_More_Explain` , `Other_Medication` , `sick_id`) VALUES ('$anemia' , '" . $anemia_yesno . "' , '$anemia_more_explain' , '$anemia_medication' , '$cardiovascular' , '" . $cardiovascular_yesno . "' , '$cardiovascular_more_explain' , '$cardiovascular_medication' , '$hypertension' , '" . $hypertension_yesno . "' , '$hypertension_more_explain' , '$hypertension_medication' , '$diabetes' , '" . $diabetes_yesno . "' , '$diabetes_more_explain' , '$diabetes_medication' , '$asthma' , '" . $asthma_yesno . "' , '$asthma_more_explain' , '$asthma_medication' , '$skin_disease' , '" . $skindisease_yesno . "' , '$skindisease_more_explain' , '$skindisease_medication' , '$allergy' , '" . $allergy_yesno . "' , '$allergy_more_explain' , '$allergy_medication' , '$kidney_disease' , '" . $kidneydisease_yesno . "' , '$kidneydisease_more_explain' , '$kidneydisease_medication' , '$epilepsy' , '" . $epilepsy_yesno . "' , '$epilepsy_more_explain' , '$epilepsy_medication' , '$gastrointestinal_disorders' , '" . $gastrointestinaldisorders_yesno . "' , '$gastrointestinaldisorders_more_explain' , '$gastrointestinaldisorders_medication' , '$coagulopathy_disorders' , '" . $coagulopathydisorders_yesno . "' , '$coagulopathydisorders_more_explain' , '$coagulopathydisorders_medication' , '$psychiatric_disorders' , '" . $psychiatricdisorders_yesno . "' , '$psychiatricdisorders_more_explain' , '$psychiatricdisorders_medication' , '$historyofprevioussurgery' , '" . $historyofprevioussurgery_yesno . "' , '$historyofprevioussurgery_more_explain' , '$historyofprevioussurgery_medication' , '$other' , '" . $other_yesno . "' , '$other_more_explain' , '$other_medication' , '$sick_id') ");
            if ($query) {
                header("Location: ../profile.php?num=$sick_id");
            }
}



//enter signature
if(isset($_POST['doctor_signature'])){
    $cm = sec($_POST['cm']);
    $date = sec($_POST['date']);
    $sick_name = sec($_POST['sick_name']);
    $sick_id = sec($_POST['id']);

    $file = $_FILES['technician'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
  
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileAllowed = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif' , 'jfif');
  
    if(in_array($fileActualExt , $fileAllowed)){
      if($fileError === 0){
        if($fileSize < 10000000){
  
          $fileNewName = rand().".".$fileActualExt;
          $fileDestinition = "../assets/uploads/$fileNewName";
          move_uploaded_file($fileTmpName , $fileDestinition);

    $query = mysqli_query($db , "INSERT INTO `sick_signature`(`sick_name` , `cm` , `date` , `technician`) VALUES ('$sick_name' , '$cm' , '$date' , '$fileNewName')");
    if ($query) {
                header("Location: ../profile.php?num=$sick_id");
            }
}
}
}
}



//edit adminstartion
if(isset($_POST['edit_adminstration'])){
    $edit_price = sec($_POST['edit_price']);
    $edit_pre_price = sec($_POST['edit_pre_price']);
    $edit_surgery_date = sec($_POST['edit_surgery_date']);
    $edit_answer = sec($_POST['edit_answer']);
    $eprp_plus = sec($_POST['eprp_plus']);
    $emeso_plus = sec($_POST['emeso_plus']);
    $id_admin = mysqli_real_escape_string($db, $_POST['id']);

    $query = mysqli_query($db , "UPDATE `sick` SET `price`='$edit_price' , `pre_price`='$edit_pre_price' , `surgery_date`='$edit_surgery_date' , `answer`='$edit_answer' , `prp_plus` = '$eprp_plus' , `meso_plus` = '$emeso_plus'  WHERE `id` = '$id_admin'");
              if($query){
            header("Location: ../profile.php?num=$id_admin");
          }
        }
        
        
        
        //enter library
if(isset($_POST['library_sub'])){
    $library = sec($_POST['library']);
    $library_id = sec($_POST['id']);  
    if(empty($library)){
        header("Location: ../profile.php?num=$library_id?error");
    }else{
    $query = mysqli_query($db , "UPDATE `sick` SET `library` = '$library' WHERE `id` = '$library_id'");
    if ($query) {
                header("Location: ../profile.php?num=$library_id");
            }
}
}

?>