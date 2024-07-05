<?php
if (empty($_SESSION['user_name'])) {
	$message['status'] = "error";
	$message['info'] = "พบข้อผิดพลาด, กรุณาลองใหม่!";
} else {
    $message = $class->kickplayer($_POST['id']);
}

echo json_encode($message);

?>