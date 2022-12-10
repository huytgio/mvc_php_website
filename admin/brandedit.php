<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
include '../classes/brand.php';
if(isset($_GET['brand_ID']) && $_GET['brand_ID']!=NULL)
{
    $id = $_GET['brand_ID'];
}else
{
    echo "Lỗi!";
    header("brandlist.php");
}
$brand = new brand();
if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	$brand_Name = $_POST['brand_Name'];
    $updatebrand = $brand->update_brand($brand_Name, $id);
  }



?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa nhãn hiệu</h2>
                <?php
                if (isset($updatebrand))
                {
                    echo $updatebrand;
                }
                $get_brand_name = $brand->getbrandbyID($id);
                if($get_brand_name)
                {
                    while($result=$get_brand_name->fetch_assoc())
                    {

                    
                ?>
               <div class="block copyblock"> 
                 <form action = "" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brand_Name']?>" name = "brand_Name" placeholder=" Sửa tên nhãn hiệu tại dây!" class="medium" />
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