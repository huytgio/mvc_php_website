<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<?php include 'inc/header.php';?>
<body>

<h2></h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Trang thanh toán</h3>
            <br>
            <label for="fname"><i class="fa fa-user"></i> Họ và tên</label>
            <input type="text" id="fname" name="firstname" placeholder="Tên">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abcxyz@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
            <input type="text" id="adr" name="address" placeholder="Nhập địa chỉ">
            <label for="city"><i class="fa fa-institution"></i> Thành phố</label>
            <input type="text" id="city" name="city" placeholder="Cần Thơ">

            <div class="row">
              <div class="col-50">
                <label for="state">Mã vùng</label>
                <input type="text" id="state" name="state" placeholder="65">
              </div>
              <div class="col-50">
                <label for="zip">Mã Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Thanh toán</h3>
            <label for="fname">Thẻ được chấp nhận</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">tên trên thẻ</label>
            <input type="text" id="cname" name="cardname" placeholder="tên">
            <label for="ccnum">Mã thẻ</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Ngày hết hạn</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Tháng 9">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Năm hết hạn</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">Ngân hàng</label>
                <input type="text" id="cvv" name="cvv" placeholder="Vietcombank">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Thanh toán online bằng thẻ
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
      <?php
      $get_pd_cart = $cart->get_pd_cart();
      if ($get_pd_cart) {
          $i = 0;
          $t = 1;
          while ($result = $get_pd_cart->fetch_assoc()) {


      ?>
      <p><a href="#"> <?php echo $result['product_Name'] ?></a> <span class="price"> <?php 
      $numprice = $str = intval(preg_replace('/\D/', '', $result['price']));
      $totalprice = $numprice * $result['quantity'];
      $totalprice1 = number_format($totalprice, 0, ',', '.');
      $i += $totalprice;
      $totalquant = $t * $result['quantity'];
      echo $totalprice1 . " VND";
      ?> </span></p>
      <hr>
      <?php
        $totalprice = $numprice * $result['quantity'];
        $i += $totalprice;
    }
        }
          
        ?>
      <p>Total:
      <span class="price" style="color:black"><b> <?php
      $vat = $i / 10;
      $iall = $i - $vat;
      echo number_format($iall, 0, ',', '.'). ' VNĐ'
      ?>  </b></span></p>
    </div>
  </div>
</div>

</body>
</html>