<?php
error_reporting(E_ALL ^ E_NOTICE);

include "./connect.php";
include "./library.php";
$catdetails = $_GET['catdetails'];

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
	<meta name="keywords" content="animals" />
	<meta name="author" content="Ananda Tri Putra" />

	<!-- mobile specific -->
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1" />

	<!-- Favicon -->

	<!-- Offline -->
	<link rel="stylesheet" type="text/css" href="../assets/css/miistore.css" media="screen, print" />
	<link rel="stylesheet" type="text/css" href="../assets/css/coreSlider.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/flexslider.css" media="screen" />

</head>

<body>

	<?php

	include "./inc/header-navigation.php";


	?>

	<div class="top-products">
		<div class="container">
			<div class="row product" style="margin-top: 10px;">
				<div class="col-lg-12">
					<h2 class="text-center text1"><?php echo $catdetails ?></h2>
				</div>
				<?php
				$perpage = 20;
				$page = isset($_GET['page']) ? $_GET['page'] : "";

				if (empty($page)) {
					$num = 0;
					$page = 1;
				} else {
					$num = ($page - 1) * $perpage;
				}
				$query = "SELECT * FROM items INNER JOIN brands ON brands.brd_id = items.brd_id INNER JOIN subcategories ON subcategories.scat_id = items.scat_id WHERE items.available = 'Ada' AND subcategories.subcategory = '$catdetails' ORDER by item_id ASC LIMIT $num, $perpage";
				$result = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_array($result)) {
					$totalDisc = $row['price'] - ($row['price'] * $row['discount'] / 100);
				?>
					<div class="col-md-3 col-xs-6 product-left">
						<div class="p-one">

							<img src="../miiadmin/img/<?php echo $row['bgimg']; ?>" />
							<div class="mask">
								<a href="../index.php?p=single&id=<?php echo $row['item_id']; ?>"><span>Lihat Detail</span></a>
							</div>
							<h4><?php echo $row['item_name']; ?></h4>
							<?php
							if ($row['discount'] == "0") {
								echo '
							<div class="item_price">
								<p>
									<span>Rp ' . number_format($row['price'], 0, ".", ".") . '</span>
								</p>
							</div>
							';
							} else {
								echo '
							<div class="item_price">
								<p>
									<i>Rp ' . number_format($row['price'], 0, ".", ".") . '</i>
									<span>Rp ' . number_format($totalDisc, 0, ".", ".") . '</span>
								</p>
							</div>
							';
							}
							?>
						</div>
					</div>
				<?php
				}
				$sql = mysqli_query($conn, "SELECT * FROM items INNER JOIN brands ON brands.brd_id = items.brd_id INNER JOIN subcategories ON subcategories.scat_id = items.scat_id WHERE items.available = 'Ada' AND subcategories.subcategory = '$catdetails' ORDER by item_id ASC");
				$row = mysqli_fetch_array($sql);
				$total_record = mysqli_num_rows($sql);
				$total_page = ceil($total_record / $perpage);
				?>
				<div class="col-lg-12">
					<nav class="text-center">
						<ul class="pagination">
							<?php
							if ($page > 1) {
								$prev = "<a href='../index.php?p=boysjackets&page=1'><span aria-hidden='true'>First</span></a>";
							} else {
								$prev = "<a href=''><span aria-hidden='true'>First</span></a>";
							}
							$number = '';
							for ($i = 1; $i <= $total_page; $i++) {
								if ($i == $page) {
									$number .= "<a href='../index.php?p=boysjackets&page=$i'>$i</a>";
								} else {
									$number .= "<a href='../index.php?p=boysjackets&page=$i'>$i</a>";
								}
							}
							if ($page < $total_page) {
								$link = $page + 1;
								$next = "<a href='../index.php?p=boysjackets&page=$total_page'><span aria-hidden='true'>Last</span></a>";
							} else {
								$next = "<a href=''><span aria-hidden='true'>Last</span></a>";
							}
							?>
							<li><?php echo $prev; ?></li>
							<li><?php echo $number; ?></li>
							<li><?php echo $next; ?></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix" style="margin-bottom:5%"></div>
	<?php

	include "./inc/newsletter-footer.php";


	?>

	<!-- JS Offline -->
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/coreSlider.js"></script>
	<script defer src="../assets/js/jquery.flexslider.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/custom.js"></script>

</body>

</html>