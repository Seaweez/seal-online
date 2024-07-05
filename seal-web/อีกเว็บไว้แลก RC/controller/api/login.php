<?php 
if (empty($_POST['username'])) {
	$message['status'] = "error";
	$message['info'] = "กรุณาใส่ชื่อผู้ใช้งาน";
}elseif (empty($_POST['password'])) {
	$message['status'] = "error";
	$message['info'] = "กรุณากรอกรหัสผ่าน";
}else{
	$message = $class->login($_POST['username'],$_POST['password']);
}
echo json_encode($message);
?>