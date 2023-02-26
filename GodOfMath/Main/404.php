<?php require_once 'header2.php'; ?>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row ">
            </div>
            <div class="content-body pt-5">
                <div class="misc-wrapper p-lg-5">
                    <div class="misc-inner p-2 p-sm-3 ">
                        <div class="w-100 text-center">
                            <h2 class="mb-1">Oops! Sayfa Bulunamadı. 🕵🏻‍♀️</h2>

                            <p class="mb-2">Girdiğiniz adres hatalı veya şu anda kullanım dışı.</p>
                            <a class="btn btn-primary mb-2 button-h " style="max-width: 182px!important;" href="Home">Ana Sayfaya Geri Dön</a>
                            <div>
                                <img class="img-fluid" src="../images/error.svg" alt="Error page" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="panel/app-assets/vendors/js/vendors.min.js"></script>
    <script src="panel/app-assets/js/core/app-menu.js"></script>
    <script src="panel/app-assets/js/core/app.js"></script>
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
</body>
<?php require_once 'Footer.php'; ?>