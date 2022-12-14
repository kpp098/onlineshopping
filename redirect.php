<?php 
  session_start();

$ss=$_GET['payment_status'];
$_SESSION['st']=$ss;
header('location:/onlineshopping/payment_success.php');
?>