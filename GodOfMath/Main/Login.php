<?php require_once 'header2.php' ?>


<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
       
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                       
                        <div class="d-none d-lg-flex col-lg-7 align-items-center ">
                            
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="../images/login-v2.svg" alt="" /></div>
                        </div>
                        <div class="d-flex col-lg-5 align-items-center auth-bg px-3 p-lg-5 bg-white min-vh-100">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">God Of Math'e Hoşgeldiniz! 👋</h2>
                                <p class="card-text mb-2">Panele giriş yapmak için lütfen bilgilerinizi giriniz.</p>
                                <form class="auth-login-form mt-2" action="../admin/veritabani_islemleri.php" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email">E-Posta</label>
                                        <input class="form-control form-control-lg" id="login-email" type="text" name="admin_mail" placeholder="E-Posta" aria-describedby="login-email" autofocus="" tabindex="1" required="">
                                    </div>
                                    <div class="mb-1">
                                        <label for="login-password" class="form-label">Şifre</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-lg" id="login-password" type="password" name="admin_sifre" placeholder="············" aria-describedby="login-password" tabindex="2" required="" value="">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                   
                                    <button class="btn btn-primary btn-lg text-center w-100" style="max-height: 42px!important;" tabindex="4" name="admin_login">Giriş Yap</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="panel/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="panel/app-assets/vendors/js/vendors.min.js"></script>
    <script src="panel/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="panel/app-assets/js/core/app-menu.js"></script>
    <script src="panel/app-assets/js/core/app.js"></script>
    <script src="panel/app-assets/js/scripts/pages/auth-login.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script type="text/javascript">
    </script>
</body>





















<?php require_once 'Footer.php' ?>