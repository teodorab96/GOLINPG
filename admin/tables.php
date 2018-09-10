<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php"; 

?>
      <div id="content-wrapper">

        <div class="container-fluid text-center">
          <!-- DataTables Example -->
          <br><br><h4><b>Fliltrirana tabela</b></h4><br>          
<form action="tables.php" method="post" id="filter">
      <label for="datumP"><b>Početni datum i vrijeme: </b></label>
      <input type="date" id="datumP"  name="datumP">
      <input type="time"  name="vrijemeP"><br>
      <label for="datumK"><b>Krajnji datum i vrijeme: </b></label>
      <input type="date"  name="datumK">
      <input type="time"  name="vrijemeK"><br>
      <button type="submit" name="filtriraj" class="btn btn-primary">Filtriraj</button>
</form>
               <br>
              <div id="divprint" class="table-responsive">
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
                    </tr>
                  </thead>
                  <tbody>
<?php
if(isset($_POST['filtriraj'])){
 
  $pocetniD = $_POST['datumP'];
  $pocetnoV = $_POST['vrijemeP'];
  $krajnjiD = $_POST['datumK'];
  $krajnjeV = $_POST['vrijemeK'];


  $query = "SELECT * FROM sastanci WHERE datum BETWEEN 
  '{$pocetniD}' AND '{$krajnjiD}' AND vrijeme BETWEEN 
  '{$pocetnoV}' AND '{$krajnjeV}'";
  $result = mysqli_query($connection, $query);
  if(!$result){
    die('QUERY FAILED' . mysqli_error($connection));
  }
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
    echo "</tr>";
}
}
?>
                  </tbody>
                </table>        
          </div>
          <i class="fa fa-print" style="font-size:100%;"><a style="color:rgb(32,32,32);" href="#" onclick="printTabel('divprint')">Print table</a></i>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
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
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
<?php footer(); ?>