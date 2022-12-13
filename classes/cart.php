<?php
$filepath = realpath((dirname(__FILE__)));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

 class cart 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addtocart($quantity,$id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id= mysqli_real_escape_string($this->db->link, $id);
        $ses_ID = session_id();

        $query = "SELECT * FROM tbl_product WHERE product_ID = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $pd_name = $result['product_Name'];
        $price = $result['price'];
        $img = $result['image'];
        
        $check_add = "SELECT * FROM tbl_cart WHERE product_ID ='$id' and ses_ID = '$ses_ID'";
        $result_check = $this->db->select($check_add);
        if($result_check)
        {
            $alert = "Đã có mặt hàng này trong giỏ";
            return $alert;
        } else{
            $query_insert = "INSERT INTO tbl_cart(product_ID,quantity,ses_ID,product_Name,price,image) 
            VALUES('$id','$quantity','$ses_ID','$pd_name','$price','$img')";
            $insert_cart = $this->db->insert($query_insert);

            if ($insert_cart) {
                header('Location:cart.php');
                $alert = "<span class='success'> Thêm đơn hàng thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='success'> Lỗi khi thêm đơn hàng </span>";
                return $alert;
            }
        }
    }

    public function get_pd_cart()
    {
        $ses_ID = session_id();
        $query = "SELECT * FROM tbl_cart WHERE ses_ID = '$ses_ID'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_cart($quantity,$id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id= mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_cart SET
                          quantity = '$quantity'
                          WHERE cart_ID = '$id'";
        $result = $this->db->update($query);
        if($result)
        {
            $alert = "<span class='success'> Sửa thành công </span>";
                return $alert;
        }else 
        {
            $alert = "<span class='success'> Lỗi khi sửa</span>";
            return $alert;
        }
    }
    public function delete_cart($id)
    {
        $query = "DELETE FROM tbl_cart WHERE cart_ID ='$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result)
            {
                $alert = "<span class='success'> Đã xóa thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'>Lỗi khi xóa</span>";
                return $alert;
            }
    }

    public function getcart()
    {
        $query = "SELECT * FROM tbl_cart
        order by cart_ID desc";
        $result = $this->db->select($query);
        return $result;
    }
 }
 
 

?>