<?php
error_reporting(0);
require "config.php";
  require "Truewallet.php";
  $tw = new TrueWalletClass($phone, $password);
  $tw->setAccessToken($access_token);
  $data = $tw->GetTransaction();
  foreach ($data["data"]["activities"] as $transfer) {
    $values = $tw->GetTransactionReport($transfer["report_id"]);
    print_r($values);
  }
?>