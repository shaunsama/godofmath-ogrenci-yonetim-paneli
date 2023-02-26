<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

include 'veritabani_baglan.php';
include 'fonksiyon.php';


if (isset($_POST['admin_login'])) {
    $admin_mail = strip_tags($_POST['admin_mail']);
    $admin_sifre = strip_tags($_POST['admin_sifre']);

    $admin_bilgi_sor = $db->prepare("SELECT * FROM admin_acc where admin_mail=:admin_mail and admin_sifre=:admin_sifre");
    $admin_bilgi_sor->execute(array(
        'admin_mail' => $admin_mail,
        'admin_sifre' => $admin_sifre
    ));

    $admin_say = $admin_bilgi_sor->rowCount();

    $admin_bilgi_cek = $admin_bilgi_sor->fetch(PDO::FETCH_ASSOC);

    if ($admin_say == 1) {
        header("Location:../Main/Home?d=success");
        $_SESSION['session_admin_mail'] = $admin_mail;
        $_SESSION['session_admin_id'] = $admin_bilgi_cek['admin_id'];

        exit;
    } else {
        header("Location:../Main/login?d=error");
        exit;
    }
}
if (isset($_FILES['ogrenci_fotograf'])) {
    $ogrenci_tc = $_POST['ogrenci_tc'];
    $ogrenci_ad = $_POST['ogrenci_ad'];
    $ogrenci_soyad = $_POST['ogrenci_soyad'];
    $ogrenci_tel = $_POST['ogrenci_tel'];
    $ogrenci_lise = $_POST['ogrenci_lise'];
    $ogrenci_universite = $_POST['ogrenci_universite'];
    $ogrenci_il = $_POST['ogrenci_il'];
    $ogrenci_ilce = $_POST['ogrenci_ilce'];
    $ogrenci_adres = $_POST['ogrenci_adres'];
    $ogrenci_meslek = $_POST['ogrenci_meslek'];
    $ogrenci_sevdikleri = $_POST['ogrenci_sevdikleri'];
    $ogrenci_sevmedikleri = $_POST['ogrenci_sevmedikleri'];
    $ogrenci_anne_adi = $_POST['ogrenci_anne_adi'];
    $ogrenci_baba_adi = $_POST['ogrenci_baba_adi'];
    $ogrenci_donemi = $_POST['ogrenci_donemi'];

    $ogrenci_tamad = $ogrenci_ad . " " . $ogrenci_soyad;
    $bildirim_detay = "<b class='bg-light-success'>" . $ogrenci_tamad . "</b> " . "Adlı Öğrenci Başarıyla Eklendi.";


    if ($_FILES['ogrenci_fotograf']['size'] > 1048576) {


        Header("Location:../Main/ogrenci_ekle?dosyaboyut=buyuk");
        exit;
    }

    $izinli_uzantilar1 = array('jpg', 'png', 'jpeg', 'gif');

    $ext1 = strtolower(substr($_FILES['ogrenci_fotograf']["name"], strpos($_FILES['file']["name"], '.')));

    @$tmp_name1 = $_FILES['ogrenci_fotograf']["tmp_name"];
    @$name1 = $_FILES['ogrenci_fotograf']["name"];
    $uploads_dir1 = '../images/student_photos';


    $uniq1 = uniqid();

    $ogrenci_resim_yol = $uploads_dir1 . "/" . $uniq1 . "." . $ext1;

    @move_uploaded_file($tmp_name1, "$uploads_dir1/$uniq1.$ext1");


    if ($_FILES['ogrenci_fotograf']['size'] <= 0) {

        $ogrenci_resim_yol = "../images/student.png";
    }
    if (strlen($ogrenci_il) > 0) {

        $ogrenci_bilgi_ekle = $db->prepare("INSERT INTO ogrenci_bilgileri SET 
    ogrenci_tc=:ogrenci_tc,
    ogrenci_fotograf=:ogrenci_fotograf,
    ogrenci_ad=:ogrenci_ad,
    ogrenci_soyad=:ogrenci_soyad,
    ogrenci_tel=:ogrenci_tel,
    ogrenci_lise=:ogrenci_lise,
    ogrenci_universite=:ogrenci_universite,
    ogrenci_il=:ogrenci_il,
    ogrenci_ilce=:ogrenci_ilce,
    ogrenci_adres=:ogrenci_adres,
    ogrenci_meslek=:ogrenci_meslek,
    ogrenci_sevdikleri=:ogrenci_sevdikleri,
    ogrenci_sevmedikleri=:ogrenci_sevmedikleri,
    ogrenci_anne_adi=:ogrenci_anne_adi,
    ogrenci_baba_adi=:ogrenci_baba_adi,
    ogrenci_donemi=:ogrenci_donemi
    ");

        $ogrenci_bilgi_eklendi = $ogrenci_bilgi_ekle->execute(array(
            "ogrenci_tc" => $ogrenci_tc,
            "ogrenci_fotograf" => $ogrenci_resim_yol,
            "ogrenci_ad" => $ogrenci_ad,
            "ogrenci_soyad" => $ogrenci_soyad,
            "ogrenci_tel" => $ogrenci_tel,
            "ogrenci_lise" => $ogrenci_lise,
            "ogrenci_universite" => $ogrenci_universite,
            "ogrenci_il" => $ogrenci_il,
            "ogrenci_ilce" => $ogrenci_ilce,
            "ogrenci_adres" => $ogrenci_adres,
            "ogrenci_meslek" => $ogrenci_meslek,
            "ogrenci_sevdikleri" => $ogrenci_sevdikleri,
            "ogrenci_sevmedikleri" => $ogrenci_sevmedikleri,
            "ogrenci_anne_adi" => $ogrenci_anne_adi,
            "ogrenci_baba_adi" => $ogrenci_baba_adi,
            "ogrenci_donemi" => $ogrenci_donemi
        ));

        $bildirim_ekle = $db->prepare("INSERT INTO bildirimler SET
    bildirim_detay=:bildirim_detay
    ");

        $bildirim_eklendi = $bildirim_ekle->execute(array(
            'bildirim_detay' => $bildirim_detay
        ));

        if ($ogrenci_bilgi_eklendi) {
            Header("Location:../Main/ogrenci_ekle?d=true");
            exit;
        } else {
            Header("Location:../Main/ogrenci_ekle?d=false");
            exit;
        }
    } else {
        $ogrenci_bilgi_ekle = $db->prepare("INSERT INTO ogrenci_bilgileri SET 
        ogrenci_tc=:ogrenci_tc,
        ogrenci_fotograf=:ogrenci_fotograf,
        ogrenci_ad=:ogrenci_ad,
        ogrenci_soyad=:ogrenci_soyad,
        ogrenci_tel=:ogrenci_tel,
        ogrenci_lise=:ogrenci_lise,
        ogrenci_universite=:ogrenci_universite,
        ogrenci_adres=:ogrenci_adres,
        ogrenci_meslek=:ogrenci_meslek,
        ogrenci_sevdikleri=:ogrenci_sevdikleri,
        ogrenci_sevmedikleri=:ogrenci_sevmedikleri,
        ogrenci_anne_adi=:ogrenci_anne_adi,
        ogrenci_baba_adi=:ogrenci_baba_adi,
        ogrenci_donemi=:ogrenci_donemi
        ");

        $ogrenci_bilgi_eklendi = $ogrenci_bilgi_ekle->execute(array(
            "ogrenci_tc" => $ogrenci_tc,
            "ogrenci_fotograf" => $ogrenci_resim_yol,
            "ogrenci_ad" => $ogrenci_ad,
            "ogrenci_soyad" => $ogrenci_soyad,
            "ogrenci_tel" => $ogrenci_tel,
            "ogrenci_lise" => $ogrenci_lise,
            "ogrenci_universite" => $ogrenci_universite,
            "ogrenci_adres" => $ogrenci_adres,
            "ogrenci_meslek" => $ogrenci_meslek,
            "ogrenci_sevdikleri" => $ogrenci_sevdikleri,
            "ogrenci_sevmedikleri" => $ogrenci_sevmedikleri,
            "ogrenci_anne_adi" => $ogrenci_anne_adi,
            "ogrenci_baba_adi" => $ogrenci_baba_adi,
            "ogrenci_donemi" => $ogrenci_donemi
        ));

        $bildirim_ekle = $db->prepare("INSERT INTO bildirimler SET
        bildirim_detay=:bildirim_detay
        ");

        $bildirim_eklendi = $bildirim_ekle->execute(array(
            'bildirim_detay' => $bildirim_detay
        ));

        if ($ogrenci_bilgi_eklendi) {
            Header("Location:../Main/ogrenci_ekle?d=true");
            exit;
        } else {
            Header("Location:../Main/ogrenci_ekle?d=false");
            exit;
        }
    }
}

if (isset($_FILES['admin_avatar'])) {

    $admin_ad = htmlspecialchars($_POST['admin_ad']);
    $admin_soyad = htmlspecialchars($_POST['admin_soyad']);


    if ($_FILES['admin_avatar']['size'] > 1048576) {


        Header("Location:../Main/Hesabim?dosyaboyut=buyuk");
        exit;
    }




    $izinli_uzantilar = array('jpg', 'png', 'jpeg', 'gif');


    $ext = strtolower(substr($_FILES['admin_avatar']["name"], strpos($_FILES['file']["name"], '.')));


    @$tmp_name = $_FILES['admin_avatar']["tmp_name"];

    @$name = $_FILES['admin_avatar']["name"];

    $uploads_dir = '../images/profile_photos';


    $uniq = uniqid();

    $resimgyol = $uploads_dir . "/" . $uniq . "." . $ext;
    @move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");

    if ($_FILES['admin_avatar']['size'] <= 0) {

        $resimgyol = "../images/user.png";
    }

    $hesap_bilgilerini_guncelle = $db->prepare("UPDATE admin_acc SET 
    admin_ad=:admin_ad,
    admin_soyad=:admin_soyad,
    admin_avatar=:admin_avatar
    where admin_id={$_SESSION['session_admin_id']}");


    $hesap_bilgileri_guncellendi = $hesap_bilgilerini_guncelle->execute(array(
        'admin_ad' => $admin_ad,
        'admin_soyad' => $admin_soyad,
        'admin_avatar' => $resimgyol
    ));

    if ($hesap_bilgileri_guncellendi) {
        Header("Location:../Main/Hesabim?d=success");
        exit;
    } else {
        Header("Location:../Main/Hesabim?d=fail");
        exit;
    }
}

if (isset($_POST['admin_sifre_guncelle'])) {
    $admin_eskisifre = $_POST['admin_eski_sifre'];
    $admin_sifre_bir = $_POST['admin_yeni_sifre'];
    $admin_sifre_iki = $_POST['admin_yeni_sifre2'];

    $admin_sifre = $admin_eskisifre;

    $admin_sor = $db->prepare("SELECT * from admin_acc where admin_sifre=:admin_sifre");
    $admin_sor->execute(array(
        'admin_sifre' => $admin_sifre
    ));

    $say = $admin_sor->rowCount();

    if ($say == 0) {

        Header("Location:../Main/Sifre_degistir?durumsifre=eskisifrehata");
        exit;
    }



    if ($admin_sifre_bir == $admin_sifre_iki) {


        if (strlen($admin_sifre_bir) >= 6) {


            $sifre = $admin_sifre_bir;


            $admin_guncelle = $db->prepare("UPDATE admin_acc SET

				admin_sifre=:admin_sifre
				WHERE admin_id=:admin_id");


            $update_password = $admin_guncelle->execute(array(
                'admin_sifre' => $sifre,
                'admin_id' => intval($_SESSION['session_admin_id'])

            ));

            if ($update_password) {

                Header("Location:../Main/Sifre_degistir?durumsifre=ok");
                exit;
            } else {


                Header("Location:../Main/Sifre_degistir?durumsifre=hata");
                exit;
            }
        } else {

            Header("Location:../Main/Sifre_degistir?durumsifre=eksiksifre");
            exit;
        }
    } else {


        Header("Location:../Main/Sifre_degistir?durumsifre=sifreleruyusmuyor");
        exit;
    }
}


if (isset($_POST['bildirim_duzelt'])) {
    $bildirim_duzelt = $db->prepare("UPDATE bildirimler SET bildirim_durum=:bildirim_durum");
    $bildirim_duzeltildi = $bildirim_duzelt->execute(array(
        'bildirim_durum' => 1
    ));

    if ($ogrenci_bilgi_eklendi) {
        Header("Location:../Main/bildirimler");
        exit;
    } else {
        Header("Location:../Main/bildirimler");
        exit;
    }
}

if (isset($_POST['ogrenci_bilgilerini_guncelle'])) {
    $ogrenci_tc = $_POST['ogrenci_tc'];
    $ogrenci_ad = $_POST['ogrenci_ad'];
    $ogrenci_soyad = $_POST['ogrenci_soyad'];
    $ogrenci_tel = $_POST['ogrenci_tel'];
    $ogrenci_lise = $_POST['ogrenci_lise'];
    $ogrenci_universite = $_POST['ogrenci_universite'];
    $ogrenci_il = $_POST['ogrenci_il'];
    $ogrenci_ilce = $_POST['ogrenci_ilce'];
    $ogrenci_adres = $_POST['ogrenci_adres'];
    $ogrenci_meslek = $_POST['ogrenci_meslek'];
    $ogrenci_sevdikleri = $_POST['ogrenci_sevdikleri'];
    $ogrenci_sevmedikleri = $_POST['ogrenci_sevmedikleri'];
    $ogrenci_anne_adi = $_POST['ogrenci_anne_adi'];
    $ogrenci_baba_adi = $_POST['ogrenci_baba_adi'];
    $ogrenci_donemi = $_POST['ogrenci_donemi'];
    $ogrenci_id = $_POST['ogrenci_id'];

    $ogrenci_tamad = $ogrenci_ad . " " . $ogrenci_soyad;
    $bildirim_detay = "<b class='bg-light-success'>" . $ogrenci_tamad . "</b> " . "Adlı Öğrencinin Bilgileri Güncellendi.";


    $ogrenci_bilgi_ekle = $db->prepare("UPDATE ogrenci_bilgileri SET 
    ogrenci_tc=:ogrenci_tc,
    ogrenci_ad=:ogrenci_ad,
    ogrenci_soyad=:ogrenci_soyad,
    ogrenci_tel=:ogrenci_tel,
    ogrenci_lise=:ogrenci_lise,
    ogrenci_universite=:ogrenci_universite,
    ogrenci_il=:ogrenci_il,
    ogrenci_ilce=:ogrenci_ilce,
    ogrenci_adres=:ogrenci_adres,
    ogrenci_meslek=:ogrenci_meslek,
    ogrenci_sevdikleri=:ogrenci_sevdikleri,
    ogrenci_sevmedikleri=:ogrenci_sevmedikleri,
    ogrenci_anne_adi=:ogrenci_anne_adi,
    ogrenci_baba_adi=:ogrenci_baba_adi,
    ogrenci_donemi=:ogrenci_donemi
    where ogrenci_id=:ogrenci_id
    ");

    $ogrenci_bilgi_eklendi = $ogrenci_bilgi_ekle->execute(array(
        "ogrenci_tc" => $ogrenci_tc,
        "ogrenci_ad" => $ogrenci_ad,
        "ogrenci_soyad" => $ogrenci_soyad,
        "ogrenci_tel" => $ogrenci_tel,
        "ogrenci_lise" => $ogrenci_lise,
        "ogrenci_universite" => $ogrenci_universite,
        "ogrenci_il" => $ogrenci_il,
        "ogrenci_ilce" => $ogrenci_ilce,
        "ogrenci_adres" => $ogrenci_adres,
        "ogrenci_meslek" => $ogrenci_meslek,
        "ogrenci_sevdikleri" => $ogrenci_sevdikleri,
        "ogrenci_sevmedikleri" => $ogrenci_sevmedikleri,
        "ogrenci_anne_adi" => $ogrenci_anne_adi,
        "ogrenci_baba_adi" => $ogrenci_baba_adi,
        "ogrenci_donemi" => $ogrenci_donemi,
        "ogrenci_id" => $ogrenci_id
    ));
    $bildirim_detay = "<b class='bg-light-success'>" . $ogrenci_tamad . "</b> " . "Adlı Öğrencinin Bilgileri Güncellendi.";

    $bildirim_ekle = $db->prepare("INSERT INTO bildirimler SET
    bildirim_detay=:bildirim_detay
    ");

    $bildirim_eklendi = $bildirim_ekle->execute(array(
        'bildirim_detay' => $bildirim_detay
    ));

    if ($ogrenci_bilgi_eklendi) {
        Header("Location:../Main/ogrenci_listesi?duz=true");
        exit;
    } else {
        Header("Location:../Main/ogrenci_listesi?duz=false");
        exit;
    }
}

if (isset($_POST['ogrenciyi_sil'])) {


    $ogrenci_tc = $_POST['ogrenci_tc'];
    $ogrenci_fotograf = $_POST['ogrenci_fotograf'];
    $ogrenci_ad = $_POST['ogrenci_ad'];
    $ogrenci_soyad = $_POST['ogrenci_soyad'];
    $ogrenci_tel = $_POST['ogrenci_tel'];
    $ogrenci_lise = $_POST['ogrenci_lise'];
    $ogrenci_universite = $_POST['ogrenci_universite'];
    $ogrenci_il = $_POST['ogrenci_il'];
    $ogrenci_ilce = $_POST['ogrenci_ilce'];
    $ogrenci_adres = $_POST['ogrenci_adres'];
    $ogrenci_meslek = $_POST['ogrenci_meslek'];
    $ogrenci_sevdikleri = $_POST['ogrenci_sevdikleri'];
    $ogrenci_sevmedikleri = $_POST['ogrenci_sevmedikleri'];
    $ogrenci_anne_adi = $_POST['ogrenci_anne_adi'];
    $ogrenci_baba_adi = $_POST['ogrenci_baba_adi'];
    $ogrenci_donemi = $_POST['ogrenci_donemi'];
    $ogrenci_id = $_POST['ogrenci_id'];

    $ogrenci_tamad = $ogrenci_ad . " " . $ogrenci_soyad;


    $ogrenci_bilgi_ekle = $db->prepare("INSERT INTO silinen_ogrenci_bilgileri SET 
    ogrenci_tc=:ogrenci_tc,
    ogrenci_fotograf=:ogrenci_fotograf,
    ogrenci_ad=:ogrenci_ad,
    ogrenci_soyad=:ogrenci_soyad,
    ogrenci_tel=:ogrenci_tel,
    ogrenci_lise=:ogrenci_lise,
    ogrenci_universite=:ogrenci_universite,
    ogrenci_il=:ogrenci_il,
    ogrenci_ilce=:ogrenci_ilce,
    ogrenci_adres=:ogrenci_adres,
    ogrenci_meslek=:ogrenci_meslek,
    ogrenci_sevdikleri=:ogrenci_sevdikleri,
    ogrenci_sevmedikleri=:ogrenci_sevmedikleri,
    ogrenci_anne_adi=:ogrenci_anne_adi,
    ogrenci_baba_adi=:ogrenci_baba_adi,
    ogrenci_donemi=:ogrenci_donemi
    ");

    $ogrenci_bilgi_eklendi = $ogrenci_bilgi_ekle->execute(array(
        "ogrenci_tc" => $ogrenci_tc,
        "ogrenci_fotograf" => $ogrenci_fotograf,
        "ogrenci_ad" => $ogrenci_ad,
        "ogrenci_soyad" => $ogrenci_soyad,
        "ogrenci_tel" => $ogrenci_tel,
        "ogrenci_lise" => $ogrenci_lise,
        "ogrenci_universite" => $ogrenci_universite,
        "ogrenci_il" => $ogrenci_il,
        "ogrenci_ilce" => $ogrenci_ilce,
        "ogrenci_adres" => $ogrenci_adres,
        "ogrenci_meslek" => $ogrenci_meslek,
        "ogrenci_sevdikleri" => $ogrenci_sevdikleri,
        "ogrenci_sevmedikleri" => $ogrenci_sevmedikleri,
        "ogrenci_anne_adi" => $ogrenci_anne_adi,
        "ogrenci_baba_adi" => $ogrenci_baba_adi,
        "ogrenci_donemi" => $ogrenci_donemi
    ));

    $bildirim_detay = "<b class='bg-light-success'>" . $ogrenci_tamad . "</b> " . "Adlı Öğrenci Bilgileri Silindi.";

    $bildirim_ekle = $db->prepare("INSERT INTO bildirimler SET
    bildirim_detay=:bildirim_detay
    ");

    $bildirim_eklendi = $bildirim_ekle->execute(array(
        'bildirim_detay' => $bildirim_detay
    ));


    $sil = $db->prepare("DELETE from ogrenci_bilgileri where ogrenci_id=:ogrenci_id");
    $kontrol = $sil->execute(array(
        'ogrenci_id' => $ogrenci_id
    ));

    if ($kontrol) {
        Header("Location:../Main/ogrenci_listesi?sil=ok");
        exit;
    } else {

        Header("Location:../Main/ogrenci_listesi?sil=hata");
        exit;
    }
}

if (isset($_POST['bildirimleri_sil'])) {
    $bildirim_sil = $db->prepare("DELETE FROM bildirimler
    ");

    $bildirim_silindi = $bildirim_sil->execute();

    if ($bildirim_silindi) {
        Header("Location:../Main/bildirimler?sil=ok");
        exit;
    } else {

        Header("Location:../Main/bildirimler?sil=hata");
        exit;
    }
}

if (isset($_POST['dark_mode']))
{
    $dm = $_POST['dm'];

    $dark_mode_ac = $db->prepare("UPDATE admin_acc set admin_darkmode=:admin_darkmode where admin_id=:admin_id");
    $admin_darkmode_acildi = $dark_mode_ac->execute(array(
        'admin_id' => 1,
        'admin_darkmode' => $dm
    ));
   
    
}