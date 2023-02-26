<?php require_once 'Header.php'; ?>


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
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-pills mb-2">

                                <li class="nav-item">
                                    <a class="nav-link active" href="Hesabim">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 me-50">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="fw-bold">Hesap Bilgileri</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="Sifre_degistir">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock font-medium-3 me-50">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <span class="fw-bold">Güvenlik</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Hesap Bilgileri</h4>
                                </div>
                                <div class="card-body py-2 my-25">
                                    <form action="../admin/veritabani_islemleri.php" method="post" enctype="multipart/form-data">

                                        <div class="d-flex">
                                            <a href="#" class="me-25">
                                                <img src="<?php echo $admin_cek['admin_avatar'] ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100">
                                            </a>
                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                <div>
                                                    <label for="admin_avatar" class="btn btn-primary mb-75 me-75 waves-effect waves-float waves-light button-h">Yükle</label>
                                                    <input type="file" id="admin_avatar" name="admin_avatar" hidden="" accept="image/*">
                                                    <p class="mb-0">Kabul Edilen Formatlar: <b>PNG</b>, <b>JPG</b>, <b>JPEG</b>, <b>GIF</b>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">

                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="admin_ad">Ad</label>
                                                <input type="text" class="form-control" id="admin_ad" name="admin_ad" value="<?php echo $admin_cek['admin_ad']?>">
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="admin_soyad">Soyad</label>
                                                <input type="text" class="form-control" id="admin_soyad" name="admin_soyad" value="<?php echo $admin_cek['admin_soyad'] ?>">
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="">E-Posta</label>
                                                <input type="email" class="form-control" value="<?php echo $admin_cek['admin_mail'] ?>" disabled="" style="cursor: not-allowed;">
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="">Nickname</label>
                                                <div class="input-group input-group-merge disabled">
                                                    <input type="text" class="form-control" value="<?php echo $admin_cek['admin_nickname'] ?>" disabled="" style="cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-1">
                                                <label class="form-label" for="">Kayıt Tarihi</label>
                                                <input type="text" class="form-control" id="accountOrganization" value="<?php echo date('d.m.Y H:i:s', strtotime($admin_cek['admin_kayit_tarihi'])) ?>" disabled="" style="cursor: not-allowed;">
                                            </div>
                                            <div class="col-md-12 col-sm-12 ">
                                                <button type="submit" name="hesap_bilgilerini_guncelle" class="btn btn-primary button-settings mt-1 me-1 waves-effect waves-float waves-light button-h">Kaydet</button>
                                            </div>
                                        </div>

                                        <input type="hidden" name="geri_donus_url" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
<?php require_once 'Footer.php'; ?>