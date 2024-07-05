<?php 
if(empty($_POST['type'])) {
	$message['status'] = "error";
	$message['info'] = "ไม่สามารถระบุรูปแบบการเติมเงินได้";
}else{
	$ref = $class->clean($_POST['ref']);
	$type = $class->clean($_POST['type']);
	if(empty($ref)) {
		$message['status'] = "error";
		$message['info'] = "กรุณากรอกข้อมูลการเติมเงินให้ครบถ้วน";
	} else {
		if($type === 'bank') { 
			$ref = $class->cfg['bank']['con_id'].$ref;
		}
		$message = $class->topup($ref, $type);
	}
}
echo json_encode($message);
?>