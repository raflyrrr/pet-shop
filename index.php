<?php
error_reporting(E_ALL ^ E_NOTICE);

include "connect.php";
include "library.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<base href="kia/">
	<!-- meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kia Petshop</title>
	<meta name="keywords" content="aniamls" />
	<meta name="author" content="Ananda Tri Putra/>
	
	<!-- mobile specific -->
	<meta name=" viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1" />

	<!-- Favicon -->

	<!-- Offline -->
	<link rel="stylesheet" type="text/css" href="../assets/css/miistore.css" media="screen, print" />
	<link rel="stylesheet" type="text/css" href="../assets/css/coreSlider.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/flexslider.css" media="screen" />

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<?php ob_start();

	include "connect.php";
	date_default_timezone_set('Asia/Jakarta');
	$userIP = $_SERVER['REMOTE_ADDR'];
	$date = date('Y-m-d');
	$time = date('G:i:s');

	if (!isset($_COOKIE['visitor'])) {
		$timed = strtotime('next day 00:00');
		setcookie('visitor', 'hey', $timed);
	}

	$query = mysqli_query($conn, "SELECT * FROM counter WHERE counter_date = '$date'");
	if (mysqli_num_rows($query) == 0) {
		mysqli_query($conn, "INSERT INTO counter VALUES (NULL, '$userIP', '$date', '$time', 1)");
	} else {
		$row = mysqli_fetch_assoc($query);
		if (!isset($_COOKIE['visitor'])) {
			$newIP = $row['counter_ip'];
			if (!preg_match('/' . $userIP . '/', $newIP)) {
				$newIP .= "$userIP";
			}
			mysqli_query($conn, "UPDATE counter SET counter_ip = '$newIP', counter_visit = counter_visit + 1, counter_time = '$time' WHERE counter_date = '$date'");
		}
	}

	include "inc/header-navigation.php";
	include "inc/main.php";
	include "inc/newsletter-footer.php";

	ob_end_flush();
	?>

	<!-- JS Offline -->
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/coreSlider.js"></script>
	<script defer src="../assets/js/jquery.flexslider.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/custom.js"></script>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function() {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/6130b642d6e7610a49b34769/1fej4ftks';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
</body>

</html>