<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php"; 

?>
<div id="content-wrapper">
<div class="container-fluid text-center">
    <h3>Dodavanje novih klijenata</h3>
<?php   
    if(isset($_GET['uspjesno']) && $_GET['uspjesno']==1){
        echo "<h3>Klijent uspješno dodat </h3>";
    }
    else if(isset($_GET['uspjesno']) && $_GET['uspjesno']==0){
        echo "<h3>Sva polja moraju biti popunjena</h3>";
    }
    if(isset($_POST['azclient'])){
        $c_naslov = $_POST['naslov'];
        $c_slika = $_FILES['c_slika']['name'];
        $c_slika_temp = $_FILES['c_slika']['tmp_name'];
        if($c_naslov !=""){
        move_uploaded_file($slika_temp,"../images/Clients/$slika");

        $query ="INSERT INTO clients(client_naslov,client_slika) VALUES ('{$c_naslov}','{$c_slika}')";
        $result = mysqli_query($connection,$query);
        if($result){
            header("Location:add_clients.php?uspjesno=1");
        }
        else{
            die("Error" . mysqli_error($connection));
        }
    }
    else{
        header("Location: add_clients.php?uspjesno=0");
    }
    }
    ?>
    

<form action="" method="post" enctype= "multipart/form-data">
  <div class="form-group">
    <label for="naslov">Naslov:</label><br>
    <input type="text" name="naslov" class="clnaslov">
  </div>
  <div class="form-group">
      <label for="c_slika">Izaberite fotografiju:</label><br>
    <input type="file" name="c_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
    <input type="submit" name="azclient" class="azurirajbtn" value="Dodaj klijenta"><br>
  </div>
</form>



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