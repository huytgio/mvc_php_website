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
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
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
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục mới</h2>
                <div class="alert info">
        <span class="closebtn">&times;</span>
                <?php
                if (isset($insertCat))
                {
                    echo $insertCat;
                }
                ?>
                </div>
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