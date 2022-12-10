<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/category.php';
include '../classes/brand.php';
include '../classes/product.php';
include_once '../helpers/format.php';
$pd = new product();
if(isset($_GET['del_ID']))
{
    $id = $_GET['del_ID'];
	$delPD = $pd->delete_product($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
		<?php
					if (isset($delPD))
					{
						echo $delPD;
					}
		?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Mô tả</th>
					<th>Loại</th>
					<th>Danh mục</th>
					<th>Nhãn Hiệu</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd = new product();
                $fm = new Format();
				$pdlist = $pd->show_product();
				if($pdlist)
				{
	                $i = 0;
					while($result = $pdlist->fetch_assoc()){
		                $i++;
						
					
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['product_Name']?> </td>
					<td> <?php echo $result['price']?></td>
					<td class="center"><img src="./upload/<?php echo $result['image']?>" width="100"> </td>
					<td><?php
					$desc = mb_convert_encoding($result['product_desc'],'UTF-8');
					echo $fm->textShorten($desc,50)?></td>
					<td><?php 
					if($result['pd_status']==1)
					{
			                echo 'Hàng mới';
					}elseif($result['pd_status']==0)
					{
			                echo 'Hàng cũ/Hàng qua tay';
					}
					?></th>
					<td><?php echo $result['cat_Name']?></th>
					<td><?php echo $result['brand_Name']?></th>
					<td><a href="productedit.php?product_ID=<?php echo $result['product_ID']?>">Sửa</a> 
					
					
					|| <a onclick="return confirm('Bạn chắc chắn muốn xóa dòng này?')" href="?del_ID=<?php echo $result['product_ID']?>">Xóa</a></td>
				</tr>
				<?php
				}
			}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
