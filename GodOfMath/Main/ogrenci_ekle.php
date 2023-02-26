<?php require_once 'header.php'; ?>

<body class="pace-done vertical-layout vertical-menu-modern navbar-floating footer-static menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php require_once 'navbar.php'; ?>
    <?php require_once 'left_sidebar.php'; ?>

    <div class="sidenav-overlay"></div>


    <?php if ($_GET['d'] == "true") { ?>

        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı!',
                    text: 'Öğrenci Başarıyla Eklendi.',
                    confirmButtonText: 'Tamam',
                    showConfirmButton: true
                });
            })
        </script>
    <?php } ?>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <section class="horizontal-wizard card ">
                    <div class="bs-stepper horizontal-wizard-example linear">
                        <div class="bs-stepper-header justify-content-start" role="tablist">
                            <div class="step active" data-target="#account-details" role="tab" id="account-details-trigger">
                                <button type="button" class="step-trigger" aria-selected="true">
                                    <span class="bs-stepper-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle font-medium-3">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="16"></line>
                                            <line x1="8" y1="12" x2="16" y2="12"></line>
                                        </svg>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Kişisel Bilgiler</span>
                                        <span class="bs-stepper-subtitle">Öğrencinin Kişisel Bilgilerini Giriniz.</span>
                                    </span>
                                </button>
                            </div>


                        </div>

                        <div class="bs-stepper-content">
                            <div id="account-details" class="content active dstepper-block" role="tabpanel" aria-labelledby="account-details-trigger">

                                <form novalidate="novalidate" action="../admin/veritabani_islemleri.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <label for="" class="form-label">Öğrenci Fotoğraf</label>

                                        <div class="d-flex mb-1">

                                            <a href="#" class="me-25">
                                                <img src="../images/student.png" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100">
                                            </a>
                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                <div>
                                                    <label for="ogrenci_fotograf" class="btn btn-primary mb-75 me-75 waves-effect waves-float waves-light button-h button-settings">Yükle</label>
                                                    <input type="file" id="ogrenci_fotograf" name="ogrenci_fotograf" hidden="" accept="image/*">
                                                    <p class="mb-0">Kabul Edilen Formatlar: <b>PNG</b>, <b>JPG</b>, <b>JPEG</b>, <b>GIF</b>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci T.C. Kimlik Numarası</label>
                                            <input type="number" name="ogrenci_tc" class="form-control form-control-lg" placeholder="Öğrenci T.C. Kimlik Numarası">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Ad</label>
                                            <input type="text" name="ogrenci_ad" class="form-control form-control-lg" required placeholder="Öğrenci Ad">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Soyad</label>
                                            <input type="text" name="ogrenci_soyad" class="form-control form-control-lg" required placeholder="Öğrenci Soyad">
                                        </div>

                                        <div class="col-lg-4  col-6 mb-1">
                                            <label for="" class="form-label">Öğrenci Lise</label>
                                            <input type="text" name="ogrenci_lise" class="form-control form-control-lg" placeholder="Öğrenci Lise">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Üniversite</label>
                                            <input type="text" name="ogrenci_universite" class="form-control form-control-lg" placeholder="Öğrenci Üniversite">
                                        </div>

                                        <div class="col-lg-4 col-6  mb-1">
                                            <label for="" class="form-label">Öğrenci Meslek</label>
                                            <input type="text" name="ogrenci_meslek" class="form-control form-control-lg" placeholder="Öğrenci Meslek">
                                        </div>

                                        <div class="col-lg-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Sevdikleri</label>
                                            <input type="text" name="ogrenci_sevdikleri" class="form-control form-control-lg" placeholder="Öğrencinin Sevdikleri">
                                        </div>

                                        <div class="col-lg-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Sevmedikleri</label>
                                            <input type="text" name="ogrenci_sevmedikleri" class="form-control form-control-lg" placeholder="Öğrencinin Sevmedikleri">
                                        </div>

                                        <div class="col-lg-6 col-6 mb-1">
                                            <label for="" class="form-label">Öğrencinin Anne Adı</label>
                                            <input type="text" name="ogrenci_anne_adi" class="form-control form-control-lg" placeholder="Öğrencinin Anne Adı">
                                        </div>

                                        <div class="col-lg-6 col-6  mb-1">
                                            <label for="" class="form-label">Öğrencinin Baba Adı</label>
                                            <input type="text" name="ogrenci_baba_adi" class="form-control form-control-lg" placeholder="Öğrencinin Baba Adı">
                                        </div>


                                        <div class="col-lg-4 col-12 mb-1">
                                            <label for="" class="form-label">Öğrenci Telefon Numarası</label>
                                            <input type="number" name="ogrenci_tel" class="form-control form-control-lg" placeholder="Öğrenci Telefon Numarası">
                                        </div>

                                        <div class="col-lg-4 col-6 mb-1">
                                            <label for="ogrenci_il_sec" class="form-label">Öğrenci İl</label>
                                            <select class="form-select form-control-lg form-control form-control-lg-lg bg-transparent" id="ogrenci_il_sec" name="ogrenci_il">
                                                <option value="" class="text-dark">Bir Şehir Seçiniz</option>
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

                                            </select>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <label for="ogrenci_donemi" class="form-label">Öğrencinin Bulunduğu Dönem</label>
                                            <select name="ogrenci_donemi" class="form-select form-control-lg" id="ogrenci_donemi">
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
                                            <textarea name="ogrenci_adres" class="form-control form-control-lg" cols="30" rows="10" placeholder="Öğrenci Adres"></textarea>
                                        </div>

                                        

                                    </div>
                                    <div class="my-1 col-lg-3 col-md-6 col-sm-3 col-2 float-end">
                                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light form-control form-control-lg button-h" type="submit" name="ogrenci_ekle">
                                            <span class="align-middle d-sm-inline-block d-none">Öğrenciyi Ekle</span>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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