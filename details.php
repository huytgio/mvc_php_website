<?php
include 'inc/header.php';
//include_once 'inc/slider.php';
if(isset($_GET['proid']) && $_GET['proid']!=NULL)
      {
          $id = $_GET['proid'];
      }
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
	  {
		$quantity = $_POST['quant'];
	    $addtocart = $cart->addtocart($quantity, $id);
	  }
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
            $get_dtpd_by_ID = $pd->getdtpdbyID($id);
			if($get_dtpd_by_ID)
			{
				while($result_dtpd = $get_dtpd_by_ID->fetch_assoc())
				{

				
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result_dtpd['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_dtpd['product_Name']?></h2>
					<p><?php if($result_dtpd['pd_status']==1)
					{
			                echo 'Hàng mới';
					}elseif($result_dtpd['pd_status']==0)
					{
			                echo 'Hàng cũ/Hàng qua tay';
					}
					?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_dtpd['price']?></span></p>
						<p>Doanh mục: <span><?php echo $result_dtpd['cat_Name']?></span></p>
						<p>Hãng:<span><?php echo $result_dtpd['brand_Name']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quant" value="quant" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						<span style="color:red;font-size:18px"><?php 
						if(isset($addtocart)){echo $addtocart;}
						?></span>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>chi tiết sản phẩm</h2>
			<p><?php echo $result_dtpd['product_desc']?></p>
	    </div>
				
	</div>
	<?php
	}
}
           
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục sản phụ</h2>
					<ul>
					<?php $get_cat = $cat->show_category();
					if($get_cat)
					{
						while($r_getcat = $get_cat->fetch_assoc())
						{

						
					?>
				      <li><a href="productbycat.php?catpbid=<?php echo $r_getcat['cat_ID'] ?>"><?php echo $r_getcat['cat_Name'] ?></a></li>
					  <?php
					  }
					}
					?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	 <?php
 include 'inc/footer.php';
 ?>
	