</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Thông tin liên hệ</h4>
						<ul>
						<li><a href="#">Về Chúng tôi</a></li>
						<li><a href="#">Dịch Vụ CSKH</a></li>
						<li><a href="#"><span>Hỗ Trợ</span></a></li>
						<li><a href="#">Khiếu Nại</a></li>
						<li><a href="#"><span>Liên Lạc</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Ký Sự</h4>
						<ul>
						<li><a href="about.php">Hộp Thư góp ý</a></li>
						<li><a href="faq.php">Truyền Thông</a></li>
						<li><a href="#">Điều Khoản </a></li>
						<li><a href="contact.php"><span>.....</span></a></li>
						<li><a href="preview.php"><span>.....</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.php">......</a></li>
							<li><a href="index.php">Xem giỏ Hàng</a></li>
							<li><a href="#">........</a></li>
							<li><a href="#">..........</a></li>
							<li><a href="faq.php">....</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+0821971288</span></li>
							<li><span>+849012128010</span></li>
						</ul>
						<div class="social-icons">
							<h4>Mạng Xã Hội</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>toTopHover &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>