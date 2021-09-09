<!--Banner-->
	<div class="banner">
		<img src="../assets/img/slide-1.png" alt="">
	</div>
<div class="clearfix"></div>

<!-- Services -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Layanan Kami</h2>
		</div>
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-user"></i>
			</div>
			<h4 class="text2"><b>konsultasi kesehatan gratis</b></h4>
			<p>Konsultasikan hewan peliharaan anda secara online dan gratis disini.</p>
		</div>

		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-bus"></i>
			</div>
			<h4 class="text2"><b>biaya ongkos kirim gratis</b></h4>
			<p>Tidak perlu ongkos kirim, gratis kirim kemana saja.</p>
		</div>

		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-money"></i>
			</div>
			<h4 class="text2"><b>garansi 100% uang kembali</b></h4>
			<p>Garansi uang kembali apabila anda kurang puas dengan produk kami.</p>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<!--All Products-->
<div class="top-products">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="text-center text1">Semua Produk</h2>
			</div>
		</div>
		<div class="row product">
			<?php
			$perpage = 20;
			$page = isset($_GET['page']) ? $_GET['page'] : "";

			if (empty($page)) {
				$num = 0;
				$page = 1;
			} else {
				$num = ($page - 1) * $perpage;
			}

			$query = "SELECT * FROM items WHERE available = 'Ada' ORDER by item_id ASC LIMIT $num, $perpage";
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
			$sql = mysqli_query($conn, "SELECT * FROM items");
			$total_record = mysqli_num_rows($sql);
			$total_page = ceil($total_record / $perpage);
			?>
			<div class="col-lg-12 col-xs-12">
				<nav class="text-center">
					<ul class="pagination">
						<?php
						if ($page > 1) {
							$prev = "<a href='../index.php?p=home&page=1'><span aria-hidden='true'>First</span></a>";
						} else {
							$prev = "<a href=''><span aria-hidden='true'>First</span></a>";
						}
						$number = '';
						for ($i = 1; $i <= $total_page; $i++) {
							if ($i == $page) {
								$number .= "<a href='../index.php?p=home&page=$i'>$i</a>";
							} else {
								$number .= "<a href='../index.php?p=home&page=$i'>$i</a>";
							}
						}
						if ($page < $total_page) {
							$link = $page + 1;
							$next = "<a href='../index.php?p=home&page=$total_page'><span aria-hidden='true'>Last</span></a>";
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
</div>
<div class="clearfix"></div>

<!-- All Brands -->

<div class="clearfix"></div>