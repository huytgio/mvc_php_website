<?php
include '../lib/session.php';
include '../lib/database.php';
include '../helpers/format.php';
Session::checklogin();

 class adminlogin 
 {
    private $db;
    private $fm;
    public function _____construct()
    {
        
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($admin_User,$admin_Pass)
    {
        $admin_User = $this->fm->validation($admin_User);
        $admin_Pass = $this->fm->validation($admin_Pass);

        $admin_User = mysqli_real_escape_string($this->db->link, $admin_User);
        $admin_User = mysqli_real_escape_string($this->db->link, $admin_Pass);

        if(empty($admin_User) || empty($admin_Pass))
        {
            $alert = "Tên người dùng và mật khẩu không được trống!";
            return $alert;
        } else
        {
            $query = "SELECT * FROM tbl_admin WHERE admin_User = '$admin_User' AND admin_Pass ='$admin_Pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false)
            {
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('admin_ID', $value['admin_ID']);
                Session::set('admin_User', $value['admin_User']);
                Session::set('admin_Name', $value['admin_Name']);
                header('Location:index.php');
            }else
            {
                $alert = "Sai tên tài khoản hoặc mật khẩu!";
                return $alert;
            }
        }
    }

    
 }
 

?>