<?php
include '../lib/database.php';
include '../helpers/format.php';

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

    
 }
 
 

?>