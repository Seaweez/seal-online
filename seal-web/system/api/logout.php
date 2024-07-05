<?php
include '../oop.php'; 
if ($_SESSION['username'] == NULL) {
	echo "Fuck";
}else{
	$seal = new seal;
	$logout = $seal->logout();
	echo $logout;
}
 ?>
