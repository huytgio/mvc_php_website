<?php
include 'inc/header.php';
include 'inc/slider.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
	  {
	    $cart_ID = $_POST['cart_ID'];
		$quantity = $_POST['quant'];
	    $updatecarrt = $cart->update_cart($quantity, $cart_ID);
		if($quantity<=0)
		{
			$delCart = $cart->delete_cart($cart_ID);
		}
	  }
if(isset($_GET['del_ID']))
	  {
		  $id = $_GET['del_ID'];
	      $delCart = $cart->delete_cart($id);
	  }

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng của bạn</h2>
					<?php
					if(isset($delCart))
					{
	                    echo $delCart;
					} 
					?>
						<table class="tblone">
						<span style="color:red;font-size:18px"><?php 
						if(isset($updatecarrt)){echo $updatecarrt;}
						?></span>
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="15%">giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Hành động</th>
							</tr>
							<?php
							

                            $get_pd_cart = $cart->get_pd_cart();
                            if ($get_pd_cart) {
	                            $i = 0;
	                            $t = 1;
	                            while ($result = $get_pd_cart->fetch_assoc()) {


                            ?>
							<tr>
								<td><?php echo $result['product_Name'] ?> </td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="quant" min="1" value="<?php echo $result['quantity'] ?>"/>
										<input type="hidden" name="cart_ID" min="1" value="<?php echo $result['cart_ID'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
		                            $numprice = $str = intval(preg_replace('/\D/', '', $result['price']));
		                            $totalprice = $numprice * $result['quantity'];
		                            $totalprice1 = number_format($totalprice, 0, ',', '.');
		                            $i += $totalprice;
		                            $totalquant = $t * $result['quantity'];
		                            echo $totalprice1 . " VND";

                                ?></td>
								<td><a onclick="return confirm('Bạn chắc chắn muốn xóa dòng này?')" href="?del_ID=<?php echo $result['cart_ID'] ?>">Xóa</a></td>
							</tr>
							<?php
	                            }

                            ?>
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
						<?php
                            }else {
							echo "<span style ='color:red;size='40px'> Giỏ hàng của bạn đang trống </span>";}
						?>
							<tr>
								<th>Tổng giá(chưa tính thuế):</th>
								<td><?php
                                if (isset($i)) 
								{
	                                Session::set('sum', $i);
	                                Session::set('sum2', $totalquant);
                                }else
								{
									Session::set('sum', 0);
	                                Session::set('sum2', 0);
								}
                                if (isset($i) && $i != 0) {
	                                echo number_format($i, 0, ',', '.') . " VND";
                                }else
								{
	                                echo "0 VND";
								}
								?></td>
							</tr>
					<br>
							<tr>
								<th>VAT(10%): </th>
								<td><?php 
								if(isset($i))
								{
								$vat = $i * 0.1;
	                                echo number_format($vat, 0, ',', '.') . " VND";
								}else
								{
	                                $vat = 0;
	                                echo '0 VND';
								}
								
								?></td>
							</tr>
					<br>
							<tr>
								<th>Tổng giá(đã bao gồm thuế):</th>
								<td><?php
                                if (isset($i)) 
								{
	                                $gtotal = $i + $vat;
	                                echo number_format($gtotal, 0, ',', '.') . " VND";
                                }else
								{
	                                echo '0 VND';
								}
								 ?></td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 include 'inc/footer.php';
 ?>


