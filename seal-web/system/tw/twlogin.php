<?php
require "config.php";
  require "Truewallet.php";
  $tw = new TrueWalletClass($phone, $password);
  
 // print_r($tw->RequestLoginOTP());
  //print_r($tw->SubmitLoginOTP($otp_code, $phone, $otp_ref));
  
  $tw->setAccessToken($access_token);
  $data = $tw->GetProfile();
  print($data["code"]);
?>