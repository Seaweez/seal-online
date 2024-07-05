<?php 
	date_default_timezone_set('Asia/Bangkok');
	include 'database.class.php';

	class pdo_mysql {

		protected $HOST 		= 'localhost';
		protected $USER 		= 'root';
		protected $PASSWORD 	= '';
		protected $DATABASE 	= 'seal_member';
		protected $DATABASE2 	= 'gdb0101';
		protected $DATABASE3 	= 'item';

		public function __construct() {
			$this->dbserver 	= $this->DB_server();
			$this->db 			= $this->DB_PDO();
			$this->db2 			= $this->DB_PDO2();
			$this->db3 			= $this->DB_PDO3();
		}

		public function DB_server() {
			$conn = new Database($this->DATABASE, $this->USER, $this->PASSWORD,$this->HOST);
			return $conn;
		}

		public function DB_PDO() {
			$opt = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => FALSE,
			);
			$dsn = "mysql:host=" . $this->HOST . ';dbname=' . $this->DATABASE . ';charset=utf8';
			try {
				$pdo_connect = new PDO($dsn, $this->USER, $this->PASSWORD, $opt);
			} catch (Exception $e) {
				$pdo_connect = $e->GetMessage();
			}
			return $pdo_connect;
		}

		public function DB_PDO2() {
			$opt = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => FALSE,
			);
			$dsn = "mysql:host=" . $this->HOST . ';dbname=' . $this->DATABASE2 . ';charset=utf8';
			try {
				$pdo_connect = new PDO($dsn, $this->USER, $this->PASSWORD, $opt);
			} catch (Exception $e) {
				$pdo_connect = $e->GetMessage();
			}
			return $pdo_connect;
		}

		public function DB_PDO3(){
			$opt = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => FALSE,
			);
			$dsn = "mysql:host=" . $this->HOST . ';dbname=' . $this->DATABASE3 . ';charset=utf8';
			try {
				$pdo_connect = new PDO($dsn, $this->USER, $this->PASSWORD, $opt);
			} catch (Exception $e) {
				$pdo_connect = $e->GetMessage();
			}
			return $pdo_connect;
		}
	}
?>