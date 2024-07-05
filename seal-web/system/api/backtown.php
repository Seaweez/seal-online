<?php 
include '../oop.php';
$seal = new seal;
$backtown = $seal->backtown($_POST['slo']);
echo $backtown;
?>