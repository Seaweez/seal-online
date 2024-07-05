<?php 
if ($_POST['oldpassword'] == NULL) {
	echo "Fuck";
}else{
	include '../oop.php';
	$seal = new seal;
	$changpassword = $seal->changpassword($_POST['oldpassword'],$_POST['password']);
	echo $changpassword;
}
?>