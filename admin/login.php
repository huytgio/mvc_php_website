<?php
include '../classes/adminlogin.php';
?>
<?php
  $class = new adminlogin();
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
	$admin_User = $_POST['admin_User'];
	$admin_Pass = md5($_POST['admin_Pass']);
	$login_check = $class->login_admin($admin_User,$admin_Pass);
  }


?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Đăng nhập</h1>
			<span>
				<?php
                
				if(isset($login_check))
				{
					echo $login_check;
				}
				
				?>
			</span>
			<div>
				<input type="text" placeholder="Username"  name="admin_User"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="admin_Pass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Trang đăng nhập</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>