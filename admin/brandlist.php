<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/brand.php';
$brand = new brand();
if(isset($_GET['del_ID']))
{
    $id = $_GET['del_ID'];
	$delBrand = $brand->delete_brand($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Các nhãn hiệu</h2>
                <div class="block">
					<?php
					if (isset($delbrand))
					{
						echo $delBrand;
					}
					?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Nhãn hiệu</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$show_brand = $brand->show_brand();
                        if ($show_brand) {
	                        $i = 0;
	                        while ($result = $show_brand->fetch_assoc()) {
		                        $i++;
	                        

                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['brand_Name'] ?></td>
							<td><a href="brandedit.php?brand_ID=<?php echo $result['brand_ID']?>">Sửa</a> || 
							<a onclick="return confirm('Bạn chắc chắn muốn xóa dòng này?')" href="?del_ID=<?php echo $result['brand_ID']?>">Xóa</a></td>
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

