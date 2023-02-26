<?php
ob_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

require_once '../admin/veritabani_islemleri.php';
require_once '../admin/fonksiyon.php';



if (isset($_REQUEST['term'])) {
    $term = $_REQUEST['term'];

    $ogrenci_ilce_sor = $db->prepare("SELECT * from ilceler where sehirid=:sehirid");
    $ogrenci_ilce_sor->execute(array(
        'sehirid' => $term
    ));

    $il_say = 1;
    while ($ogrenci_ilce_cek = $ogrenci_ilce_sor->fetch(PDO::FETCH_ASSOC)) {
        $il_say++;
?>

        <option class="text-dark" value="<?php echo $ogrenci_ilce_cek['ilceadi'] ?>"><?php echo $ogrenci_ilce_cek['ilceadi'] ?></option>


    <?php } ?>


<?php } ?>