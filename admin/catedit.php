<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/category.php';
if(isset($_GET['cat_ID']) && $_GET['cat_ID']!=NULL)
{
    $id = $_GET['cat_ID'];
}else
{
    echo "Lỗi!";
    header("catlist.php");
}
$cat = new category();
if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	$cat_Name = $_POST['cat_Name'];
    $updateCat = $cat->update_category($cat_Name, $id);
  }



?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                if (isset($updateCat))
                {
                    echo $updateCat;
                }
                $get_cat_name = $cat->getcatbyID($id);
                if($get_cat_name)
                {
                    while($result=$get_cat_name->fetch_assoc())
                    {

                    
                ?>
               <div class="block copyblock"> 
                 <form action = "" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['cat_Name']?>" name = "cat_Name" placeholder=" Sửa tên danh mục tại dây!" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>