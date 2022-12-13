<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
                $pd1 = new product();
                $getnew_cc = $pd1->getnew_cc();
				if($getnew_cc)
				{
					while($resultcc = $getnew_cc->fetch_assoc())
					{

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultcc['product_ID']?>"> <img src="admin/upload/<?php echo $resultcc['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Điện thoại cao cấp</h2>
						<h2><?php echo $resultcc['product_Name']?></h2>
						
						<div class="button"><span><a href="details.php?proid=<?php echo $resultcc['product_ID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>
			   <?php 
			          }
					}
			   ?>
				<?php
                $getnew_tt = $pd1->getnew_tt();
				if($getnew_tt)
				{
					while($resulttt = $getnew_tt->fetch_assoc())
					{

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resulttt['product_ID']?>"> <img src="admin/upload/<?php echo $resulttt['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Điện thoại Tầm trung</h2>
						<h2><?php echo $resulttt['product_Name']?></h2>
						
						<div class="button"><span><a href="details.php?proid=<?php echo $resulttt['product_ID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>
			   <?php 
			          }
					}
			   ?>
			</div>
			<div class="section group">
			<?php
                $getnew_cu = $pd1->getnew_cu();
				if($getnew_cu)
				{
					while($resultcu = $getnew_cu->fetch_assoc())
					{

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultcu['product_ID']?>"> <img src="admin/upload/<?php echo $resultcu['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Điện thoại cao cấp</h2>
						<h2><?php echo $resultcu['product_Name']?></h2>
						
						<div class="button"><span><a href="details.php?proid=<?php echo $resultcu['product_ID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>
			   <?php 
			          }
					}
			   ?>	
				<?php
                $getnew_pk = $pd1->getnew_pk();
				if($getnew_pk)
				{
					while($resultpk = $getnew_pk->fetch_assoc())
					{

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultpk['product_ID']?>"> <img src="admin/upload/<?php echo $resultpk['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Phụ Kiện</h2>
						<h2><?php echo $resultpk['product_Name']?></h2>
						
						<div class="button"><span><a href="details.php?proid=<?php echo $resultpk['product_ID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>
			   <?php 
			          }
					}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1a.png" alt=""/></li>
						<li><img src="images/2a.png" alt=""/></li>
						<li><img src="images/3a.png" alt=""/></li>
						<li><img src="images/4a.png" alt=""/></li>
						<li><img src="images/1.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>

	    </div>
	  <div class="clear"></div>
  </div>