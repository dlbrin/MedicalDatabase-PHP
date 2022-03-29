<?php
session_start();
$db = mysqli_connect('localhost','root','','arinadatabase');
if (!$db){
	echo mysqli_connect_error($db);
	echo "DataBase Niya";
}
date_default_timezone_set("Asia/Baghdad");
function sec($data){
    global $db;
    $data = mysqli_real_escape_string($db,htmlspecialchars($data));
    return $data;
}

function dla($condition){
	global $db;
	$query = mysqli_query($db , "SELECT * FROM $condition");
	echo mysqli_num_rows($query);
}

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

if(isset($_SESSION['reception'])){
    $reception = $_SESSION['reception'];
}

if(isset($_SESSION['plazma'])){
    $plazma = $_SESSION['plazma'];
}

if(isset($_SESSION['superadmin'])){
    $superadmin = $_SESSION['superadmin'];
}

if(isset($_SESSION['edara'])){
    $edara = $_SESSION['edara'];
}

if(isset($_SESSION['replay'])){
    $replay = $_SESSION['replay'];
}

if(isset($_SESSION['ahmed'])){
    $ahmed = $_SESSION['ahmed'];
}


if(isset($_GET['logout'])){
    session_unset();
    unset($_SESSION['userid']);
    session_destroy();
    header('Location: index.php');
    }


?>