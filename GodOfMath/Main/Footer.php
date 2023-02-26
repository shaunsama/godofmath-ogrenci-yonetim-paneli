<footer>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
  <script type="text/javascript" src="../js/vendor.min.js"></script>
  <script type="text/javascript" src="../js/app-menu.js"></script>
  <script type="text/javascript" src="../js/app.js"></script>
  <script type="text/javascript" src="../js/toaster.min.js"></script>
  <script type="text/javascript" src="../js/bs-stepper.min.js"></script>
  <script type="text/javascript" src="../js/select2.min.js"></script>
  <script type="text/javascript" src="../js/form-wizard.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>

  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="../js/responsive.bootstrap5.js"></script>
  <script type="text/javascript" src="../js/flatpickr.min.js"></script>

  <!--  <script type="text/javascript" src="../js/table-datatables-advanced.js"></script>-->


  <script src="https://unpkg.com/feather-icons"></script>
  
  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    });
/*
    function adBlockNotDetected() {
      window.isAdBlocked = false;
    }

    // Function called if AdBlock is detected
    function adBlockDetected() {
      window.isAdBlocked = true;
    }

    // We look at whether FuckAdBlock already exists.
    if (typeof fuckAdBlock !== 'undefined' || typeof FuckAdBlock !== 'undefined') {
      // If this is the case, it means that something tries to usurp are identity
      // So, considering that it is a detection
      adBlockDetected();
    } else {
      // Otherwise, you import the script FuckAdBlock
      var importFAB = document.createElement('script');
      importFAB.onload = function() {
        // If all goes well, we configure FuckAdBlock
        fuckAdBlock.onDetected(adBlockDetected);
        fuckAdBlock.onNotDetected(adBlockNotDetected);
      };
      importFAB.onerror = function() {
        // If the script does not load (blocked, integrity error, ...)
        // Then a detection is triggered
        adBlockDetected();
        
      };
      importFAB.integrity = 'sha256-xjwKUY/NgkPjZZBOtOxRYtK20GaqTwUCf7WYCJ1z69w=';
      importFAB.crossOrigin = 'anonymous';
      importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js';
      document.head.appendChild(importFAB);
    }
    */
  </script>
  
</footer>