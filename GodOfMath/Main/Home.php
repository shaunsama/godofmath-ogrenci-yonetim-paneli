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
                           <div class="d-flex mb-2 ">
                               <a href="#" class="me-50">
                                   <img src="<?php echo $admin_cek['admin_avatar'] ?>" id="account-upload-img" class="uploadedAvatar rounded-circle me-50" alt="profile image" height="100" width="100">
                               </a>
                               <div class="ms-50">
                                   <div class="fs-1">Merhaba <b class="fs-1 mb-1" style="font-family: roboto!important;"><?php echo $admin_cek['admin_ad'] ?> 👋</b>

                                   </div>
                                   <div class="fs-3 " style="font-family: Roboto;">
                                       Öğrenci Yönetim Paneline Hoş Geldin!
                                   </div>

                               </div>
                           </div>


                           <div class="col-lg-3 col-sm-6">
                               <div class="card">
                                   <div class="card-body d-flex align-items-center justify-content-between">
                                       <div>
                                           <h3 class="fw-bolder mb-75"><?php echo $ogrenci_say ?></h3>
                                           <span>Toplam Öğrenci Sayısı</span>
                                       </div>
                                       <div class="avatar bg-light-warning p-50">
                                           <span class="avatar-content">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle font-medium-4">
                                                   <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                   <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                               </svg>
                                           </span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-sm-6">
                               <div class="card">
                                   <div class="card-body d-flex align-items-center justify-content-between">
                                       <div>
                                           <h3 class="fw-bolder mb-75"><?php echo $silinen_ogrenci_say ?></h3>
                                           <span>Silinen Öğrenci Sayısı</span>
                                       </div>
                                       <div class="avatar bg-light-danger p-50">
                                           <span class="avatar-content">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home font-medium-4">
                                                   <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                   <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                               </svg>
                                           </span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-sm-6">
                               <div class="card">
                                   <div class="card-body d-flex align-items-center justify-content-between">
                                       <div>
                                           <h3 class="fw-bolder mb-75"><?php echo $admin_say ?></h3>
                                           <span>Toplam Admin Sayısı</span>
                                       </div>
                                       <div class="avatar bg-light-warning p-50">
                                           <span class="avatar-content">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle font-medium-4">
                                                   <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                   <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                               </svg>
                                           </span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3"></div>
                           <div class="col-lg-3 col-sm-6 col-12 mb-1">
                               <label for="ogrenci_donem_sec" class="form-label mb-1">Öğrencinin Bulunduğu Dönemi Seçiniz</label>
                               <select class="form-select form-control form-control-lg" id="ogrenci_donem_sec">
                                   <?php
                                    $donem_sor = $db->prepare('SELECT * FROM ogrenci_donemi');
                                    $donem_sor->execute();
                                    while ($donem_cek = $donem_sor->fetch(PDO::FETCH_ASSOC)) { ?>
                                       <option donem_yili="<?php echo $donem_cek['donem_yili'] ?>" value="<?php echo $donem_cek['donem_yili'] ?>"><?php echo $donem_cek['donem_yili'] ?></option>
                                   <?php } ?>

                               </select>

                           </div>
                           <div id="ogrenci_donem_cek"></div>

                   </section>
               </div>
           </div>
       </div>
   </body>
   <script>
       $(document).ready(function() {
           $('#ogrenci_verileri').addClass('active');
       })
   </script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   <script>
       $(document).ready(function() {
           $(document).on("change", '#ogrenci_donem_sec', function() {
               /* Get input required value on change */
               var inputVal = $('option:selected', this).attr('donem_yili');
               var resultDropdown = $("#ogrenci_donem_cek").after();
               if (inputVal.length) {
                   $.get("ogrenci_donem_cek.php", {
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

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("ogrenci_table");
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
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
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
  
   
</script>
   <?php require_once 'Footer.php' ?>