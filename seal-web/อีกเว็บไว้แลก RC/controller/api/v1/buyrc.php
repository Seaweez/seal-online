<?php
if (empty($_POST['count'])) {
	$message['status'] = "error";
	$message['info'] = "กรุณากรอกจำนวนที่ต้องการซื้อ";
}elseif (!is_numeric($_POST['count'])) {
	$message['status'] = "error";
	$message['info'] = "กรอกได้เฉพาะตัวเลขเท่านั้น!";
}elseif ($_POST['count'] > $class->userinfo()['point']/100 || $_POST['count'] < 0) {
	$message['status'] = "error";
	$message['info'] = "จำนวนเงินไม่พอ";
}else{
	$message = $class->buyrc($_POST['count']);
}
echo json_encode($message);
?>