<?php
ob_start();
date_default_timezone_set("Asia/Bangkok");
define('GHIL', 'MAN');

$str_hosting = '102.129.139.56'; // EDIT
$str_database = 'Website'; // EDIT
$str_password = 'seal@my##'; // EDIT
$str_username = 'seal'; // EDIT

// $str_hosting = 'localhost'; // EDIT
// $str_database = 'e3kjfnyeh_web'; // EDIT
// $str_password = '123456'; // EDIT
// $str_username = 'root'; // EDIT

try {
    $conn = new PDO("mysql:host=$str_hosting;dbname=$str_database", $str_username, $str_password);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function dd_q($str, $arr = [])
{
    global $conn;
    try {
        $exec = $conn->prepare($str);
        $exec->execute($arr);
    } catch (PDOException $e) {
        return false;
    }
    return $exec;
}



