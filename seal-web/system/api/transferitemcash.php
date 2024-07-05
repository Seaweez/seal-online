<?php
include '../oop.php';
$point = 500;
$char_id = intval($_POST['char_id']);
$user_id = $_POST['user_id'];
$slot_id = intval($_POST['slot_id']);
$char_name = null;
$res = null;
$por = new seal;
$pc = $por->pcinfo();
foreach ($pc as $p) {
    if ($p['char_order'] == $char_id) {
        $char_name  = $p['char_name'];
        break;
    }
}

$cash_inventory = $por->fetchCashInventory($char_name);
$msg = null;
$i = $slot_id - 1;
if ($cash_inventory['it' . $i] == 0) {
    $res = "ไม่มีไอเทมช่องที่ " . $slot_id ;
} else {
    if($por->onlinecheck() > 0) {
        $res = "You must offline in game to process this !";
    } else {
		$s = $por->decresePoint($point);
			if($s == false) {
            $res = 'Points are not enough';
	} else {
		
        $q = $por->addSealItem((int)$cash_inventory['it' . $i], (int)$cash_inventory['io' . $i], $user_id);
		$p = $por->updateCashInventory($char_name, $i, 0, 0);
        
        // var_dump($q);
        // var_dump($p);
        // var_dump($s);
        if($s == false) {
            $res = 'Points are not enough';
        } else {
            if ($q != false && $p != false) {
                $res = "success";
            } else {
                $res = "ไม่สามารถส่งไอเทม Cashได้";
            }

			}
        }
    }
}


echo $res;
