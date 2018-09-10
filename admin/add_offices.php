<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php"; 

?>
<div id="content-wrapper">
<div class="container-fluid text-center">
    <h3>Dodavanje novih kacelarija</h3>
<?php   
    if(isset($_GET['uspjesno']) && $_GET['uspjesno']==1){
        echo "<h3>Kancelarija uspješno dodata</h3>";
    }
    else if(isset($_GET['uspjesno']) && $_GET['uspjesno']==0){
        echo "<h3>Sva polja moraju biti popunjena</h3>";
    }


    if(isset($_POST['azoffice'])){
        $off_naslov = $_POST['off_naslov'];
        $off_oblast = $_POST['off_oblast'];
        $off_cnb_slika = $_FILES['off_cnb_slika']['name'];
        $off_cnb_slika_temp = $_FILES['off_cnb_slika']['tmp_name'];
        $off_ub_slika = $_FILES['off_ub_slika']['name'];
        $off_ub_slika_temp = $_FILES['off_ub_slika']['tmp_name'];
        if($off_naslov !="" && $off_oblast !=""){
        move_uploaded_file($off_cnb_slika_temp,"../images/Offices/cnb/$off_cnb_slika");
        move_uploaded_file($off_ub_slika_temp,"../images/Offices/uboji/$off_ub_slika");

        $query ="INSERT INTO offices(off_naslov,off_cnb, off_ub, off_oblast) VALUES ('{$off_naslov}','{$off_cnb_slika}','{$off_ub_slika}','{$off_oblast}')";
        $result = mysqli_query($connection,$query);
        if($result){
            header("Location:add_offices.php?uspjesno=1");
        }
        else{
            die("Error" . mysqli_error($connection));
        }
    }
    else{
        header("Location: add_offices.php?uspjesno=0");
    }
    }
?>
    

<form action="" method="post" enctype= "multipart/form-data">
  <div class="form-group">
    <label for="naslov">Naslov:</label><br>
    <input type="text" name="off_naslov" class="clnaslov">
  </div>
  <div class="form-group">
      <label for="off_cnb_slika">Izaberite crno-bijelu fotografiju:</label><br>
    <input type="file" name="off_cnb_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
      <label for="off_ub_slika">Izaberite fotografiju u boji:</label><br>
    <input type="file" name="off_ub_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
    <label for="off_oblast">Izaberite oblast:</label><br>
    <select name="off_oblast">
        <option value="EMEA">EMEA</option>
        <option value="AMERICAS">AMERICAS</option>
        <option value="ASIA">ASIA</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" name="azoffice" class="azurirajbtn" value="Dodaj kancelariju"><br>
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