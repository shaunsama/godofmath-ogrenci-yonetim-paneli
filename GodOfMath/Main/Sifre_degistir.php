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
                                    <a class="nav-link " href="Hesabim">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-3 me-50">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="fw-bold">Hesap Bilgileri</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="Sifre_degistir.php">
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
                                    <h4 class="card-title">Şifre Değişikliği</h4>
                                </div>
                                <div class="card-body py-2 my-25">
                                    <form action="../admin/veritabani_islemleri.php" method="POST">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="account-old-password">Mevcut Şifre</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="password" class="form-control" id="admin_eski_sifre" name="admin_eski_sifre" placeholder="············">
                                                    <div class="input-group-text cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="admin_yeni_sifre">Yeni Şifre</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="password" id="admin_yeni_sifre" name="admin_yeni_sifre" class="form-control" placeholder="············">
                                                    <div class="input-group-text cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-2">
                                                <label class="form-label" for="admin_yeni_sifre2">Yeni Şifre (Tekrar)</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="password" class="form-control" id="admin_yeni_sifre2" name="admin_yeni_sifre2" placeholder="············">
                                                    <div class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw-bolder">Şifre Gereksinimleri:</p>
                                                <ul class="ps-1 ms-25">
                                                    <li class="mb-50">Şifreniz, minimum 6 karakterden oluşmalıdır.</li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="admin_sifre_guncelle" class="btn btn-primary button-settings button-h me-1 mt-1 waves-effect waves-float waves-light">Kaydet</button>
                                            </div>
                                        </div>
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