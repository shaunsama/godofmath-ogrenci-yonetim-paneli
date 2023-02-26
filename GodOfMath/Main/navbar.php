<?php

$admin_sor = $db->prepare("SELECT * FROM admin_acc where admin_id=:admin_id");
$admin_sor->execute(array(
    'admin_id' => intval($_SESSION['session_admin_id'])
));

$admin_cek = $admin_sor->fetch(PDO::FETCH_ASSOC);


$bildirim_sor = $db->prepare("SELECT * FROM bildirimler ORDER BY bildirim_zaman desc");
$bildirim_sor->execute();

$bildirim_sor1 = $db->prepare("SELECT * FROM bildirimler where bildirim_durum=:bildirim_durum");
$bildirim_sor1->execute(array(
    'bildirim_durum' => 0
));
$bildirim_say = $bildirim_sor1->rowCount();

while ($bildirim_durum_cek1 = $bildirim_sor1->fetch(PDO::FETCH_ASSOC)) {
}

?>
<input type="hidden" id="admin_id" value="<?php echo $admin_cek['admin_id'] ?>">
<?php if ($admin_cek['admin_darkmode'] == 1) { ?>
    <input type="hidden" value="1" id="dm">
<?php } ?>
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <li class="nav-item" id="dark_mode"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
               
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            </ul>
        </div>

        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">

                        <?php echo $bildirim_say ?>

                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end  ">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Bildirimler</h4>
                            <?php if ($bildirim_say < 1) { ?>

                                <div class="badge rounded-pill badge-light-primary ">Yeni Bir Bildirim Yok</div>
                            <?php } ?>

                        </div>
                    </li>
                    <div class="responsive-list">

                        <?php while ($bildirim_cek = $bildirim_sor->fetch(PDO::FETCH_ASSOC)) {


                        ?>
                            <?php if ($bildirim_say >= 1) { ?>

                                <li class="list-group-item border-0 border-bottom ">
                                    <div class="row py-2">
                                        <div class="col-2">
                                            <div class="avatar bg-light-success p-50 me-1">
                                                <span class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle font-medium-4">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div>
                                                <?php echo $bildirim_cek['bildirim_detay'] ?>
                                            </div>
                                            <div>
                                                <?php echo date('m.d.Y H:i:s', strtotime($bildirim_cek['bildirim_zaman'])) ?>
                                            </div>
                                        </div>
                                    </div>



                                </li>
                            <?php } ?>

                        <?php } ?>
                    </div>
                    <form action="../admin/veritabani_islemleri.php" method="post">
                        <li class="dropdown-menu-footer">
                            <button class="btn btn-primary form-control button-h w-100" name="bildirim_duzelt" type="submit">
                                Tüm Bildirimler
                                <a class="" href="bildirimler"></a>
                            </button>
                        </li>
                    </form>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder user_name"><?php echo $admin_cek['admin_ad'] . " " . $admin_cek['admin_soyad'] ?></span>
                        <span class="user-status">
                            Admin </span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="<?php echo $admin_cek['admin_avatar'] ?>" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="Hesabim"><i class="me-50" data-feather="settings"></i> Hesap Ayarları</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout"><i class="me-50" data-feather="power"></i> Çıkış Yap</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
