<?php
include 'inc/header.php';
include 'inc/slider.php';
if(isset($_GET['catpbid']))
      {
          $id = $_GET['catpbid'];
      }
?>

 <div class="main">
	<?php
    $getpdbycatID = $pd->getpdbycatID($id);
	if($getpdbycatID)
	{
		while($result = $getpdbycatID->fetch_assoc()){
			
		
	?>
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['cat_Name'] ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['product_Name'] ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price"><?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['product_ID']?>" class="details">Chi tiết</a></span></div>
				</div>
			</div>
    </div>
	<?php
	}
}
	?>
 </div>
 <?php
 include 'inc/footer.php';
 ?>
