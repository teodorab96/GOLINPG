   <?php
   function footer(){ ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
<?php
   }
    function stickyFooter(){

   echo " <footer class='sticky-footer'>
          <div class='container my-auto'>
            <div class='copyright text-center my-auto'>
              <span>© 2018 GOLIN PODGORICA. All rights reserved.</span>
            </div>
          </div>
        </footer>

      </div> ";
       } ?>