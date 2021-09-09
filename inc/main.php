<?php
if(@$_GET){
	switch($_GET['p']){
		case "register";
			include "user/register.php";
		break;
		case "profil";
			include "user/profil.php";
		break;
		case "login";
			include "user/login.php";
		break;
		case "logout";
			include "user/logout.php";
		break;
		case "delete";
			include "user/deleteaccount.php";
		break;
		case "success";
			include "user/success.php";
		break;
		case "single";
			include "page/single.php";
		break;
		case "brands";
			include "page/brands.php";
		break;
		case "home";
			include "page/home.php";
		break;
		case "productbrand";
			include "page/productbrand.php";
		break;
		case "cart";
			include "cart/cart.php";
		break;
		case "checkout";
			include "cart/checkout.php";
		break;
		case "order";
			include "cart/order_detail.php";
		break;
		case "catdetails";
			include "page/catdetails.php";
		break;
		case "category";
			include "page/category.php";
		break;
		default:
			echo '<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 class="text-center text1">Page was not found</h2>
								</div>
							</div>
					</div>';
		break;
	}
}else{
	include "page/home.php";
}
?>