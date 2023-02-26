<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:404");
    exit;
}


ob_start();
session_start();
//error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

require_once '../admin/veritabani_baglan.php';
require_once '../admin/fonksiyon.php';


$ogrenci_sor = $db->prepare("SELECT * FROM ogrenci_bilgileri");
$ogrenci_sor->execute();
$ogrenci_say = $ogrenci_sor->rowCount();


$admin_sor = $db->prepare("SELECT * FROM admin_acc");
$admin_sor->execute();
$admin_say = $admin_sor->rowCount();


$silinen_ogrenci_sor = $db->prepare("SELECT * FROM silinen_ogrenci_bilgileri");
$silinen_ogrenci_sor->execute();

$silinen_ogrenci_say = $silinen_ogrenci_sor->rowCount();




if (empty($_SESSION['session_admin_mail'])) {
    header("Location: Login");
    exit;
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>God Of Math</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/font-awesome.css">

    <link rel="stylesheet" href="../css/vendor.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-extended.css">
    <link rel="stylesheet" href="../css/colors.css">

    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/bordered-layout.css">
    <link rel="stylesheet" href="../css/dark-layout.css">
    <link rel="stylesheet" href="../css/semi-dark-layout.css">

    <link rel="stylesheet" href="../css/vertical-menu.css">
    <link rel="stylesheet" href="../css/ext-component-toastr.css">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/bs-stepper.min.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/form-validation.css ">
    <link rel="stylesheet" href="../css/form-wizard.css ">

    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css ">
    <link rel="stylesheet" href="../css/responsive.bootstrap5.min.css ">
    <link rel="stylesheet" href="../css/form-flat-pickr.css ">

    <link rel="stylesheet" href="../css/flatpickr.min.css ">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    
    <link rel="icon" type="image/png" href="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Language" content="Turkish" />
    <meta http-equiv="Content-Language" content="tr" />


    <style type="text/css">
        .scroll-area-md {
            height: 300px;
            overflow-x: hidden
        }

        .scrollbar-container {
            position: relative;
            height: 100%
        }

        .button-h {
            max-height: 38px !important;

        }
        .button-settings{
            max-width: 88px!important;
        }

        .button-h:hover #right-icon {
            transform: translate(10px) !important;

            transition: all 1.2s ease-in-out !important;
        }
        .responsive-list{
            max-height: 450px!important;
            overflow-y: scroll!important;
            overflow-x: hidden!important;
        }
        .pointer{
            cursor: pointer!important;
        }
    </style>


</head>