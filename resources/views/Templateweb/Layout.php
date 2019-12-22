<!-- Header -->
<?php 
	include "../Model/FrontendDB.php";
	$db = new Database;
	$db->connect();
	$categories = $db->getAllData('danhmuc');

	CONST IMAGE_PATH = '../LayoutWeb/images/';
	CONST PRODUCT_IMAGE_PATH = '../Layout/images/products/';
?>
<?php include_once 'Header.php'; ?>

<?php
	$view = !empty($_GET['view']) ? $_GET['view'] : '';

	switch ($view) {
		case 'product_list':
		  require_once('../Controller/Frontend/ProductList/index.php');
		  break;
		case 'product_detail':
		  require_once('../Controller/Frontend/ProductDetail/index.php');
		  break;
		case 'shopingcart':
		  require_once('../Controller/Frontend/ShopingCart/index.php');
		  break;
		case 'checkout':
		  require_once('../Controller/Frontend/Checkout/index.php');
		  break;
		case 'register':
		  require_once('../Controller/Frontend/Registration/index.php');
		  break;
		case 'login':
		  require_once('../Controller/Frontend/Login/index.php');
		  break;
		case 'myaccount':
		  require_once('../Controller/Frontend/User/index.php');
		  break;  
		case 'content':
		  require_once('../Controller/Frontend/Content/index.php');
		  break;           
		default:
		include_once 'frontend/homepage.php';
		break;
	}
?>

<!-- Footer -->
<?php include_once 'Footer.php'; ?>	