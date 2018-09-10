<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php"; 

?>
<div id="content-wrapper">
<div class="container-fluid text-center">
    <h1>Pregled sadržaja čitave strane</h1><br>


<!--Tabela za prikaz tekstova sa početne-->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Naslov</th>
        <th>Tekst</th>
        <th>Slika</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
       <?php 
           $query = "SELECT * FROM tekstovi";
           $result = mysqli_query($connection, $query);
           while($row = mysqli_fetch_assoc($result)){
             $txt_id= $row['text_id'];
             $txt_naslov = $row['text_naslov'];
             $txt_sadrzaj = $row['text_sadrzaj'];
             $txt_slika = $row['text_slika'];
       ?>
      <tr>
        <td><?php echo $txt_id; ?></td>
        <td><?php echo $txt_naslov; ?></td>
        <td><?php echo $txt_sadrzaj; ?></td>
        <td><img class='img-fluid' src='../images/<?php echo $txt_slika; ?>' alt='NemaSlike'></td>
        <td><a href="azuriraj.php?azuriraj=1&t_id=<?php echo $txt_id; ?>">Izmijeni</a></td>
      </tr>
           <?php }?>
      </tbody>
     </table>
</div>

 <h1>Klijent:</h1><br>

<!--Tabela za prikaz klijenata-->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Naslov</th>
        <th>Slika</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
        $query = "SELECT * FROM clients";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
          $db_client_id= $row['client_id'];
          $db_client_slika = $row['client_slika'];
          $db_client_naslov = $row['client_naslov'];
    ?>
        <tr>
            <td><?php echo $db_client_id; ?></td>
            <td><?php echo $db_client_naslov; ?></td>
            <td><img width=100 class='img-fluid' src='../images/Clients/<?php echo $db_client_slika; ?>' alt='NemaSlike'></td>
            <td><a href="azuriraj.php?azuriraj=2&c_id=<?php echo $db_client_id; ?>">Izmijeni</a><br><br>
                <a href="sadrzaj.php?ukloni=1&c_id=<?php echo $db_client_id; ?>">Ukloni</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
  </table>
 </div>
<!--/.table-responsive-->

 <h1>Kancelarije:</h1><br>

<!--Tabela za prikaz kancelarija -->    
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Naslov</th>
        <th>Crno-bijela slika</th>
        <th>Slika u boji</th>
        <th>Oblast</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
       <?php 
           $query = "SELECT * FROM offices";
           $result = mysqli_query($connection, $query);
           while($row = mysqli_fetch_assoc($result)){
             $db_off_id= $row['off_id'];
             $db_off_naslov = $row['off_naslov'];
             $db_off_cnb = $row['off_cnb'];
             $db_uoff_ub = $row['off_ub'];
             $db_off_oblast = $row['off_oblast'];
       ?>
      <tr>
        <td><?php echo $db_off_id; ?></td>
        <td><?php echo $db_off_naslov; ?></td>
        <td><img width=90 class='img-fluid' src='../images/Offices/cnb/<?php echo $db_off_cnb; ?>' alt='NemaSlike'></td>
        <td><img width=90 class='img-fluid' src='../images/Offices/uboji/<?php echo $db_uoff_ub; ?>' alt='NemaSlike'></td>
        <td><?php echo $db_off_oblast; ?></td>
        <td><a href="azuriraj.php?azuriraj=3&off_id=<?php echo $db_off_id; ?>">Izmijeni</a><br><br>
            <a href="sadrzaj.php?ukloni=2&off_id=<?php echo $db_off_id; ?>">Ukloni</a> 
      </td>
      </tr>
           <?php }?>
      </tbody>
     </table>
</div>


<!--Brisanje iz tabele -->
<?php
if(isset($_GET['ukloni']) && $_GET['ukloni']==1){
  $c_id = $_GET['c_id'];
  $query = "DELETE FROM clients WHERE client_id = {$c_id}";
  $result = mysqli_query($connection,$query);
  header('Location: sadrzaj.php');
  if(!$result){
    die("QUERY ERROR".mysqli_error($connection));
  }
}
if(isset($_GET['ukloni']) && $_GET['ukloni']==2){
  $off_id = $_GET['off_id'];
  $query = "DELETE FROM offices WHERE off_id = {$off_id}";
  $result = mysqli_query($connection, $query);
  header('Location: sadrzaj.php');
  if(!$result){
    die("QUERY ERROR".mysqli_error($connection));
  }

}


?>

            </div>
            <!--/.container-fluid-->

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