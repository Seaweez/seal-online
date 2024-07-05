<?php 
session_start();
if (empty($_SESSION['darkmode'])) {
	$_SESSION['darkmode'] = "1";
	$message['dark'] = $_SESSION;
}else{
	unset($_SESSION['darkmode']);
}
$message['status'] = "success";
$message['info'] = "success";
echo json_encode($message);

?>