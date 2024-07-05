<?php
// Created by Ghilman
// isghilman@gmail.com or fb.me/ghilmaanrashif

session_start();
// error_reporting(0);
if (empty($_POST['eventid'])) {
	echo "รหัสเหตุการณ์ไม่ถูกต้อง";
} else {
	include '../config.php';
	include '../oop.php';
	if (!defined('GHIL')) exit('No direct script access allowed');
	
	$seal = new seal;
	$eventid = $_POST['eventid'];
	$event_name = null;
	$require_item_id = null;
	$require_item_io = null;
	$reward_item_id = null;
	$reward_item_io = null;
	$reward_item_ioo = null;

	// get name
	$a = dd_q('SELECT event_name FROM login_event WHERE id = ?', [$eventid]);
	$b = dd_q('SELECT require_item_name FROM login_event WHERE id = ?', [$eventid]);
	$c = dd_q('SELECT require_item_id FROM login_event WHERE id = ?', [$eventid]);
	$d = dd_q('SELECT require_item_io FROM login_event WHERE id = ?', [$eventid]);
	$e = dd_q('SELECT reward_item_name FROM login_event WHERE id = ?', [$eventid]);
	$f = dd_q('SELECT reward_item_id FROM login_event WHERE id = ?', [$eventid]);
	$g = dd_q('SELECT reward_item_io FROM login_event WHERE id = ?', [$eventid]);
	$h = dd_q('SELECT reward_item_ioo FROM login_event WHERE id = ?', [$eventid]);

	if ($n !== false) {
		$event_name = @$a->fetch()[0];
		$require_item_name = @$b->fetch()[0];
		$require_item_id = @$c->fetch()[0];
		$require_item_io = @$d->fetch()[0];
		$reward_item_name = @$e->fetch()[0];
		$reward_item_id = @$f->fetch()[0];
		$reward_item_io = @$g->fetch()[0];
		$reward_item_ioo = @$h->fetch()[0];

		$userinfo = $seal->userinfo();
		$uid = $userinfo['id'];
		
		$store = $seal->fetchStore();
		if($store) {
			$msg = false;

			// get requirement
			$require_check = false;
			$i_fix = 0;
			$io = 0;
			for ($i = 0; $i <= 79; $i++) {
				if ($store['it' . $i] == $require_item_id && $store['io' . $i] >= $require_item_io) {
					$require_check = true;
					$i_fix = $i;
					$io = $store['io' . $i];
					// $check = $seal->fetchStoreItem($_SESSION['username'], $i, $require_item_id, $require_item_io);
					// if($check > 0) {
					// }
				}
			}
			// var_dump($require_check);die;

			if($require_check) {
				// var_dump($io);
				// var_dump($require_item_io);
				if($io == $require_item_io) {
					$seal->updateStore($_SESSION['username'], $i_fix, 0, 0, 0);
				} else {
					$io_minus = $io - $require_item_io;
					$seal->updateStore($_SESSION['username'], $i_fix, $require_item_id, $io_minus, 0);
				}

				// get reward
				$i = 0;
				for ($i = 0; $i <= 79; $i++) {
					if(!$msg) {
						if ($store['it' . $i] == 0) {
							$seal->updateStore($_SESSION['username'], $i, $reward_item_id, $reward_item_io, $reward_item_ioo);
							$msg = true;
							// return $msg;
						}
					}
				}

				if ($msg) {
					// history
					$his = dd_q('INSERT INTO login_event_history (user_id, event_name, require_item_name, require_item_id, require_item_io, reward_item_name, reward_item_id, reward_item_io, reward_item_ioo, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$_SESSION['username'], $event_name, $require_item_name, $require_item_id, $require_item_io, $reward_item_name, $reward_item_id, $reward_item_io, $reward_item_ioo, date('Y-m-d H:i:s')]);
					if ($his) {
						$response = "success";
					} else {
						$response = "ระบบผิดพลาด 1";
					}
				} else {
					$response = "ระบบผิดพลาด 2 ";
				}
			} else {
				$response = 'Item not meet the requirement !';
			}
		}
	}

	echo $response;
}
