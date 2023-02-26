<?php require_once 'Header.php'; ?>
<style>
    .pointer {
        cursor: pointer !important;
    }
</style>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php require_once 'navbar.php' ?>
    <?php require_once 'left_sidebar.php' ?>


    <div class="sidenav-overlay"></div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">

                <section class="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable">
                                    <div class="row">
                                        <div class="col-lg-4 col-6 m-1">
                                            <label for="myInput" class="form-label">Öğrenci Ara</label>

                                            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Öğrenci Ara..">

                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="dt-responsive table text-center" id="myTable">

                                            <thead>
                                                <tr>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(0)">#</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(1)">Öğrenci Fotoğraf</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(2)">Ad</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(3)">Soyad</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(4)">T.C. Kimlik Numarası</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(5)">Meslek</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(6)">İl</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(7)">İlçe</th>
                                                    <th scope="col" class="sorting pointer" onclick="sortTable(8)">Telefon Numarası</th>
                                                    <th scope="col">İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $ogrenci_listesi_sor = $db->prepare("SELECT * FROM ogrenci_bilgileri");
                                                $ogrenci_listesi_sor->execute();

                                                $ogrenci_say = 0;
                                                while ($ogrenci_listesi_cek = $ogrenci_listesi_sor->fetch(PDO::FETCH_ASSOC)) {
                                                    $ogrenci_say++;
                                                ?>
                                                    <tr class="text-center students">

                                                        <td><?php echo $ogrenci_say ?></td>
                                                        <td><img src="<?php echo $ogrenci_listesi_cek['ogrenci_fotograf'] ?>" class="rounded" style="width: 75px; height: 75px; object-fit: cover!important;" alt="" srcset=""></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_ad'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_soyad'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_tc'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_meslek'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_il'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_ilce'] ?></td>
                                                        <td><?php echo $ogrenci_listesi_cek['ogrenci_tel'] ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="ogrenci_detay?ogrenci_id=<?php echo $ogrenci_listesi_cek['ogrenci_id'] ?>" class="btn btn-primary me-1 rounded" style="max-height: 38px!important; max-width: 55px!important;">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a class="btn btn-danger rounded" style="max-height: 38px!important; max-width: 52.75px!important;" data-mdb-toggle="modal" data-mdb-target="#ogrenci_sil<?php echo $ogrenci_listesi_cek['ogrenci_id'] ?>">
                                                                    <i class="fas fa-close"></i>
                                                                </a>


                                                                <div class="modal fade" id="ogrenci_sil<?php echo $ogrenci_listesi_cek['ogrenci_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content text-start">
                                                                            <div class="modal-header border-bottom">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Öğrenci Silme İşlemi</h5>
                                                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="../admin/veritabani_islemleri.php" method="post" enctype="multipart/form-data">

                                                                                <div class="modal-body py-2">
                                                                                    <input type="hidden" name="ogrenci_tc" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_tc'] ?>">
                                                                                    <input type="hidden" name="ogrenci_fotograf" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_fotograf'] ?>">
                                                                                    <input type="hidden" name="ogrenci_ad" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_ad'] ?>">
                                                                                    <input type="hidden" name="ogrenci_soyad" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_soyad'] ?>">
                                                                                    <input type="hidden" name="ogrenci_tel" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_tel'] ?>">
                                                                                    <input type="hidden" name="ogrenci_lise" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_lise'] ?>">
                                                                                    <input type="hidden" name="ogrenci_universite" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_universite'] ?>">
                                                                                    <input type="hidden" name="ogrenci_il" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_il'] ?>">
                                                                                    <input type="hidden" name="ogrenci_ilce" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_ilce'] ?>">
                                                                                    <input type="hidden" name="ogrenci_adres" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_adres'] ?>">
                                                                                    <input type="hidden" name="ogrenci_meslek" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_meslek'] ?>">
                                                                                    <input type="hidden" name="ogrenci_sevdikleri" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_sevdikleri'] ?>">
                                                                                    <input type="hidden" name="ogrenci_sevmedikleri" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_sevmedikleri'] ?>">
                                                                                    <input type="hidden" name="ogrenci_anne_adi" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_anne_adi'] ?>">
                                                                                    <input type="hidden" name="ogrenci_baba_adi" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_baba_adi'] ?>">
                                                                                    <input type="hidden" name="ogrenci_donemi" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_donemi'] ?>">
                                                                                    <input type="hidden" name="ogrenci_id" type="text" value="<?php echo $ogrenci_listesi_cek['ogrenci_id'] ?>">

                                                                                    <b class="bg-light-success fs-4"><?php echo $ogrenci_listesi_cek['ogrenci_ad'] . " " . $ogrenci_listesi_cek['ogrenci_soyad'] ?></b> Adlı Öğrenciyi Silmek İstediğinize Emin Misiniz?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-dark button-h button-settings" data-mdb-dismiss="modal">İptal</button>
                                                                                    <button name="ogrenciyi_sil" type="submit" class="btn btn-danger button-settings button-h">Sil</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-between mx-0 row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination mt-3">
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

<?php require_once 'Footer.php'; ?>
<script>
    function sortTable(n) {
        var table, rows, switching, i, shouldSwitch, dir, switchcount = 0;
       
        table = document.getElementById("myTable");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                x = Number(x.innerHTML.toLowerCase()) ? Number(x.innerHTML.toLowerCase()) : x.innerHTML.toLowerCase();
            y = Number(y.innerHTML.toLowerCase()) ? Number(y.innerHTML.toLowerCase()) : y.innerHTML.toLowerCase();

                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                if (x > y) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x < y) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    $(document).ready(function() {
        $("#myInput").on("input", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable .students").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });
        });
    });
    $(document).ready(function() {
        $('#ogrenci_listesi').addClass('active');
    })
</script>