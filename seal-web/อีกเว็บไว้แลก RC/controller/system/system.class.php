<?php 
	include 'connect.class.php';
	class system extends pdo_mysql {

		protected $config;
		protected $api;

		public function __construct() {
			$this->config 		= include('config.php');
			$this->user_name 	= (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : '';
			$this->dbserver 	= $this->DB_server();
			$this->db 			= $this->DB_PDO();
			$this->db2 			= $this->DB_PDO2();
			$this->db3 			= $this->DB_PDO3();
			$this->api			= $this->config['api'];
			$this->cfg			= $this->config['topup'];
		}

		public function clean($sql, $formUse = true) {
			$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i", "", $sql);
			$sql = trim($sql);
			$sql = strip_tags($sql);
			if (!$formUse || !get_magic_quotes_gpc()) {
				$sql = addslashes($sql);
			}
			return $sql;
		}

		private function parseidtotbl($id) {
			$id = substr($id,0,1);
			$tbl = array();
			$tbl['idtable1'] = array('a','b','c','d');
			$tbl['idtable2'] = array('e','f','g','h','i');
			$tbl['idtable3'] = array('j','k','l','m','n');
			$tbl['idtable4'] = array('o','p','q','r','s');
			$tbl['idtable5'] = array('t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			foreach($tbl as $tbl=>$chars) {
				if(in_array($id,$chars) == true) {
					return $tbl;
				}
			}
			return false;
		}

		private function find_emptyslot($data) {
			$i=0;
			foreach($data as $key=>$value) {
				if($key == 'it'.$i) {
					if($value == 0) {
						$lootempty = $i;
						break;
					}
					$i++;
				}
			}
			return $lootempty;
		}

		private function addsegel($segel) {
			$user = $this->user_name;
			$stmt = $this->db2->prepare("UPDATE store SET segel = (segel + :segel)  WHERE user_id = :id");
			$stmt->execute([':segel'=>$segel, ':id'=>$user]);
		}

		private function addpoint($cash) {
			$user = $this->user_name;
			$tbl = $this->parseidtotbl($user);
			$stmt = $this->db->prepare("UPDATE {$tbl} SET point = (point + :cash)  WHERE id = :id");
			$stmt->execute([':cash'=>$cash, ':id'=>$user]);
		}

		private function addtoitemmall($array_data) {
			foreach($array_data as $item => $qty) {
				if($qty !== 0) {
					$query = $this->db3->query("INSERT INTO seal_item (ItemType, ItemOp1, OwnerID, bxaid) VALUES ($item, $qty-1, '".$this->user_name."', 'BUY')");
				}
			}
		}

		private function addtoinventory($item, $count) {
			$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :user_name");
			$stmt->execute([':user_name'=>$this->user_name]);
			if($stmt->rowcount() > 0) {
				$result = $stmt->fetch();
				$slot = $this->find_emptyslot($result);
				if(!empty($slot)) {
					$lootit = "it".strval($slot);
					$lootio = "io".strval($slot);
					$lootioo = "ioo".strval($slot);
					$setrc = $this->db2->prepare("UPDATE store SET ".$lootit." = :itemid , ".$lootio." = :countnow , ".$lootioo." = -1 WHERE user_id = :user_name");
					$setrc->execute([':itemid'=>$item, ':countnow'=>$count-1, ':user_name'=>$this->user_name]);
					$message['status'] = "success";
					$message['info'] = "แอดไอเทมเรียบร้อย";
				} else {
					$message['status'] = "error";
					$message['info'] = "ไม่มีช่องเก็บของว่าง";
				}
			} else {
				$message['status'] = "error";
				$message['info'] = "ไม่พบ Username ในระบบ";
			}
			return $message;
		}

		private function addtopup_log($amount, $point, $type) {
			$user = $this->user_name;
			$this->db->query("INSERT INTO log_topup (user_id, amount, point, type, success_time) VALUES('{$user}', {$amount}, {$point}, '{$type}', '".date('Y-m-d H:i:s')."')");
		}

		private function addbonus_log($amount) {
			$user = $this->user_name;
			$check = $this->db->query("SELECT user_id FROM log_bonus WHERE user_id = '{$user}'");
			$row = $check->rowCount();
			if($row === 0) {
				$this->db->query("INSERT INTO log_bonus (user_id, bonus_point, bonus_level) VALUES ('{$user}', '{$amount}', '0')");
			} else {
				$this->db->query("UPDATE log_bonus SET bonus_point = (bonus_point + {$amount})");
			}
		}

		private function addreward_log($eid, $level, $point) {
			$user = $this->user_name;
			$this->db->query("INSERT INTO log_reward (user_id, event_id, reward_level, reward_point, reward_time) VALUES('{$user}', '{$eid}', '{$level}', '{$point}', '".date('Y-m-d H:i:s')."')");
			$this->db->query("UPDATE log_bonus SET bonus_level = '{$level}' WHERE user_id = '{$user}'");
		}

		public function register($username, $password, $email) {
			$email = strtolower($email);
			$username = strtolower($username);
			$password = strtolower($password);
			$tbl = $this->parseidtotbl($username);
			$data = [
				"id" => $username,
				"passwd" => $password,
				"email" => $email
			];
			try {
				$this->dbserver->insert($tbl,$data);
				$_SESSION['user_name'] = $username;
				$message['status'] = "success";
				$message['info'] = "สมัครไอดีสำเร็จแล้ว";
			} catch (Exception $e) {
				$message['status'] = "error";
				$message['info'] = "มีผู้ใช้นี้อยู่ในระบบแล้ว";
			}
			return $message;
		}

		public function login($username, $password) {
			$tbl = $this->parseidtotbl($username);
			$user = [ "id" => $username ];
			$pass = $this->db->query("SELECT OLD_PASSWORD('".$password."')")->fetch();
			$passhas = $pass["OLD_PASSWORD('".$password."')"];
			$num = $this->dbserver->select($tbl, $user);
			if($num->count() > 0) {
				$indo = $this->db->query("SELECT * FROM {$tbl} WHERE id = '{$username}'")->fetch();
				if ($passhas == $indo['passwd']) {
					$_SESSION['user_name'] = $indo['id'];
					$message['status'] = "success";
				}else{
					$message['status'] = "error";
					$message['info'] = "รหัสผ่านผิด";
				}
			}else{
				$message['status'] = "error";
				$message['info'] = "ไม่พบบัญชีนี้อยู่ในระบบ";
			}
			return $message;
		}

		public function userinfo() {
			$tbl = $this->parseidtotbl($this->user_name);
			return $this->db->query("SELECT ac.*, bn.bonus_point, bn.bonus_level FROM {$tbl} AS ac LEFT JOIN log_bonus AS bn ON ac.id = bn.user_id WHERE ac.id  = '{$this->user_name}'")->fetch();
		}

		public function userinfo2() {
			$stmt = $this->db2->prepare("SELECT * FROM pc WHERE user_id = :username");
			$stmt->execute([':username'=>$this->user_name]);
			if ($stmt->rowcount()>0) {
				while($rows = $stmt->fetch()){
					$result[] = $rows;
				}
				return $result;
			}else{
				return 0;
			}
		}

		public function showrc() {
			$user = $this->user_name;
			if(empty($user)) {
				return 0;
			} else {
				$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :username");
				$stmt->execute([':username'=>$user]);
				if($stmt->rowCount() > 0) {
					$result = $stmt->fetch();
					if($result['it0'] == "26819") {
						return $result['io0'] + 1;
					} else {
						return 0;
					}
				} else {
					return 0;
				}
			}
		}

		public function trade($rc) {
			$user = $this->user_name;
			if(empty($user)) {
				$message['status'] = "error";
				$message['info'] = "กรุณาล็อกอินก่อน";
			} else {
				$stmt = $this->db2->prepare("SELECT * FROM store WHERE user_id = :username");
				$stmt->execute([':username'=>$user]);
				if ($stmt->rowCount() > 0) {
					$result = $stmt->fetch();
					if ($result['it0'] == "26819") {
						if($result['io0'] == "0") {
							$update = $this->db2->prepare("UPDATE `store` SET `it0` = '0' WHERE user_id =:username");
							$update->execute([':username'=>$user]);
							$this->addpoint(100);
							$message['status'] = "success";
							$message['info'] = "แลก RC สำเร็จแล้ว";
						} else if($rc == $this->showrc()) {
							$update = $this->db2->prepare("UPDATE `store` SET `it0` = '0' , `io0` = '0' WHERE user_id =:username");
							$update->execute([':username'=>$user]);
							$this->addpoint($rc * 100);
							$message['status'] = "success";
							$message['info'] = "แลก RC สำเร็จแล้ว";
						} else {
							$rcnow = ($this->showrc() - $rc) - 1;
							$update = $this->db2->prepare("UPDATE `store` SET `io0` = :rcnow WHERE user_id =:username");
							$update->execute([':rcnow'=>$rcnow,':username'=>$user]);
							$this->addpoint($rc * 100);
							$message['status'] = "success";
							$message['info'] = "แลก RC สำเร็จแล้ว";
						}
					} else {
						$message['status'] = "error";
						$message['info'] = "ไม่พบ RC ในช่องแรก";
					}
				} else {
					$message['status'] = "error";
					$message['info'] = "ไม่พบชื่อผู้ใช้ในคลัง";
				}
			}
			return $message;
		}

		public function buyrc($count) {
			$result = $this->addtoinventory(26819, $count);
			if($result['status'] == 'success') {
				$this->addpoint($count*-100);
				$message['status'] = "success";
				$message['info'] = "ซื้อ RC สำเร็จแล้ว";
			} else {
				$message['status'] = "error";
				$message['info'] = $result['info'];
			}
			return $message;
		}

		public function changpassword($oldpassword, $password) {
			$user = $this->user_name;
			$tbl = $this->parseidtotbl($user);
			$passold = $this->db->query("SELECT OLD_PASSWORD('".$oldpassword."')")->fetch();
			$oldpasswordhas = $passold["OLD_PASSWORD('".$oldpassword."')"];
			$passnew = $this->db->query("SELECT OLD_PASSWORD('".$password."')")->fetch();
			$passwordnewhas = $passnew["OLD_PASSWORD('".$password."')"];
			$indo = $this->db->query("SELECT * FROM {$tbl} WHERE id = '{$user}'")->fetch();
			if ($oldpasswordhas == $indo['passwd']) {
				$update = $this->db->prepare("UPDATE {$tbl} SET passwd = :pass WHERE id = :user");
				$update->execute([':pass'=>$passwordnewhas,':user'=>$user]);
				$message['status'] = "success";
				$message['info'] = "เปลื่ยนรหัสผ่านสำเร็จ";
			}else{
				$message['status'] = "error";
				$message['info'] = "รหัสผ่านเดิมไม่ถูกต้อง";
			}
			return $message;
		}

		public function get_rewarddata($lv) {
			$re = $this->cfg;
			foreach($re['bonus_item'][$lv] as $row) {
				$items[] = array('name' => $row['item_name'], 'count' => $row['count']);
			}
			$result = array(
				"bonus_img" => $re['bonus_img'][$lv],
				"bonus_item" => $items,
			);
			return $result;
		}

		public function getcanreward() {
			$rate = $this->cfg['bonus_summ'];
			$point = $this->userinfo()['bonus_point'];
			$str = "";
			$event_id = str_replace('-','',$this->cfg['bonus_begin_date']) . str_replace('-','',$this->cfg['bonus_end_date']);
			$check = $this->db->prepare("SELECT reward_level FROM log_reward WHERE user_id = :id AND event_id = :event_id ORDER BY reward_level DESC");
			$check->execute([':id'=>$this->user_name, ':event_id'=>$event_id]);
			$row = $check->fetch();
			$level = $row['reward_level'] - 1;
			foreach($rate as $key=>$value) {
				if($level >= $key) {
					$canget = " - ( รับไปแล้ว )";
				} else {
					if($point >= $value) {
						$canget = " - ( สามารถรับได้ )";
					} else {
						$canget = "";
					}
				}
				$str .= '<option value="'.($key+1).'">[ Lv.'.($key+1).' ] - เติมสะสม '.number_format($value).' บาท'.$canget.'</option>';
			}
			return $str;
		}

		public function topup_reward($id) {
			$event_id = str_replace('-','',$this->cfg['bonus_begin_date']) . str_replace('-','',$this->cfg['bonus_end_date']);
			$check = $this->db->prepare("SELECT event_id FROM log_reward WHERE user_id = '{$this->user_name}' AND reward_level = :id AND event_id = :event_id");
			$check->execute([':id'=>$id+1, ':event_id'=>$event_id]);
			$row = $check->rowCount();
			if($row === 1) {
				$message['status'] = "error";
				$message['info'] = "คุณเคยรับไอเทมโบนัสนี้ไปแล้ว";
			} else {
				$bonus_point = $this->userinfo()['bonus_point'];
				$bonus_rate = $this->cfg['bonus_summ'][$id];
				foreach($this->cfg['bonus_item'][$id] as $row) {
					$items[$row['item_id']] = $row['count'];
				}
				if($bonus_point >= $bonus_rate) {

					$this->addpoint($this->cfg['bonus_cash'][$id]);
					$this->addtoitemmall($items);
					$this->addreward_log($event_id, $id+1, $bonus_point);
					$message['status'] = "success";
					$message['info'] = "รับไอเทมโบนัส Lv.".($id+1)." สำเร็จแล้ว!";
				} else {
					$message['status'] = "error";
					$message['info'] = "Bonus Point ของท่านไม่พอ";
				}
			}
			return $message;
		}

		public function gettopup_log() {
			$check = $this->db->query("SELECT * FROM log_topup WHERE user_id = '{$this->user_name}' ORDER BY success_time DESC");
			while($row = $check->fetch()) {
				$post[] = $row;
			}
			return $post;
		}

		private function tmtopupconnect($transactionid, $session='') {
			$url_api="http://tmwallet.thaighost.net/apiwallet.php";
			$urlconnect = $url_api."?username=".$this->api['user']."&password=".$this->api['pass']."&action=yes&tmemail=".$this->api['temail']."&truepassword=".$this->api['tpass']."&session={$session}&transactionid={$transactionid}&clientip=".$_SERVER['REMOTE_ADDR']."&ref1={$this->user_name}&ac_code=".$this->api['ac_code']."&json=1";
			$ch = curl_init($urlconnect);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; th; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			@curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$callback = curl_exec($ch);
			curl_close($ch);
			return $callback;
		}

		public function topup($transaction, $type) {
			$result = $this->tmtopupconnect($transaction);
			$result = json_decode($result, true);
			if($result['Status'] === "check_success") {
				$amount = floor($result['Amount']);
				if($amount >= 50 && $amount < 90) {
					$set = 50;
				} else if($amount >= 90 && $amount < 150) {
					$set = 90;
				} else if($amount >= 150 && $amount < 300) {
					$set = 150;
				} else if($amount >= 300 && $amount < 500) {
					$set = 300;
				} else if($amount >= 500 && $amount < 1000) {
					$set = 500;
				} else if($amount >= 1000) {
					$set = 1000;
				}

				$cash = $this->cfg['cash_amount'][$set];
				$segel = $this->cfg['segel_amount'][$set];
				foreach($this->cfg['items'][$set] as $row) {
					$items[$row['item_id']] = $row['count'];
				}

				$this->addtopup_log($amount, $cash, $type);
				$this->addbonus_log($amount);
				$this->addpoint($cash);
				$this->addsegel($segel);
				$this->addtoitemmall($items);
				$message['status'] = "success";
				$message['info'] = "เติมเงินจำนวน {$set} บาท สำเร็จแล้ว!";
			} else {
				$message['status'] = "error";
				$message['info'] = $result['Msg'];
			}
			return $message;
		}

		public function countusernow(){
			$stmt = $this->db2->query("SELECT * FROM pc");
			$i = 0;
			while($rows = $stmt->fetch()){
				$result[] = $rows;
			}
			foreach($result as $total) {
				if ($total['play_flag']!==0) {
					$i++;
				}
			}
			return $i;
		}

		public function countuserall(){
			$stmt = $this->db2->query("SELECT count(play_flag) as total FROM pc");
			return $stmt->fetch()['total'];
		}

		public function kickplayer($charid) {
			if($_SESSION['user_name']) {
				$query = $this->db2->query("UPDATE pc SET play_flag = 0 WHERE char_id = '".$charid."'");
				$message['status'] = "success";
				$message['info'] = "เตะเรียบร้อย";
			}
			return $message;
		}

		public function getchar_list(){
			$stmt = $this->db2->query("SELECT char_id, char_name FROM pc WHERE user_id = '".$_SESSION['user_name']."'");
			while($rows = $stmt->fetch()){
				echo "<option value='".$rows['char_id']."'>".$rows['char_name']."</option>";
			}
		}
	}
?>