<?php
ob_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

require_once '../admin/veritabani_islemleri.php';
require_once '../admin/fonksiyon.php';



if (isset($_REQUEST['term'])) {
    $term = $_REQUEST['term'];

    $ogrenci_donem_sor = $db->prepare("SELECT * from ogrenci_bilgileri where ogrenci_donemi=:ogrenci_donemi");
    $ogrenci_donem_sor->execute(array(
        'ogrenci_donemi' => $term
    ));
    $ogrenci_say = $ogrenci_donem_sor->rowCount();
}
?>

<section class="responsive-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-datatable">
                    <div class="row">
                        <div class="col-lg-4 col-6 m-1">
                            <label for="myInput" class="form-label">Öğrenci Ara</label>

                            <input type="text" class="form-control" id="donem_ogrencisi_ara" onkeyup="myFunction()" placeholder="Öğrenci Ara..">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="dt-responsive table text-center" id="ogrenci_table">

                            <thead>
                                <tr>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(0)">#</th>
                                    <th scope="col" class="sorting pointer">Öğrenci Fotoğraf</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(2)">Ad</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(3)">Soyad</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(4)">T.C. Kimlik Numarası</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(5)">Meslek</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(6)">İl</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(7)">İlçe</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(8)">Telefon Numarası</th>
                                    <th scope="col" class="sorting pointer" onclick="sortTable(9)">Öğrenci Dönem</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $ogrenci_say = 0;
                                while ($ogrenci_donem_cek = $ogrenci_donem_sor->fetch(PDO::FETCH_ASSOC)) {
                                    $ogrenci_say++;
                                ?>
                                    <tr class="text-center students">

                                        <td><?php echo $ogrenci_say ?></td>
                                        <td><img src="<?php echo $ogrenci_donem_cek['ogrenci_fotograf'] ?>" class="rounded" style="width: 75px; height: 75px; object-fit: cover!important;" alt="" srcset=""></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_ad'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_soyad'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_tc'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_meslek'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_il'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_ilce'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_tel'] ?></td>
                                        <td><?php echo $ogrenci_donem_cek['ogrenci_donemi'] ?></td>

                                    </tr>

                                <?php  } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<script>
      $(document).ready(function() {
        $("#donem_ogrencisi_ara").on("input", function() {
            var value = $(this).val().toLowerCase();
            $("#ogrenci_table .students").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });
        });
    });
</script>