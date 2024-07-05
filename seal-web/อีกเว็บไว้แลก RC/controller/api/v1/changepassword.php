<?php 
if (empty($_POST['passwordold'])) {
	$message['status'] = "error";
	$message['info'] = "กรุณากรอกรหัสผ่านเดิม";
}elseif (empty($_POST['passwordnew'])){
	$message['status'] = "error";
	$message['info'] = "กรุณากรอกรหัสผ่านใหม่";
}else{
	$message = $class->changpassword($_POST['passwordold'],$_POST['passwordnew']);
}
echo json_encode($message);

?>