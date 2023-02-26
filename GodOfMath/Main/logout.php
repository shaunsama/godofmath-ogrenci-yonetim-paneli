<?php 
session_start();
ob_start();
require_once '../admin/veritabani_baglan.php';

session_destroy();
header("Location:login?durum=exit");
exit;
?>