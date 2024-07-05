<?php 
if(empty($_POST['porsd'])){
	echo "กรุณาอย่าเว้นว่างช่องหมายเลขอ้างอิง";
}else{
	include '../oop.php';
	$seal = new seal;
	$porsrsr = $_POST['porsd'];
	$porsdsdsddsdasd = $seal->topup($porsrsr);
	echo $porsdsdsddsdasd;
}
?>