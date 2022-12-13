<?php
include './lib/session.php';
Session::init();
include './lib/database.php';
include './helpers/format.php';
/* include './classes/brand.php';
include './classes/cart.php';
include './classes/category.php';
include './classes/product.php';
include './classes/user.php'; */

spl_autoload_register(function($className) {
    include_once "./classes/" .$className . '.php';
});
$pm = new payment();
$cs = new customer();
$db = new Database();
$fm = new Format();
$cart = new cart();
$user = new user();
$cat = new category();
$brand = new brand();
$pd = new product();

?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Tử Kỳ Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Tìm kiếm Sản Phẩm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm Sản Phẩm';}"><input type="submit" value="Tìm Kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">
									<?php
                                    $sum2 = Session::get("sum2");
                                    echo $sum2;
                                    
									?>
								</span>
								<span class="no_product">
								<?php
                                $sum = Session::get("sum");
								echo number_format($sum, 0, ',', '.') . " VND";
								
								
								?>
								</span>
							</a>
						</div>
			      </div>
		   <div class="login"><a href="admin/login.php"> admin</a></div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang Chủ</a></li>
	  <li><a href="products.php">Sản Phẩm</a> </li>
	  <li><a href="topbrands.php">Nhãn hiệu</a></li>
	  <li><a href="cart.php">Vỏ Hàng</a></li>
	  <li><a href="login.php">Thành viên Đăng nhập</a> </li>
	  <div class="clear"></div>
	</ul>
</div>