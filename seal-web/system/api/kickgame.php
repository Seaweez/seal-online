<?php 
include '../oop.php';
$seal = new seal;
$kick = $seal->kickgame($_POST['slo']);
echo $kick;
?>