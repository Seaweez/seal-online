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
	$options = null;


	// get name
	$n = dd_q('SELECT name FROM itemshop_item WHERE id = ? LIMIT 1', [$itemid]);
	// get price
	$p = dd_q('SELECT price FROM itemshop_item WHERE id = ? LIMIT 1', [$itemid]);
	
	// get quantity
	$a = dd_q('SELECT item_id FROM itemshop_item WHERE id = ? LIMIT 1', [$itemid]);
	$b = dd_q('SELECT item_io FROM itemshop_item WHERE id = ? LIMIT 1', [$itemid]);
	$c = dd_q('SELECT item_ioo FROM itemshop_item WHERE id = ? LIMIT 1', [$itemid]);

	if ($q !== false && $i !== false && $p !== false) {
		$name = @$n->fetch()[0];
		$price = @$p->fetch()[0];
		$item_id = @$a->fetch()[0];
		$item_io = @$b->fetch()[0];
		$item_ioo = @$c->fetch()[0];

		$userinfo = $seal->userinfo();
		$uid = $userinfo['id'];
		if ($userinfo['point'] >= $price) {

			$buy = $seal->buyitem($item_id, $item_io, $price, $item_ioo);
			// var_dump($buy);

			if ($buy == true) {
				// history
				$his = dd_q('INSERT INTO itemshop_history (user_id, item_name, item_id, item_io, item_ioo, date) VALUES (?, ?, ?, ?, ?, ?)', [$_SESSION['username'], $name, $item_id, $item_io, $item_ioo, date('Y-m-d H:i:s')]);
				if ($his) {
					$response = "success";
				} else {
					$response = "ระบบผิดพลาด 1";
				}
			} else {
				if($buy == 99) {
					$response = 'Bank Slot is full, please delete first and try again';
				} else if($buy == 98) {
					$response = 'Your points are not enough to make this purchase';
				} else {
					$response = "ระบบผิดพลาด 2 ";
				}
			}

		} else {
			$response = "Point ไม่เพียงพอ";
		}
	}

	echo $response;
}
