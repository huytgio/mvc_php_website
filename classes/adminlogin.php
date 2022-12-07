<?php
include '../lib/session.php';
include '../lib/database.php';
include '../helpers/format.php';
Session::checklogin();

 class adminlogin 
 {
    public $linked;
    private $db;
    private $fm;
    public function _____construct()
    {
        
        $this->db = new Database($this->linked);
        $this->fm = new Format();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    public function login_admin($admin_User, $admin_Pass)
    {
        $admin_User = $this->test_input($admin_User);
        $admin_Pass = $this->test_input($admin_Pass);

       $link = new mysqli('localhost','root','','mvc');
       

        $admin_User = mysqli_real_escape_string($link, $admin_User);
        $admin_Pass = mysqli_real_escape_string($link, $admin_Pass);
        

        if(empty($admin_User) || empty($admin_Pass))
        {
            $debug = $this->linked;
            $alert = "Tên người dùng và mật khẩu không được trống!";
            return $debug;
        } else
        {
            $query = "SELECT * FROM tbl_admin WHERE admin_User = '$admin_User' AND admin_Pass ='$admin_Pass'";
            $result = mysqli_query($link,$query);

            if(!$result || (mysqli_num_rows($result) < 1))
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
            }
        }
    }

    
 }
 

?>