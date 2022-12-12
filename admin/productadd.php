<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: black;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
      include '../classes/category.php';
      include '../classes/brand.php';
      include '../classes/product.php';

      $pd = new product();
      if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
        {
          $insertProduct = $pd->insert_product($_POST,$_FILES);
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm mới</h2>
        <div class="block">
        <div class="alert info">
        <span class="closebtn">&times;</span>
        <?php
                if (isset($insertProduct))
                {
                    echo $insertProduct;
                }
                ?>  
        </div>         
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="product_Name" placeholder="Nhập tên sản phẩm " class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>--------Chọn danh mục--------</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if($catlist)
                            {
                                while($result = $catlist->fetch_assoc())
                                {

                                
                            
                            ?>
                            <option value="<?php echo $result['cat_ID']?>">+<?php echo $result['cat_Name']?> </option>
                            <?php
                             }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Nhãn Hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>--------Chọn nhãn hiệu--------</option>
                            <?php 
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist)
                            {
                                while($result = $brandlist->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $result['brand_ID']?>">+<?php echo $result['brand_Name']?> </option>
                            <?php
                             }
                            }
                            ?>
                    
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Miêu tả</label>
                    </td>
                    <td>
                        <input type="text" name="product_desc" placeholder="Nhập miêu tả" class="tinymce"/>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Thêm hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng thái</label>
                    </td>
                    <td>
                        <select id="select" name="pd_status">
                            <option value="<?php echo 1+0 ?>">Hàng mới</option>
                            <option value="<?php echo 0+0 ?>">Hàng qua tay</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Submit" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
<?php include 'inc/footer.php';?>


