<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/category.php';
  $cat = new category();
if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	$cat_Name = $_POST['cat_Name'];
    $insertCat = $cat->insert_category($cat_Name);
  }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục mới</h2>
                <?php
                if (isset($insertCat))
                {
                    echo $insertCat;
                }
                ?>
               <div class="block copyblock"> 
                 <form action = "catadd.php" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "cat_Name" placeholder="Nhập tên danh mục tại dây!" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>