<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Điền thông tin</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                 </form>
                 <p class="note"><a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Đăng nhập</button></div></div>
                    </div>
    	<div class="register_account">
    		<h3>Đăng ký tk mới</h3>
    		<form>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="Name" placeholder="Tên đăng nhập">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" value="Address" placeholder="Địa chỉ">
						</div>

				  
				  <div>
					<input type="text" value="Password" placeholder="Mật Khẩu" >
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey">Tạo</button></div></div>
		    <p class="terms"> <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 include 'inc/footer.php';
 ?>
