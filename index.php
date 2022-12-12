<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Đang hot</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
            $hotpd = $pd->gethotpd();
			if($hotpd)
			{
				while($result = $hotpd->fetch_assoc())
				{

				
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image']?>" alt="" height="200" /></a>
					 <h2><?php echo $result['product_Name']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],25)?></p>
					 <p><span class="price"><?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['product_ID']?>" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<?php
				}
			}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Hàng mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<div class="section group">
			<?php
            $newpd = $pd->getnewpd();
			if($newpd)
			{
				while($result = $newpd->fetch_assoc())
				{

				
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image']?>" alt="" height="200" /></a>
					 <h2><?php echo $result['product_Name']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],25)?></p>
					 <p><span class="price"><?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['product_ID']?>" class="details">Chi tiết sản phẩm</a></span></div>
				</div>
				<?php
				}
			}
				?>
			</div>
    </div>
 </div>

 <?php
 include 'inc/footer.php';
 ?>

