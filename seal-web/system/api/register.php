<?php 
if ($_POST['recapcha'] !== $_POST['porrecapcha']) {
	echo "kuy";
}elseif(strlen($_POST['username']) < 7){
	echo "กรุณาตั่งชื่อให้มากกว่า 7 ตัวอักษร";
}elseif (!preg_match('/^[a-z0-9_\s]+$/i', $_POST['username'])) {
	echo "ห้ามใช้ชื่อภาษาไทยครับบบ";
}else{
	include '../oop.php';
	$por = new seal;
	$register = $por->register($_POST['username'],$_POST['password'],$_POST['email']);
	echo $register;
}
exit();
?>
