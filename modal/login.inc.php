<?php include '../includes/config.php' ?>

<?php
if(isset($_POST['submit'])){
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

if(empty($email) || empty($password)){
    header("Location:../index.php");
}else{
    $password = hash('gost', $password); 
    $query = mysqli_query($db , "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");
    if(mysqli_num_rows($query) == 1){
        while($row = mysqli_fetch_assoc($query)){
            $role = sec($row['role']);
            if($role == 'reception' OR $role == 'superadmin'){
                $_SESSION['reception'] = sec($row['role']);
            }
            if($role == 'plazma' OR $role == 'superadmin'){
                $_SESSION['plazma'] = sec($row['role']);
            }
            if($role == 'superadmin'){
                $_SESSION['superadmin'] = sec($row['role']);
            }
            if($role == 'edara' OR $role == 'superadmin'){
                $_SESSION['edara'] = sec($row['role']);
            }
            if($role == 'edara' OR $role == 'superadmin' OR $role == 'reception'){
                $_SESSION['replay'] = sec($row['role']);
            }
            if($role == 'ahmed' OR $role == 'superadmin'){
                $_SESSION['ahmed'] = sec($row['role']);
            }
            $_SESSION['userid'] = sec($row['id']);
            header('Location: ../home.php');
        }
        die();
    }else{
        header("Location:../index.php");
    }
}
}
?>