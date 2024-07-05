<?php
include 'AltoRouter.class.php';
include 'system.class.php';
class router {

	public function __construct() {
		$this->router = new AltoRouter();
	}

	public function start_router(){
		$this->load_router();
		$this->end_router();
	}

	private function load_router(){
		$this->router->map( "GET", "/", function(){
			$this->loadpage2("login");
		});
		$this->router->map( "GET", "/home", function(){
			$this->loadpage2("login");
		});
		$this->router->map( "GET", "/download", function(){
			$this->loadpage("download");
		});
		$this->router->map( "GET", "/infoskill", function(){
			$this->loadpage("infoskill");
		});
		$this->router->map( "GET", "/update", function(){
			$this->loadpage("update");
		});
		$this->router->map( "GET", "/guide", function(){
			$this->loadpage("guide");
		});

		$this->router->map( "GET", "/login", function(){
			$this->loadpage2("login");
		});
		$this->router->map( "GET", "/register", function(){
			$this->loadpage2("register");
		});

		if(!empty($_SESSION['user_name'])) {
			$this->router->map( "GET", "/member", function(){
				$this->loadpage2("member");
			});
			$this->router->map( "GET", "/topup", function(){
				$this->loadpage2("topup");
			});
			$this->router->map( "GET", "/rc", function(){
				$this->loadpage2("rc");
			});
			$this->router->map( "GET", "/changepassword", function(){
				$this->loadpage2("changepassword");
			});
			$this->router->map( "GET", "/tranrc", function(){
				$this->loadpage("tranrc");
			});
			$this->router->map( "GET", "/buyrc", function(){
				$this->loadpage("buyrc");
			});
			$this->router->map( "GET", "/kickplayer", function(){
				$this->loadpage2("kickplayer");
			});
			$this->router->map( "GET", "/promotion", function(){
				$this->loadpage2("promotion");
			});
		}

		//=================API===================
		$this->router->map( "POST", "/api/v1/register", function(){
			$this->loadapi("register");
		});
		$this->router->map( "POST", "/api/v1/login", function(){
			$this->loadapi("login");
		});
		$this->router->map( "POST", "/api/v1/logout", function(){
			$this->loadapi("logout");
		});
		$this->router->map( "POST", "/api/v1/sellrc", function(){
			$this->loadapi("sellrc");
		});
		$this->router->map( "POST", "/api/v1/buyrc", function(){
			$this->loadapi("buyrc");
		});
		$this->router->map( "POST", "/api/v1/changepassword", function(){
			$this->loadapi("changepassword");
		});
		$this->router->map( "POST", "/api/v1/kickplayer", function(){
			$this->loadapi("kickplayer");
		});
		$this->router->map( "POST", "/api/v1/topup", function(){
			$this->loadapi("topup");
		});
		$this->router->map( "POST", "/api/v1/getreward", function(){
			$this->loadapi("getreward");
		});
	}

	private function end_router(){
		$match = $this->router->match();
		if( is_array($match) && is_callable( $match['target'] ) ) {
			call_user_func_array( $match['target'], $match['params'] );
		} else {
			$this->loadpageerror();
		}
	}

	private static function htmlheader(){
		require_once 'views/body/style.php';
		require_once 'views/body/header.php';
		require_once 'views/body/navbar.php';
	}

	private static function htmlfooter(){
		require_once 'views/body/footer.php';
	}

	private static function htmlheader2(){
		require_once 'views/body/header2.php';
	}

	private static function htmlfooter2(){
		require_once 'views/body/footer2.php';
	}

	private function loadpage($page){
		$page_now = $page;
		$class = new system();
		Self::htmlheader();
		require_once "views/page/" . $page . ".php";
		Self::htmlfooter();
	}

	private function loadpage2($page){
		$page_now = $page;
		$class = new system();
		Self::htmlheader2();
		require_once "views/page/" . $page . ".php";
		Self::htmlfooter2();
	}

	private function loadpageerror(){
		require_once "views/page/404.php";
	}

	private function loadapi($nameapi){
		$class = new system();
		require_once "controller/api/".$nameapi.".php";
	}
}
?>