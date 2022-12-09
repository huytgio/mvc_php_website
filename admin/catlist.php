<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/category.php';
$cat = new category();
if(isset($_GET['del_ID']))
{
    $id = $_GET['del_ID'];
	$delCat = $cat->delete_category($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Các danh mục</h2>
                <div class="block">
					<?php
					if (isset($delCat))
					{
						echo $delCat;
					}
					?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Danh Mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$show_cate = $cat->show_category();
                        if ($show_cate) {
	                        $i = 0;
	                        while ($result = $show_cate->fetch_assoc()) {
		                        $i++;
	                        

                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['cat_Name'] ?></td>
							<td><a href="catedit.php?cat_ID=<?php echo $result['cat_ID']?>">Sửa</a> || 
							<a onclick="return confirm('Bạn chắc chắn muốn xóa dòng này?')" href="?del_ID=<?php echo $result['cat_ID']?>">Xóa</a></td>
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

