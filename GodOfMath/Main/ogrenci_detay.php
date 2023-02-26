<?php require_once 'header.php'; ?>
<?php
$ogrenci_sor = $db->prepare("SELECT * FROM ogrenci_bilgileri where ogrenci_id=:ogrenci_id");
$ogrenci_sor->execute(array(
    'ogrenci_id' => intval($_GET['ogrenci_id'])
));

$ogrenci_cek = $ogrenci_sor->fetch(PDO::FETCH_ASSOC);
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<body class="pace-done vertical-layout vertical-menu-modern navbar-floating footer-static menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php require_once 'navbar.php'; ?>
    <?php require_once 'left_sidebar.php'; ?>

    <div class="sidenav-overlay"></div>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <section class="horizontal-wizard card ">
                    <div class="bs-stepper horizontal-wizard-example linear">
                        <div class="bs-stepper-header justify-content-start" role="tablist">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title fs-4"><b class="bg-light-success"><?php echo $ogrenci_cek['ogrenci_ad'] . " " . $ogrenci_cek['ogrenci_soyad'] ?></b> Adlı Öğrencinin Bilgileri</span>
                            </span>
                        </div>

                        <div class="bs-stepper-content">
                            <div id="account-details" class="content active dstepper-block" role="tabpanel" aria-labelledby="account-details-trigger">

                                <form novalidate="novalidate" action="../admin/veritabani_islemleri.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <label for="" class="form-label">Öğrenci Fotoğraf</label>

                                        <div class="d-flex mb-1">

                                            <a href="#" class="me-25">
                                                <img src="<?php echo $ogrenci_cek['ogrenci_fotograf'] ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100">
                                            </a>
                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                <div>
                                                    <input type="file" id="ogrenci_fotograf_set" hidden accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci T.C. Kimlik Numarası</label>
                                            <input type="number" name="ogrenci_tc" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_tc'] ?>" placeholder="Öğrenci T.C. Kimlik Numarası">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Ad</label>
                                            <input type="text" name="ogrenci_ad" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_ad'] ?>" required placeholder="Öğrenci Ad">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Soyad</label>
                                            <input type="text" name="ogrenci_soyad" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_soyad'] ?>" required placeholder="Öğrenci Soyad">
                                        </div>

                                        <div class="col-lg-4  col-6 mb-1">
                                            <label for="" class="form-label">Öğrenci Lise</label>
                                            <input type="text" name="ogrenci_lise" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_lise'] ?>" placeholder="Öğrenci Lise">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Üniversite</label>
                                            <input type="text" name="ogrenci_universite" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_universite'] ?>" placeholder="Öğrenci Üniversite">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Meslek</label>
                                            <input type="text" name="ogrenci_meslek" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_meslek'] ?>" placeholder="Öğrenci Meslek">
                                        </div>

                                        <div class="col-lg-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Sevdikleri</label>
                                            <input type="text" name="ogrenci_sevdikleri" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_sevdikleri'] ?>" placeholder="Öğrencinin Sevdikleri">
                                        </div>

                                        <div class="col-lg-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Sevmedikleri</label>
                                            <input type="text" name="ogrenci_sevmedikleri" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_sevmedikleri'] ?>" placeholder="Öğrencinin Sevmedikleri">
                                        </div>

                                        <div class="col-lg-6 col-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Anne Adı</label>
                                            <input type="text" name="ogrenci_anne_adi" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_anne_adi'] ?>" placeholder="Öğrencinin Anne Adı">
                                        </div>

                                        <div class="col-lg-6 col-6  mb-1">
                                            <label for="" class="form-label">Öğrencinin Baba Adı</label>
                                            <input type="text" name="ogrenci_baba_adi" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_baba_adi'] ?>" placeholder="Öğrencinin Baba Adı">
                                        </div>


                                        <div class="col-lg-4 col-12 mb-1">
                                            <label for="" class="form-label">Öğrenci Telefon Numarası</label>
                                            <input type="number" name="ogrenci_tel" class="form-control form-control-lg" value="<?php echo $ogrenci_cek['ogrenci_tel'] ?>" placeholder="Öğrenci Telefon Numarası">
                                        </div>

                                        <div class="col-lg-4 col-6 mb-1">
                                            <label for="ogrenci_il_sec" class="form-label">Öğrenci İl</label>
                                            <select class="form-select form-control-lg form-control form-control-lg-lg bg-transparent" id="ogrenci_il_sec" name="ogrenci_il">
                                                <option value="<?php echo $ogrenci_cek['ogrenci_il'] ?>" class="" selected><?php echo $ogrenci_cek['ogrenci_il'] ?></option>
                                                <?php


                                                $ogrenci_il_sor = $db->prepare("SELECT * from iller");
                                                $ogrenci_il_sor->execute();
                                                $il_say = 1;
                                                while ($ogrenci_il_cek = $ogrenci_il_sor->fetch(PDO::FETCH_ASSOC)) {
                                                    $il_say++;
                                                ?>
                                                    <option class="text-dark" sehirno_cek="<?php echo $ogrenci_il_cek['id'] ?>" value="<?php echo $ogrenci_il_cek['sehiradi'] ?>"><?php echo $ogrenci_il_cek['sehiradi'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>


                                        <div class="col-lg-4 col-6 mb-1">
                                            <label for="ogrenci_ilce_sec" class="form-label">Öğrenci İlçe</label>
                                            <div id="ilce"></div>
                                            <select class="form-select form-control-lg form-control form-control-lg-lg bg-transparent result" id="ogrenci_ilce_sec" name="ogrenci_ilce">
                                                <option value="<?php echo $ogrenci_cek['ogrenci_ilce'] ?>" class="" selected><?php echo $ogrenci_cek['ogrenci_ilce'] ?></option>

                                            </select>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <label for="ogrenci_donemi" class="form-label">Öğrencinin Bulunduğu Dönem</label>
                                            <select name="ogrenci_donemi" class="form-select form-control-lg" id="ogrenci_donemi">
                                                <option selected value="<?php echo $ogrenci_cek['ogrenci_donemi'] ?>"><?php echo $ogrenci_cek['ogrenci_donemi'] ?></option>
                                                <?php
                                                $donem_sor = $db->prepare('SELECT * FROM ogrenci_donemi');
                                                $donem_sor->execute();
                                                while ($donem_cek = $donem_sor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $donem_cek['donem_yili'] ?>"><?php echo $donem_cek['donem_yili'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="col-12 mb-1">
                                            <label for="" class="form-label">Öğrencinin Adres</label>
                                            <textarea name="ogrenci_adres" class="form-control form-control-lg" cols="30" rows="10" placeholder="Öğrenci Adres"><?php echo $ogrenci_cek['ogrenci_adres'] ?></textarea>
                                        </div>
                                        <input type="hidden" name="ogrenci_id" value="<?php echo $ogrenci_cek['ogrenci_id'] ?>">


                                    </div>
                                    <div class="my-1 col-lg-3 col-md-6 col-sm-3 col-2 float-end">
                                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light form-control form-control-lg button-h" type="submit" name="ogrenci_bilgilerini_guncelle">
                                            <span class="align-middle d-sm-inline-block d-none">Bilgileri Güncelle</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="right-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>


<script>
    $(document).ready(function() {
        $('#ogrenci_ekle').addClass('active');
    })
</script>

<script>
    $(document).ready(function() {
        
        $(document).on("change", '#ogrenci_il_sec', function() {

            /* Get input required value on change */
            var inputVal = $('option:selected', this).attr('sehirno_cek');
            var resultDropdown = $("#ogrenci_ilce_sec").after();

            if (inputVal.length) {
                $.get("ogrenci_il_ilce.php", {
                    term: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();

            }
        });
    });
</script>

<?php require_once 'footer.php'; ?>