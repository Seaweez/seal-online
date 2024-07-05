<?php 
include '../oop.php';
$seal = new seal;
if ($_POST['method'] == "Point") {
	$clear = $seal->clearheadpoint($_POST['slo']);
	echo $clear;
}elseif ($_POST['method'] == "Money") {
	$clear = $seal->clearheadm($_POST['slo']);
	echo $clear;
}else{
	echo "กรุณาเลือกช่องทาง";
}
?>