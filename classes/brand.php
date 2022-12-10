<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

 class brand 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    

    public function insert_brand($brand_Name)
    {
        
        $brand_Name = $this->fm->validation($brand_Name);
        

       
       

        $brand_Name= mysqli_real_escape_string($this->db->link, $brand_Name);
        

        if(empty($brand_Name))
        {
            
            $alert = "Tên nhãn hiệu không được trống!";
            return $alert;
        } else
        {
            $query = "INSERT INTO tbl_brand(brand_Name) VALUES('$brand_Name')";
            $result = $this->db->insert($query);

            if($result)
            {
                $alert = "<span class='success'> Thêm nhãn hiệu thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi thêm nhãn hiệu </span>";
                return $alert;
            }

        }
    }
    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brand_ID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyID($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brand_ID = '$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_brand($brand_Name,$id)
    {
        $brand_Name = $this->fm->validation($brand_Name);
        $brand_Name= mysqli_real_escape_string($this->db->link, $brand_Name);
        $id= mysqli_real_escape_string($this->db->link, $id);


        if(empty($brand_Name))
        {
            
            $alert = "Tên nhãn hiệu không được trống!";
            return $alert;
        } else
        {
            $query = "UPDATE tbl_brand SET brand_Name = '$brand_Name' WHERE brand_ID='$id'";
            $result = $this->db->insert($query);

            if($result)
            {
                $alert = "<span class='success'> Sửa nhãn hiệu thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi sửa nhãn hiệu </span>";
                return $alert;
            }

        }
    }
    public function delete_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brand_ID ='$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result)
            {
                $alert = "<span class='success'> Đã xóa nhãn hiệu thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi xóa nhãn hiệu </span>";
                return $alert;
            }
    }

    
 }
 
 

?>