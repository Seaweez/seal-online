<?php 
if(strlen($_POST['username']) < 5){
	echo "ชื่อต้องมากกว่า 7 ตัวอักษร";
}elseif (!preg_match('/^[a-z0-9_\s]+$/i', $_POST['username'])) {
	echo "ห้ามใช้ชื่อภาษาไทยครับบบ";
}else{
	include '../oop.php';
	$por = new seal;
	$login = $por->login($_POST['username'],$_POST['password']);
	echo $login;
}
?>