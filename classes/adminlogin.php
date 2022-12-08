<?php
include '../lib/session.php';
include '../lib/database.php';
include '../helpers/format.php';
Session::checklogin();

 class adminlogin 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    /* function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      } */

    public function login_admin($admin_User, $admin_Pass)
    {
        /* $this->db = new Database();
        $this->fm = new Format(); */
        $admin_User = $this->fm->validation($admin_User);
        $admin_Pass = $this->fm->validation($admin_Pass);

       //$link = new mysqli('localhost','root','','mvc');
       

        $admin_User = mysqli_real_escape_string($this->db->link, $admin_User);
        $admin_Pass = mysqli_real_escape_string($this->db->link, $admin_Pass);
        

        if(empty($admin_User) || empty($admin_Pass))
        {
            
            $alert = "Tên người dùng và mật khẩu không được trống!";
            return $alert;
        } else
        {
            $query = "SELECT * FROM tbl_admin WHERE admin_User = '$admin_User' AND admin_Pass ='$admin_Pass'";
            //$result = mysqli_query($this->db->link,$query);
            $result = $this->db->select($query);

            /* if(!$result || (mysqli_num_rows($result) < 1))
            {
                $alert = "Sai tên tài khoản hoặc mật khẩu!";
                return $alert;
            }else
            {
                
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('admin_ID', $value['admin_ID']);
                Session::set('admin_User', $value['admin_User']);
                Session::set('admin_Name', $value['admin_Name']);
                header('Location:index.php');
            } */
            if($result == true)
            {
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('admin_ID', $value['admin_ID']);
                Session::set('admin_User', $value['admin_User']);
                Session::set('admin_Name', $value['admin_Name']);
                header('Location:index.php');
            }
            else
            {
                $alert = "Tên tài khoản hoặc mật khẩu không đúng!";
                return $alert;
            }
        }
    }

    
 }
 
 

?>