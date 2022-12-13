<?php
$filepath = realpath((dirname(__FILE__)));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

 class payment 
 {

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addtopay($mdh,$sotien,$noidung,$mgd)
    {
        $mdh = $this->fm->validation($mdh);
        $sotien = $this->fm->validation($sotien);
        $noidung = $this->fm->validation($noidung);
        $mgd = $this->fm->validation($mgd);

        $mdh = mysqli_real_escape_string($this->db->link, $mdh);
        $sotien = mysqli_real_escape_string($this->db->link, $sotien);
        $noidung = mysqli_real_escape_string($this->db->link, $noidung);
        $mgd = mysqli_real_escape_string($this->db->link, $mgd);

        $query = "INSERT INTO tbl_payment(cart_code,price,note,pay_code) VALUES('$mdh','$sotien','$noidung','$mgd')";
        $result = $this->db->insert($query);
        header('/index.php');
        return $result;

    }
    
 }
 
 

?>