<?php
class TrueWalletClass {
	public $credentials = array();
	public $access_token = null;
	public $login_token = null;
	public $reference_token = null;
	public $curl_options = null;
	public $data = null;
	public $response = null;
	public $http_code = null;
	public $mobile_api_gateway = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/";

	public function __construct ($username = null, $password = null, $reference_token = null) {
		if (empty($this->device_id) || empty($this->mobile_tracking)) {
			$this->mobile_tracking = base64_encode(openssl_random_pseudo_bytes(45));
			$this->device_id = substr(md5($this->mobile_tracking), 16);
		}
		if (!is_null($username) && !is_null($password)) {
			$this->setCredentials($username, $password, $reference_token);
		} elseif (!is_null($username)) {
			$this->setAccessToken($username);
		}
	}
	public function setCredentials ($username, $password, $reference_token = null, $type = null) {
		if (is_null($type)) $type = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "mobile";
		$this->credentials["username"] = strval($username);
		$this->credentials["password"] = strval($password);
		$this->credentials["type"] = strval($type);
		$this->setAccessToken(null);
	}
	public function setAccessToken ($access_token) {
		$this->access_token = is_null($access_token) ? null : strval($access_token);
	}
	public function request ($method, $endpoint, $headers = array(), $data = null) {
		$this->data = null;
		$handle = curl_init();
		if (!is_null($data)) {
			curl_setopt($handle, CURLOPT_POSTFIELDS, is_array($data) ? json_encode($data) : $data);
			if (is_array($data)) $headers = array_merge(array("Content-Type" => "application/json"), $headers);
		}
		curl_setopt_array($handle, array(
			CURLOPT_URL => $this->mobile_api_gateway.ltrim($endpoint, "/"),
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_PROXY => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTPHEADER => array(
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
				"Accept-Language: en-US,en;q=0.5",
				"Cache-Control: no-cache",
				"Connection: keep-alive"
			),
			CURLOPT_USERAGENT => "V2/6.0.1 (com.tdcm.truemoneywallet; build:706; android 10) Chrome/6.0.1",
			CURLOPT_HTTPHEADER => $this->buildHeaders($headers)
		));
		if (is_array($this->curl_options)) curl_setopt_array($handle, $this->curl_options);
		$this->response = curl_exec($handle);
		$this->http_code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		if ($result = json_decode($this->response, true)) {
			if (isset($result["data"])) $this->data = $result["data"];
			return $result;
		}
		return $this->response;
	}
	public function buildHeaders ($array) {
		$headers = array();
		foreach ($array as $key => $value) {
			$headers[] = $key.": ".$value;
		}
		return $headers;
	}
	public function getTimestamp() {
		return round(microtime(true) * 1000);
	}
	public function hashPassword($username, $password, $time) {
		$a = hash('sha256', $username . $password);
		$b = hash('sha256', (strlen($time) > 4) ? substr($time, 4) : $time);
		return hash('sha256', $b . $a);
	}
	public function RequestLoginOTP () {
		if (!isset($this->credentials["username"]) || !isset($this->credentials["password"]) || !isset($this->credentials["type"])) return false;
		$timestamp = $this->getTimestamp();
		$result = $this->request("GET", "mobile-auth-service/v1/password/login/otp", array(
			"timestamp" => $timestamp,
			"type" => $this->credentials["type"],
			"username" => $this->credentials["username"],
			"password" => $this->hashPassword($this->credentials["username"], $this->credentials["password"], $timestamp)
		));
		return $result;
	}
	public function SubmitLoginOTP ($otp_code, $mobile_number = null, $otp_reference = null) {
		if (is_null($mobile_number) && isset($this->data["mobile_number"])) $mobile_number = $this->data["mobile_number"];
		if (is_null($otp_reference) && isset($this->data["otp_reference"])) $otp_reference = $this->data["otp_reference"];
		if (is_null($mobile_number) || is_null($otp_reference)) return false;
		$timestamp = $this->getTimestamp();
		$result = $this->request("POST", "/mobile-auth-service/v1/password/login/otp", array(
			"timestamp" => $timestamp,
			"X-Device" => $this->device_id
		), array(
			"brand" => "Xiaomi",
			"device_os" => "android",
			"device_name" => "Redmi Note 8 Pro",
			"device_id" => $this->device_id,
			"model_number" => "Redmi Note 8 Pro",
			"model_identifier" => "Redmi Note 8 Pro",
			"app_version" => "5.11.0",
			"type" => $this->credentials["type"],
			"username" => $this->credentials["username"],
			"password" => $this->hashPassword($this->credentials["username"], $this->credentials["password"], $timestamp),
			"mobile_tracking" => $this->mobile_tracking,
			"otp_code" => $otp_code,
			"otp_reference" => $otp_reference,
			"timestamp" => $timestamp,
			"mobile_number" => $mobile_number
		));
		if (isset($result["data"]["access_token"])) $this->setAccessToken($result["data"]["access_token"]);
		return $result;
	}

	public function Logout () {
		if (is_null($this->access_token)) return false;
		return $this->request("POST", "/api/v1/signout/".$this->access_token);
	}
	public function GetProfile () {
		if (is_null($this->access_token)) return false;
		return $this->request("GET", "/user-profile-composite/v1/users/", array(
			"Authorization" => $this->access_token
		));
	}
	public function GetBalance () {
		if (is_null($this->access_token)) return false;
		return $this->request("GET", "/api/v1/profile/balance/".$this->access_token);
	}
	public function GetTransaction ($limit = 100, $start_date = null, $end_date = null) {
		if (is_null($this->access_token)) return false;
		if (is_null($start_date) && is_null($end_date)) $start_date = date("Y-m-d", strtotime("-5 days") - date("Z") + 25200);
		if (is_null($end_date)) $end_date = date("Y-m-d", strtotime("+4 day") - date("Z") + 25200);
		if (is_null($start_date) || is_null($end_date)) return false;
		return $this->request("GET", "/user-profile-composite/v1/users/transactions/history/?".http_build_query(array(
			"start_date" => strval($start_date),
			"end_date" => strval($end_date),
			"limit" => intval($limit),
		)), array(
			"X-Device" => $this->device_id,
			"Authorization" => $this->access_token
		));
	}
	public function GetTransactionReport ($report_id) {
		if (is_null($this->access_token)) return false;
		return $this->request("GET", "/user-profile-composite/v1/users/transactions/history/detail/".strval($report_id), array(
			"Authorization" => $this->access_token
		));
	}
}
?>