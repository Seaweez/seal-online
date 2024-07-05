<?php
error_reporting(0);
require "config.php";
  require "Truewallet.php";
  $tw = new TrueWalletClass($phone, $password);
  $tw->setAccessToken($access_token);
  if (isset($_GET["transaction"])) {
	$transactions = $tw->getTransaction(60);
	 foreach ($transactions["data"]["activities"] as $report) {
        $data = $tw->GetTransactionReport($report["report_id"]);
        $code = $data["data"]["service_code"];
        $tran = $data['data']['section4']['column2']['cell1']['value'];
        $money = $data["data"]["amount"];
        $msg = $data["data"]["personal_message"]['value'];
		$phone = $data["data"]["section2"]["column1"]['cell1']['value'];
		$time = $data['section4']['column1']['cell1']['value'];
        if ($tran == $_GET["transaction"]){
         break;
        }
    }
    if($tran == $_GET['transaction']) {
		$response["message"] = 'success';
        $response["code"] = '100';
        $response["amount"] = $money;
        $response["message_transfer"] = $msg;
        $response["transaction"] = $tran;
		$response["phone"] = $phone;
		$response["time"] = $time;
        echo json_encode($response);
        die;
    }else{
		$porss["code"] = '404(3)';
		echo json_encode($porss);
	}
}
?>