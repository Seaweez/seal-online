<?php
require_once 'database.php';
session_start();
define('GHIL', 'MAN');
// $_SESSION['username'] = 'mixeiei1';
// unset($_SESSION['username']);
define("HOST","102.129.139.56");
define("USER","seal");
define("PASSWORD","seal@my##");
// define("HOST","localhost");
// define("USER","root");
// define("PASSWORD","123456");

define("DATABASE","seal_member");
define("DATABASE2","gdb0101");
define("DATABASE3","item");
define("CHARSET","utf8");
define("DOMAIN", "localhost");
date_default_timezone_set('Asia/Bangkok');
function DB(){
  $conn = new Database(DATABASE, USER, PASSWORD,HOST);
  return $conn;
}
function PDO(){
static $instance;

  if($instance==NULL){

    $opt = array(

      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

      PDO::ATTR_EMULATE_PREPARES => FALSE,

    );

    $dsn = "mysql:host=" . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;

    $instance = new PDO($dsn, USER, PASSWORD, $opt);
  }
  return $instance;
}
function PDO1(){
static $instance;

  if($instance==NULL){

    $opt = array(

      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

      PDO::ATTR_EMULATE_PREPARES => FALSE,

    );

    $dsn = "mysql:host=" . HOST . ';dbname=' . DATABASE2 . ';charset=' . CHARSET;

    $instance = new PDO($dsn, USER, PASSWORD, $opt);
  }
  return $instance;
}


function PDO2(){
  static $instance;
  
    if($instance==NULL){
  
      $opt = array(
  
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  
        PDO::ATTR_EMULATE_PREPARES => FALSE,
  
      );
  
      $dsn = "mysql:host=" . HOST . ';dbname=' . DATABASE3 . ';charset=' . CHARSET;
  
      $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
  }