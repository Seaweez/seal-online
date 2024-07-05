<?php 
if(empty($_POST['porsd'])){
	echo "กรุณาอย่าเว้นว่างช่องบัตรเติมเงินทรูมันนี่";
}else{
	include '../oop.php';
	$seal = new seal;
	$porsrsr = $_POST['porsd'];
	$porsdsdsddsdasd = $seal->ctopup($porsrsr);
	echo $porsdsdsddsdasd;
}
?>