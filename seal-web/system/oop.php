<?php
error_reporting(1);
include 'pdo.php';
if (!defined('GHIL')) exit('No direct script access allowed');

class seal
{
	function __construct()
	{
		$this->db = DB();
		$this->pdo = PDO();
		$this->pdo1 = PDO1();
		$this->pdo2 = PDO2();
	}
	function register($username, $password, $email)
	{
		$data = [
			"id" => $username,
			"passwd" => $password,
			"email" => $email
		];
		$check = str_split($username);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			try {
				$this->db->insert('idtable1', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			try {
				$this->db->insert('idtable2', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			try {
				$this->db->insert('idtable3', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			try {
				$this->db->insert('idtable4', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			try {
				$this->db->insert('idtable5', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		} else {
			try {
				$this->db->insert('idtable1', $data);
				$_SESSION['username'] = $username;
				$msg = "success";
			} catch (Exception $e) {
				$msg = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
		}
		return $msg;
	}
	function login($username, $password)
	{
		$user = [
			"id" => $username
		];
		$pass = $this->pdo->query("SELECT OLD_PASSWORD('" . $password . "')")->fetch();
		$passhas = $pass["OLD_PASSWORD('" . $password . "')"];
		$check = str_split($username);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$num = $this->db->select('idtable1', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$num = $this->db->select('idtable2', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable2 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$num = $this->db->select('idtable3', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable3 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$num = $this->db->select('idtable4', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable4 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$num = $this->db->select('idtable5', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable5 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		} else {
			$num = $this->db->select('idtable1', $user);
			if ($num->count() > 0) {
				$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $username . "'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['username'] = $indo['id'];
					$msg = "success";
				} else {
					$msg = "รหัสผ่านผิด";
				}
			} else {
				$msg = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
		}
		return $msg;
	}
	function userinfo()
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT * FROM idtable2 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT * FROM idtable3 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT * FROM idtable4 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT * FROM idtable5 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		} else {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
		}
		return $indo;
	}
	function logout()
	{
		session_destroy();
		$msg = "success";
		return $msg;
	}
	// public function tmtopupconnect($tmuser, $tmpassword, $trueemail, $truepassword, $ip, $session, $transactionid, $action, $ref1)
	// {
	// 	$url = "http://tmwallet.thaighost.net/apiwallet.php";
	// 	$urlconnect = $url . "?username=$tmuser&password=$tmpassword&action=$action&tmemail=$trueemail&truepassword=$truepassword&session=$session&transactionid=$transactionid&clientip=$ip&ref1=$ref1";
	// 	$callback = @file_get_contents($urlconnect);
	// 	return $callback;
	// }
	public function capchar($ip, $tmuser)
	{
		return md5($tmuser . $ip);
	}
	function changpassword($oldpassword, $password)
	{
		$passold = $this->pdo->query("SELECT OLD_PASSWORD('" . $oldpassword . "')")->fetch();
		$oldpasswordhas = $passold["OLD_PASSWORD('" . $oldpassword . "')"];
		$passnew = $this->pdo->query("SELECT OLD_PASSWORD('" . $password . "')")->fetch();
		$passwordnewhas = $passnew["OLD_PASSWORD('" . $password . "')"];
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable1 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT * FROM idtable2 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable2 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT * FROM idtable3 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable3 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT * FROM idtable4 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable4 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT * FROM idtable5 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable5 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		} else {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->pdo->prepare("UPDATE idtable1 SET passwd = :pass WHERE id = :user");
				$update->execute([':pass' => $passwordnewhas, ':user' => $_SESSION['username']]);
				$msg = "success";
			} else {
				$msg = "รหัสผ่านเก่าของท่านผิด";
			}
		}
		return $msg;
	}
		
	function kickgame($slo)
	{
		$update = $this->pdo1->prepare("UPDATE pc SET play_flag = 0 WHERE user_id = :id AND char_order = :slo");
		$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
		$msg = "success";
		return $msg;
	}
	function clearheadpoint($slo)
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT * FROM idtable2 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable2 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT * FROM idtable3 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable3 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT * FROM idtable4 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable4 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT * FROM idtable5 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable5 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		} else {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= 100) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point - 100 WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
				$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
				$msg = "success";
			} else {
				$msg = "point ของคุณไม่ไม่พอที่จะทำรายการ";
			}
		}
		return $msg;
	}
	function clearheadm($slo)
	{
		$indo = $this->pdo1->query("SELECT * FROM pc WHERE user_id = '" . $_SESSION['username'] . "' AND char_order = '" . $slo . "' LIMIT 1")->fetch();
		if ($indo['money'] >= 3000000) {
			$deletepoint = $this->pdo1->prepare("UPDATE pc SET money = money - 3000000 WHERE user_id = :id AND char_order = :slo LIMIT 1");
			$deletepoint->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
			$update = $this->pdo1->prepare("UPDATE pc SET chaos_pt = 0 WHERE user_id = :id AND char_order = :slo LIMIT 1");
			$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
			$msg = "success";
		} else {
			$msg = "money ของคุณไม่ไม่พอที่จะทำรายการ";
		}
		return $msg;
	}
	function pcinfo()
	{
		$indo = $this->pdo1->prepare("SELECT * FROM pc WHERE user_id = :user");
		$indo->execute([':user' => $_SESSION['username']]);
		$sdsd = $indo->fetchALL();
		return $sdsd;
	}
	function backtown($slo)
	{
		$update = $this->pdo1->prepare("UPDATE pc SET map_num = 34, x = 200, y = 200 WHERE user_id = :id AND char_order = :slo");
		$update->execute([':id' => $_SESSION['username'], ':slo' => $slo]);
		$msg = "success";
		return $msg;
	}
	// function topup($transaction)
	// {
	// 	$user = $_SESSION['username'];;
	// 	$returnserver = $this->tmtopupconnect("naiimoo1", "0832020440pp", "hunter_2540@hotmail.com", "0966376613", $_SERVER["REMOTE_ADDR"], $_POST['session'], $transaction, "yes", $user);
	// 	$returnserver = json_decode($returnserver, true);
	// 	$check = str_split($_SESSION['username']);
	// 	$sql_check_reportid = $this->pdo->prepare("SELECT * FROM logtopup WHERE transaction = :por");
	// 	$sql_check_reportid->execute([':por' => $transaction]);
	// 	$sql_check_reportid_row = $sql_check_reportid->rowCount();
	// 	if ($sql_check_reportid_row != 0) {
	// 		$msg = "หมายเลขอ้างอิงนี้มีการเติมเข้ามาแล้ว";
	// 	} else {
	// 		if ($returnserver['Status'] !== "check_success") {
	// 			$msg = "ไม่มีหมายเลขอ้างอิงนี้";
	// 		} elseif ($returnserver['Status'] == "check_success") {
	// 			$dxdxdx = $returnserver['Amount'] * 2;
	// 			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable1 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable1 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable2 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable2 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable3 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable3 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable4 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable4 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable5 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable5 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} else {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable1 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable1 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			}
	// 		}
	// 	}
	// 	return $msg;
	// }
	// function ctopup($transaction)
	// {
	// 	$user = $_SESSION['username'];;
	// 	$returnserver = $this->tmtopupconnect("naiimoo1", "0832020440pp", "hunter_2540@hotmail.com", "0966376613", $_SERVER["REMOTE_ADDR"], $_POST['session'], $transaction, "yes", $user);
	// 	$returnserver = json_decode($returnserver, true);
	// 	$check = str_split($_SESSION['username']);
	// 	$sql_check_reportid = $this->pdo->prepare("SELECT * FROM logtopup WHERE transaction = :por");
	// 	$sql_check_reportid->execute([':por' => $transaction]);
	// 	$sql_check_reportid_row = $sql_check_reportid->rowCount();
	// 	if ($sql_check_reportid_row != 0) {
	// 		$msg = "หมายเลขอ้างอิงนี้มีการเติมเข้ามาแล้ว";
	// 	} else {
	// 		if ($returnserver['Status'] !== "check_success") {
	// 			$msg = "ไม่มีหมายเลขบัตรนี้";
	// 		} elseif ($returnserver['Status'] == "check_success") {
	// 			$dxdxdx = $returnserver['Amount'] * 1.5;
	// 			if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable1 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable1 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable2 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable2 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable3 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable3 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable4 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable4 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable5 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable5 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			} else {
	// 				$updatepoint = $this->pdo->query("INSERT INTO logtopup (id ,transaction ,user) VALUES(NULL ,  '$transaction',  '$user')");
	// 				$uppoint = $this->pdo->query("UPDATE idtable1 SET logtopup = logtopup + '$ftam_u' WHERE id = '$user'");
	// 				$uppoint2 = $this->pdo->query("UPDATE idtable1 SET point = point + '$dxdxdx' WHERE id = '$user'");
	// 				$msg = "success";
	// 			}
	// 		}
	// 	}
	// 	return $msg;
	// }
	function showhis()
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable1 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable2 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable3 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable4 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable5 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		} else {
			$queryq = $this->pdo->prepare("SELECT * FROM idtable1 WHERE id = :user");
			$queryq->execute([':user' => $_SESSION['username']]);
			$row = $queryq->fetch();
		}
		return $row;
	}
	/* ระบบ ban*/
	function banned($username)
	{
		$check = str_split($username);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$uppoint = $this->pdo->query("UPDATE idtable1 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$uppoint = $this->pdo->query("UPDATE idtable2 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$uppoint = $this->pdo->query("UPDATE idtable3 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$uppoint = $this->pdo->query("UPDATE idtable4 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$uppoint = $this->pdo->query("UPDATE idtable5 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		} else {
			$uppoint = $this->pdo->query("UPDATE idtable1 SET delete_flag = 2 WHERE id = '$username'");
			$msg = "success";
		}
		return $msg;
	}

	/* ระบบ ban */


	/* ระบบ unban*/
	function unbanned($username)
	{
		$check = str_split($username);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$uppoint = $this->pdo->query("UPDATE idtable1 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$uppoint = $this->pdo->query("UPDATE idtable2 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$uppoint = $this->pdo->query("UPDATE idtable3 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$uppoint = $this->pdo->query("UPDATE idtable4 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$uppoint = $this->pdo->query("UPDATE idtable5 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		} else {
			$uppoint = $this->pdo->query("UPDATE idtable1 SET delete_flag = 0 WHERE id = '$username'");
			$msg = "success";
		}
		return $msg;
	}

	/* ระบบ ban */


	/* ระบบ Itemshop + CSGO */
	function fetchStore()
	{
		$update = $this->pdo1->prepare("SELECT * FROM store WHERE user_id = :user");
		$update->execute([':user' => $_SESSION['username']]);
		$msg = $update->fetch();
		return $msg;
	}

	function fetchStoreItem($uid, $i, $it_id, $io_id)
	{
		$update = $this->pdo1->prepare("SELECT * FROM store WHERE it" . $i . "='" . $it_id . "' and io" . $i . "='" . $io_id . "' and user_id = :user");
		$update->execute([':user' => $uid]);
		$msg = $update->rowCount();
		return $msg;
	}

	function updateStore($uid, $i, $it_id, $io_id, $ioo_id, $is_id = 0)
	{
		$this->pdo1->query("update store set it" . $i . "='" . $it_id . "', io" . $i . "='" . $io_id . "', ioo" . $i . "='" . $ioo_id . "', is" . $i . "='" . $is_id . "' where user_id='" . $uid . "'");
	}

	function buyitem($itemid, $quantity, $price, $options)
	{
		$store = $this->fetchStore();
		$msg = null;

		for ($i = 0; $i <= 79; $i++) {
			// var_dump($i);
			if ($store['it' . $i] == 0) {
				$msg = false;
				// var_dump($msg);

				$pay = $this->decresePoint($price);
				if($pay) {
					$this->updateStore($_SESSION['username'], $i, $itemid, $quantity, $options);

					$msg = true;
					// var_dump($msg);
				}

				break;
			}
		}

		if($msg == null) {
			$msg = 99;
		} else {
			if(!$msg) {
				$msg = 98;
			}
		}
		return $msg;

	}
	/* ระบบ Itemshop + CSGO */

	/* ระบบย้ายของ Cash */
	function fetchCashInventory($charname)
	{
		$update = $this->pdo1->prepare("SELECT * FROM cash_inventory WHERE char_name = :char_name");
		$update->execute([':char_name' => $charname]);
		$msg = $update->fetch();
		return $msg;
	}

	function addSealItem($it_id, $it_io, $OwnerID, $it_limit = 0)
	{
		$datetime = date_create()->format('Y-m-d H:i:s');
		$q = $this->pdo2->query("INSERT INTO seal_item (UniqueNum, ItemType, ItemOp1, ItemOp2,ItemLimit, OwnerID, OwnerDate, bxaid) VALUES (NULL, '$it_id', '$it_io', '0', '$it_limit', '$OwnerID', '$datetime', 'BUY');");
		return $q;
	}

	function updateCashInventory($charname, $i, $it_id, $io_id, $ioo_id = 0)
	{
		$q = $this->pdo1->query("update cash_inventory set it" . $i . "='" . $it_id . "', io" . $i . "='" . $io_id . "', ioo" . $i . "='" . $ioo_id . "' where char_name='" . $charname . "'");
		return $q;
	}
	/* ระบบย้ายของ Cash */
	function decresePoint($point)
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT point FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT point FROM idtable2 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable2 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT point FROM idtable3 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable3 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT point FROM idtable4 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable4 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT point FROM idtable5 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable5 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} else {
			$indo = $this->pdo->query("SELECT point FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point - '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		}
		return $msg;
	}

	function incresePoint($point)
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT point FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);
				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT point FROM idtable2 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable2 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT point FROM idtable3 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable3 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT point FROM idtable4 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable4 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT point FROM idtable5 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable5 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		} else {
			$indo = $this->pdo->query("SELECT point FROM idtable1 WHERE id = '" . $_SESSION['username'] . "'")->fetch();
			if ($indo['point'] >= $point) {
				$deletepoint = $this->pdo->prepare("UPDATE idtable1 SET point = point + '$point' WHERE id = :id");
				$deletepoint->execute([':id' => $_SESSION['username']]);

				$msg = true;
			} else {
				$msg = false;
			}
		}
		return $msg;
	}

	// Edited by Ghilman
	// isghilman@gmail.com or fb.me/ghilmaanrashif
	function onlinecheck()
	{
		$check = str_split($_SESSION['username']);
		if ($check[0] == "a" || $check[0] == "A" || $check[0] == "b" || $check[0] == "B" || $check[0] == "c" || $check[0] == "C" || $check[0] == "d" || $check[0] == "D") {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		} elseif ($check[0] == "e" || $check[0] == "E" || $check[0] == "f" || $check[0] == "F" || $check[0] == "g" || $check[0] == "G" || $check[0] == "h" || $check[0] == "H" || $check[0] == "i" || $check[0] == "I") {
			$indo = $this->pdo->query("SELECT * FROM idtable2 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		} elseif ($check[0] == "j" || $check[0] == "J" || $check[0] == "k" || $check[0] == "K" || $check[0] == "l" || $check[0] == "L" || $check[0] == "m" || $check[0] == "M" || $check[0] == "n" || $check[0] == "n") {
			$indo = $this->pdo->query("SELECT * FROM idtable3 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		} elseif ($check[0] == "o" || $check[0] == "O" || $check[0] == "p" || $check[0] == "P" || $check[0] == "q" || $check[0] == "Q" || $check[0] == "r" || $check[0] == "R") {
			$indo = $this->pdo->query("SELECT * FROM idtable4 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		} elseif ($check[0] == "s" || $check[0] == "S" || $check[0] == "t" || $check[0] == "T" || $check[0] == "u" || $check[0] == "U" || $check[0] == "v" || $check[0] == "V" || $check[0] == "w" || $check[0] == "W" || $check[0] == "x" || $check[0] == "X" || $check[0] == "y" || $check[0] == "Y" || $check[0] == "z" || $check[0] == "Z") {
			$indo = $this->pdo->query("SELECT * FROM idtable5 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		} else {
			$indo = $this->pdo->query("SELECT * FROM idtable1 WHERE id = '" . $_SESSION['username'] . "' AND pay_flag > 0")->rowCount();
		}
		return $indo;
	}
	function statusreset($char_name, $arr_status = array(), $check = 0)
	{
		$get = $this->pdo1->prepare("SELECT level, levelup_point, strength, intelligence, dexterity, constitution, mentality, sense FROM pc WHERE user_id = :id AND char_name = :char_name");
		$get->execute([':id' => $_SESSION['username'], ':char_name' => $char_name]);
		$data = $get->fetch();
		$level = $data['level'];
		$levelup_point = $data['levelup_point'];
		// if($level == 1) {
		// 	$levelup_point = 5;
		// }
		// $data['levelup_point'] = $levelup_point;
		
		if($check == 1) {
			return json_encode($data);
		}

		$totalup_point = $arr_status['str'] + $arr_status['agi'] + $arr_status['int'] + $arr_status['vit'] + $arr_status['wis'] + $arr_status['luk'];
		if(($totalup_point - 30) > $levelup_point) {
			$msg = "You don't have enough available status point !";
		} else {
			$level_point = 5 + ($level * 3);
			if($level == 1) {
				$level_point = 5;
			}
			$final_levelup_point = $level_point - ($totalup_point - 30);
			// var_dump($final_levelup_point);

			$update = $this->pdo1->prepare("UPDATE pc SET levelup_point = :levelup_point, strength = :str, intelligence = :intt, dexterity = :agi, constitution = :vit, mentality = :wis, sense = :luk WHERE user_id = :id AND char_name = :char_name");
			$update->execute([
				':id' => $_SESSION['username'], 
				':char_name' => $char_name,
				':levelup_point' => $final_levelup_point,
				':str' => $arr_status['str'],
				':agi' => $arr_status['agi'],
				':intt' => $arr_status['int'],
				':vit' => $arr_status['vit'],
				':wis' => $arr_status['wis'],
				':luk' => $arr_status['luk'],
			]);
			$msg = "success";
		}

		return $msg;
	}

	function buyitem_mall($itemid, $quantity, $price, $limit = 0)
	{
		$msg = null;

		$pay = $this->decresePoint($price);
		if($pay) {
			$this->addSealItem($itemid, $quantity, $_SESSION['username'], $limit);
			$msg = true;
		}
		return $msg;
	}
}
