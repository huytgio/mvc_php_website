<?php
include 'inc/header.php';
include 'inc/slider.php';


if(isset($_GET['mdh']))
	  {
		  $mdh = $_GET['mdh'];
          $sotien = $_GET['sotien'];
          $noidung = $_GET['noidung'];
          $mgd = $_GET['mgd'];

    $savepm = $pm->addtopay($mdh, $sotien, $noidung, $mgd);
	  }
?>