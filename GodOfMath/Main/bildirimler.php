<?php

require_once 'Header.php';

$bildirimler_sor = $db->prepare("SELECT * FROM bildirimler ORDER BY bildirim_zaman desc");
$bildirimler_sor->execute();

$bildirimler_say = $bildirimler_sor->rowCount();


?>


<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php require_once 'navbar.php'; ?>
    <?php require_once 'left_sidebar.php'; ?>


    <div class="sidenav-overlay"></div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">

                <section class="horizontal-wizard">
                <?php if ($bildirimler_say != 0) { ?>

                    <div class="text-end mb-1">
                        <a href="#bildirimleri_sil" class="rounded fs-4 text-primary" data-mdb-toggle="modal" data-mdb-target="#bildirimleri_sil">
                            Tüm Bildirimleri Sil
                        </a>
                    </div>

                    <div class="modal fade" id="bildirimleri_sil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-start">
                                <div class="modal-header border-bottom">
                                    <h5 class="modal-title" id="exampleModalLabel">Bildirim Silme İşlemi</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../admin/veritabani_islemleri.php" method="post" enctype="multipart/form-data">

                                    <div class="modal-body py-2 fs-4">

                                        Tüm bildirimleri silmek istediğinize emin misiniz?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark button-h button-settings" data-mdb-dismiss="modal">İptal</button>
                                        <button name="bildirimleri_sil" type="submit" class="btn btn-danger button-settings button-h">Sil</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <?php while ($bildirimler_cek = $bildirimler_sor->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-lg-12">
                                <div class="card " style="border-radius: 15px;">
                                    <div class="card-body">
                                        <li class="list-group-item bg-transparent border-0 my-1 text-dark">
                                            <div class="avatar bg-light-danger p-50 me-1">
                                                <span class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle font-medium-4">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                    </svg>
                                                </span>
                                            </div>
                                            <?php echo $bildirimler_cek['bildirim_detay'] ?>

                                        </li>
                                    </div>
                                    <div class="card-footer">
                                        <?php echo date('m.d.Y H:i:s', strtotime($bildirimler_cek['bildirim_zaman'])) ?>
                                    </div>
                                </div>
                            <?php } ?>

                            </div>
                    </div>
                    <?php if ($bildirimler_say == 0) { ?>
                        <div class=" d-lg-flex col-lg-12 align-items-center justify-content-center">

                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5 mb-1"><img class="img-fluid" src="../images/login-v2.svg" alt="" /></div>

                            <div class="w-100 text-center">
                                <h2 class="mb-1">Oops! Bildirim bulunamadı. 🕵🏻‍♀️</h2>

                                <p class="mb-2">Şu anda yeni bir bildirim bulunmamaktadır.</p>
                                <div class="text-center">
                                <a class="btn btn-primary mb-2 button-h text-center" style="max-width: 182px!important;" href="Home">Ana Sayfaya Geri Dön</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </section>
            </div>
        </div>
    </div>
</body>

<?php require_once 'Footer.php' ?>