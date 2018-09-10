<?php include "includes/admin_header.php"; 
       include "includes/admin_navigation.php";
       include "includes/admin_footer.php";
?>

<div id="content-wrapper"> 
  <div class="container-fluid text-center">
    <br><br>
              <h4><b>Zakazani sastanci</b></h4><br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ime Klijenta</th>
                      <th>Firma</th>
                      <th>Email</th>
                      <th>Broj telefona</th>
                      <th>Datum</th>
                      <th>Vrijeme</th>
                      <th>Status</th>
                      <th></th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
    <?php
    $query = "SELECT * FROM sastanci";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){

        $sastanak_id = $row['sastanak_id'];
        $ime_klijenta = $row['ime_klijenta'];
        $firma = $row['firma'];
        $email = $row['email'];
        $telefon = $row['telefon'];
        $datum = $row['datum'];
        $vrijeme = $row['vrijeme'];
        $status = $row['status_sastanka'];

        echo "<tr>";
        echo "<td> $sastanak_id</td>";
        echo "<td> $ime_klijenta</td>";
        echo "<td>$firma</td>";
        echo "<td>$email </td>";
        echo "<td>$telefon</td>";
        echo "<td> $datum</td>";
        echo "<td> $vrijeme</td>";
        echo "<td> $status</td>";
        echo "<td><a href='index.php?prihvati={$sastanak_id}'>Prihvati</a></td>";
        echo "<td><a href='index.php?odbij={$sastanak_id}'>Odbij</a></td>";
        echo "</tr>";
    }

?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <?php stickyFooter(); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-secondary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

<?php footer();?>
<?php 
    if(isset($_GET['prihvati'])){
      $id = $_GET['prihvati'];

      $query = "UPDATE sastanci SET status_sastanka = 'Prihvaćen' WHERE sastanak_id={$id}";
      $resulet = mysqli_query($connection,$query);
      header("Location:index.php");
    }
    if(isset($_GET['odbij'])){
      $id = $_GET['odbij'];

      $query = "UPDATE sastanci SET status_sastanka = 'Odbijen' WHERE sastanak_id={$id}";
      $resulet = mysqli_query($connection,$query);
      header("Location:index.php");
    }
?>
