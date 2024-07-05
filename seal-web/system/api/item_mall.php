<?php
// Created by Ghilman
// isghilman@gmail.com or fb.me/ghilmaanrashif

session_start();
error_reporting(0);
if (empty($_POST['itemid'])) {
	echo "กรุณาอย่าเหลี่ยม ซื้อแบบดีๆเถอะ";
} else {
	include '../config.php';
	include '../oop.php';
	if (!defined('GHIL')) exit('No direct script access allowed');

	$seal = new seal;
	$itemid = $_POST['itemid'];
	$quantity = null;
	$response = null;
	$itemname = null;
	$name = null;
	$price = null;
	$limit = null;
	$type = null;

	// get name
	$n = dd_q('SELECT name FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);
	// get price
	$p = dd_q('SELECT price FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);

	$t = dd_q('SELECT type FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);
	$a = dd_q('SELECT item_id FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);
	$b = dd_q('SELECT item_io FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);
	$c = dd_q('SELECT item_limit FROM itemmall_item WHERE id = ? LIMIT 1', [$itemid]);

	if ($q !== false && $i !== false && $p !== false) {
		$name = @$n->fetch()[0];
		$price = @$p->fetch()[0];
		$type = @$t->fetch()[0];
		$item_id = @$a->fetch()[0];
		$item_io = @$b->fetch()[0];
		$item_limit = @$c->fetch()[0];

		$userinfo = $seal->userinfo();
		$uid = $userinfo['id'];
		if ($userinfo['point'] >= $price) {
			$quantity = $quantity - 1;
			$mes = $seal->buyitem_mall($item_id, $item_io, $price, $item_limit);

			if ($mes !== false) {
				// history
				$his = dd_q('INSERT INTO itemmall_history (user_id, item_name, type, item_id, item_io, date) VALUES (?, ?, ?, ?, ?, ?)', [$_SESSION['username'], $name, $type, $item_id, $item_io, date('Y-m-d H:i:s')]);
				if ($his) {
					$response = "success";
				} else {
					$response = "ระบบผิดพลาด 1";
				}
			} else {
				$response = "ระบบผิดพลาด 2 ";
			}
		} else {
			$response = "Point ไม่เพียงพอ";
		}
	}

	echo $response;
}
