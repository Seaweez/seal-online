<!DOCTYPE html>
<html>

<head>
	<title>Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่</title>
	<meta charset="utf-8">
	<!-- seo fb setting -- www.seal-evo.com -->
	<meta property="og:title" content="Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่">
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.sealmaple.com/" />
	<meta property="og:site_name" content="Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่" />
	<meta name="description" content="Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่" />
	<meta property="og:description" content="Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่" />
	<meta property="og:image" content="assets/img/eddga-icon.ico?v=2" />
	<meta name="keywords" content="Maple Seal Online Plus ความสนุกสนานรูปแบบใหม่" />
	<meta name="robots" content="index,follow">
	<?php
	$page = $_GET['page'];

	if (isset($_SESSION['username']) === false) {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'header-1.php';
		} else if ($page == "register" || $page == "login") {
			include 'header-2.php';
		} else {
			include 'header-1.php';
		}
	} else {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'header-1.php';
		} else if ($page == "member" || $page == "register" || $page == "login" || $page  == "changepassword" || $page  == "random" || $page  == "itemshop" || $page  == "ban" || $page  == "transferitemcash" || $page == "statusreset" || $page == "item_mall" || $page == "login_event" || $page == "webpanel") {
			include 'header-2.php';
		} else {
			include 'header-1.php';
		}
	}


	?>
</head>

<body data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="" style="margin: 0px;" data-topbar="dark" data-layout="horizontal">

	<?php

	if (isset($_SESSION['username']) === false) {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'nav-1.php';
		} else if ($page == "register" || $page == "login") {
			include 'nav-2.php';
		} else {
			include 'nav-1.php';
		}
	} else {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'nav-1.php';
		} else if ($page == "member" || $page == "register" || $page == "login" || $page  == "changepassword" || $page  == "random" || $page  == "itemshop" || $page  == "ban" || $page  == "transferitemcash" || $page == "statusreset" || $page == "item_mall" || $page == "login_event" || $page == "webpanel") {
			include 'nav-2.php';
		} else {
			include 'nav-1.php';
		}
	}


	if (!isset($_SESSION['username'])) {
		if ($page == "home" || $page == "register" || $page == "login" || $page == "download" ||  $page == "infoclass") {
			include '!page/' . $page . '_2.php';
		} else {
			include '!page/home_2.php';
		}
	} else {

		if ($page == "home") {
			include '!page/home_2.php';
		} elseif ($page == "download") {
			include '!page/download_2.php';
		} elseif ($page == "infoclass") {
			include '!page/infoclass_2.php';
		}
		// elseif ($page == "topup") {
		// 	include '!page/topup.php';
		// } 
		// elseif ($page == "ctopup") {
		// 	include '!page/ctopup.php';
		// } 
		// edited by Ghilman
		elseif ($page == "statusreset") {
			include '!page/statusreset.php';
		}
		elseif ($page == "item_mall") {
			include '!page/item_mall.php';
		}
		elseif ($page == "login_event") {
			include '!page/login_event.php';
		}
		elseif ($page == "webpanel") {
			include '!page/webpanel.php';
		}
		// end
		elseif ($page == "ban") {
			include '!page/banned.php';
		} elseif ($page == "transferitemcash") {
			include '!page/transferitemcash.php';
		} elseif ($page == "changepassword") {
			include '!page/changepasswd_2.php';
		} elseif ($page == "random") {
			include '!page/csgogame_2.php';
		} elseif ($page == "itemshop") {
			include '!page/itemshop_2.php';
		} elseif ($page == "member") {
			include '!page/member_2.php';
		} elseif ($page == "register") {
			include '!page/member_2.php';
		} elseif ($page == "login") {
			include '!page/member_2.php';
		} else {
			include '!page/home_2.php';
		}
	}

	if (isset($_SESSION['username']) === false) {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'footer-1.php';
		} else if ($page == "register" || $page == "login") {
			include 'footer-2.php';
		} else {
			include 'footer-1.php';
		}
	} else {
		if ($page == "home" ||  $page == "infoclass" || $page == "download") {
			include 'footer-1.php';
		} else if ($page == "member" || $page == "register" || $page == "login" || $page  == "changepassword" || $page  == "random" || $page  == "itemshop" || $page  == "ban" || $page  == "transferitemcash" || $page == "statusreset" || $page == "item_mall" || $page == "login_event" || $page == "webpanel") {
			include 'footer-2.php';
		} else {
			include 'footer-1.php';
		}
	}



	?>

</body>

</html>