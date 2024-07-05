<?php 
if(!empty($_POST['reward'])) {
	$message = $class->topup_reward($_POST['reward']-1);
} else {
	if(empty($_POST['reward_lv'])) {
		$message['status'] = "error";
		$message['info'] = "กรุณาเลือกโปรโมชั่น";
	} else {
		$message = $class->get_rewarddata($_POST['reward_lv']-1);
	}
}
echo json_encode($message);
?>