<?php
if (empty($_POST['rc'])) {
	$message['status'] = "error";
	$message['info'] = "กรุณากรอกจำนวน RC";
}elseif (!is_numeric($_POST['rc'])) {
	$message['status'] = "error";
	$message['info'] = "กรอกเวลาได้เฉพาะตัวเลขเท่านั้น!";
}elseif ($_POST['rc'] > $class->showrc() | $_POST['rc'] < 0) {
	$message['status'] = "error";
	$message['info'] = "จำนวน RC ไม่พอ";
}else{
	$message = $class->trade($_POST['rc']);
}
echo json_encode($message);
?>