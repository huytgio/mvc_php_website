<?php
$filepath = realpath((dirname(__FILE__)));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

 class product 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    

    public function insert_product($data,$files)
    {
        
        $product_Name = $this->fm->validation($data['product_Name']);
        $category = $this->fm->validation($data['category']);
        $brand = $this->fm->validation($data['brand']);
        $product_desc = $this->fm->validation($data['product_desc']);
        $price = $this->fm->validation($data['price']);
        $status = $this->fm->validation($data['pd_status']);
        // $tatus = (int) $data['type'];

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        

        if(empty($product_Name) || empty($category) || empty($brand) || empty($product_desc) || empty($price) || $status="" || empty($file_name) )
        {
            
            $alert = "Có mục rỗng khi thêm sản phẩm!".$status;
            //$alert = $status;
            return $alert;
        } else
        {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(product_Name,cat_ID,brand_ID,product_desc,price,pd_status,image) 
            VALUES('$product_Name','$category','$brand','$product_desc','$price','$status','$unique_image')";
            $result = $this->db->insert($query);

            if($result)
            {
                $alert = "<span class='success'> Thêm sản phẩm thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi thêm sản phẩm </span>";
                return $alert;
            }

        }
    }
     public function show_product()
    {
        //$query = "SELECT * FROM tbl_product ORDER BY product_ID desc";
        $query = "SELECT tbl_product.*,tbl_category.cat_Name,tbl_brand.brand_Name
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_ID = tbl_category.cat_ID
        INNER JOIN tbl_brand ON tbl_product.brand_ID = tbl_brand.brand_ID
        ORDER BY product_ID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getpdbyID($id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_ID = '$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_Product($data,$files,$id)
    {
        $product_Name = $this->fm->validation($data['product_Name']);
        $category = $this->fm->validation($data['category']);
        $brand = $this->fm->validation($data['brand']);
        $product_desc = $this->fm->validation($data['product_desc']);
        $price = $this->fm->validation($data['price']);
        $status = $this->fm->validation($data['pd_status']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        //$id= mysqli_real_escape_string($this->db->link, $id);


        if(empty($product_Name) || empty($category) || empty($brand) || empty($product_desc) || empty($price) || $status="")
        {
            
            $alert = "Có thông tin trống!";
            return $alert;
        }else
        {
            if(!empty($file_name))
            {
                if($file_size > 1048567)
            {
                $alert ='<span class = error> Hình ảnh phải dưới 10MB </span>';
                    return $alert;
            }
            elseif(in_array($file_ext,$permited)==false)
            {
                $alert="<span class = 'error'> bạn chỉ có thể up các loại file sau: -"
                    . implode(',', $permited) . "</span>";
                    return $alert;
            }
                $query = "UPDATE tbl_product SET
                          product_Name = '$product_Name',
                          cat_ID = '$category',
                          brand_ID = '$brand',
                          pd_status = '$status',
                          product_desc = '$product_desc',
                          price = '$price',
                          image = '$unique_image'
                          WHERE product_ID = '$id'";
            }else
            {
                $query = "UPDATE tbl_product SET
                          product_Name = '$product_Name',
                          cat_ID = '$category',
                          brand_ID = '$brand',
                          pd_status = '$status',
                          product_desc = '$product_desc',
                          price = '$price'
                          WHERE product_ID = '$id'";
            }
            $result = $this->db->update($query);

            if($result)
            {
                $alert = "<span class='success'> Sửa sản phẩm thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi sửa sản phẩm </span>";
                return $alert;
            }

        }
    }
    public function delete_product($id)
    {
        $querydl = "SELECT * FROM tbl_product WHERE product_ID = '$id'";
        $result2 = $this->db->select($querydl);
        $links = $result2->fetch_assoc()['image'];
        $linkdel = "./upload/$links";
         
        $query = "DELETE FROM tbl_product WHERE product_ID ='$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result)
            {
                if($linkdel)
                {
                unlink($linkdel);
                echo $linkdel;
                $alert = "<span class='success'> Đã xóa sản phẩm thành công và xóa luôn hình ảnh </span>";
                return $alert;
                }else
                {
                    $alert = "<span class='success'> Đã xóa sản phẩm thành công nhưng không xóa hình ảnh </span>";
                    return $alert;
                }
                
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi xóa sản phẩm </span>";
                return $alert;
            }
    }

    public function gethotpd()
    {
        $query = "SELECT * FROM tbl_product WHERE pd_status='1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getnewpd()
    {
        $query = "SELECT * FROM tbl_product ORDER BY product_ID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getdtpdbyID($id)
    {
        $query = "SELECT tbl_product.*,tbl_category.cat_Name,tbl_brand.brand_Name
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_ID = tbl_category.cat_ID
        INNER JOIN tbl_brand ON tbl_product.brand_ID = tbl_brand.brand_ID
        WHERE tbl_product.product_ID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    
 }
 
 

?>