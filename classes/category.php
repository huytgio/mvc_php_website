<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

 class category 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    

    public function insert_category($cat_Name)
    {
        
        $cat_Name = $this->fm->validation($cat_Name);
        

       
       

        $cat_Name= mysqli_real_escape_string($this->db->link, $cat_Name);
        

        if(empty($cat_Name))
        {
            
            $alert = "Tên danh mục không được trống!";
            return $alert;
        } else
        {
            $query = "INSERT INTO tbl_category(cat_Name) VALUES('$cat_Name')";
            $result = $this->db->insert($query);

            if($result)
            {
                $alert = "<span class='success'> Thêm danh mục thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi thêm danh mục </span>";
                return $alert;
            }

        }
    }
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY cat_ID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyID($id)
    {
        $query = "SELECT * FROM tbl_category WHERE cat_ID = '$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_category($cat_Name,$id)
    {
        $cat_Name = $this->fm->validation($cat_Name);
        $cat_Name= mysqli_real_escape_string($this->db->link, $cat_Name);
        $id= mysqli_real_escape_string($this->db->link, $id);


        if(empty($cat_Name))
        {
            
            $alert = "Tên danh mục không được trống!";
            return $alert;
        } else
        {
            $query = "UPDATE tbl_category SET cat_Name = '$cat_Name' WHERE cat_ID='$id'";
            $result = $this->db->update($query);

            if($result)
            {
                $alert = "<span class='success'> Sửa danh mục thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi sửa danh mục </span>";
                return $alert;
            }

        }
    }
    public function delete_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE cat_ID ='$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result)
            {
                $alert = "<span class='success'> Đã xóa danh mục thành công </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='success'> Lỗi khi xóa danh mục </span>";
                return $alert;
            }
    }

    
 }
 
 

?>