<?php
include 'includes/config.php';

if($userid == false){
header('Location: index.php');
}
if($superadmin == false){
header('Location: home.php');
}

    error_reporting(0);

	include 'backup_function.php';

	if(isset($_POST['backupnow'])){
		
		$server = htmlspecialchars($_POST['server']);
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$dbname = htmlspecialchars($_POST['dbname']);
		
		backDb($server, $username, $password, $dbname);

		exit();
		
	}
	else{
		echo 'Add All Required Field';
	}

?>
<script language=JavaScript>
		<!--
		var message="Function Disabled!";
		///////////////////////////////////
		function clickIE4(){
		if (event.button==2){
		alert(message);
		return false;
		}
		}
		function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
		if (e.which==2||e.which==3){
		alert(message);
		return false;
		}
		}
		}
		if (document.layers){
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown=clickNS4;
		}
		else if (document.all&&!document.getElementById){
		document.onmousedown=clickIE4;
		}
		document.oncontextmenu=new Function("return false")
		// ->
		</script>