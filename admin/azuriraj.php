<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php"; 
?>
<div id="content-wrapper">
<div class="container-fluid text-left">


<!--AŽURIRANJE TEKSTOVA NA STRANI I DIJELA ISPOD KLIJENATA-->
<?php
    if(isset($_GET['azuriraj']) && $_GET['azuriraj']==1){
        $t_id = $_GET['t_id'];
        $query = "SELECT * FROM tekstovi WHERE text_id=$t_id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $db_txt_id= $row['text_id'];
        $db_txt_naslov = $row['text_naslov'];
        $db_txt_sadrzaj = $row['text_sadrzaj'];
        $db_txt_slika = $row['text_slika'];  
    if(isset($_POST['azurirajbtn'])){
        $sadrzaj = $_POST['sadrzaj'];
        if($t_id != 1){
            $slika = $_FILES['img']['name'];
            $slika_temp = $_FILES['img']['tmp_name'];
            move_uploaded_file($slika_temp,"../images/$slika");
            if(empty($slika)){
                $query = "SELECT * FROM tekstovi WHERE text_id = $t_id ";
                $select_image = mysqli_query($connection, $query);
            
                while($row = mysqli_fetch_assoc($select_image)){
                    $slika = $row['text_slika'];
                }
            }
            $query ="UPDATE tekstovi SET text_sadrzaj = '{$sadrzaj}', text_slika ='{$slika}' WHERE text_id=$t_id";
            $result = mysqli_query($connection,$query);
            if($result){
                header("Location: azuriraj.php?azuriraj=1&t_id='{$t_id}'");
            }
            else{
                die("Error" . mysqli_error($connection));
            }
        }
    else{
        $query = "UPDATE tekstovi SET text_sadrzaj = '{$sadrzaj}' WHERE text_id=$t_id";
        $result = mysqli_query($connection,$query);
        if($result){
            header("Location: azuriraj.php?azuriraj=1&t_id='{$t_id}'");
        }
        else{
            die("Error" . mysqli_error($connection));
        }
    }
}
?>

<!--FORMA ZA AŽURURANJE TEKSTOVA NA POČETNOJ STRANI-->
<form action="" method="post" enctype= "multipart/form-data">
    <h4>Naslov:</h4> <h4 style="color: rgb(254,198,39);"><?php echo $db_txt_naslov ?></h4>
    <label for="sadrzaj">Sadržaj:</label>
  <div class="form-group">
    <textarea cols="40" rows="5" name="sadrzaj"><?php echo $db_txt_sadrzaj ?></textarea>
  </div>

<?php if($t_id != 1) { ?>
    <div class="form-group">
        <img width=100 src="../images/<?php echo $db_txt_slika ?>" alt='error'><br>
        <input type="file" name="img" class="azimg"><br><br>
    </div>
<?php } ?>
<div class="form-group">
    <input type="submit" name="azurirajbtn" class="azurirajbtn" value="Ažuriraj"><br>
    <a class="azlink" href="sadrzaj.php">Vrati se</a>
</div>
</form>
<?php }?>


<!--AŽURIRANJE KLIJENATA-->
<?php 
    if(isset($_GET['azuriraj']) && $_GET['azuriraj']==2){
       
        $c_id = $_GET['c_id'];
        $query = "SELECT * FROM clients WHERE client_id=$c_id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
          $db_client_id= $row['client_id'];
          $db_client_naslov = $row['client_naslov'];
          $db_client_slika = $row['client_slika'];   
          
    if(isset($_POST['azclient'])){
        $c_naslov = $_POST['naslov'];
        $c_slika = $_FILES['c_slika']['name'];
        $c_slika_temp = $_FILES['c_slika']['tmp_name'];
        move_uploaded_file($slika_temp,"../images/Clients/$slika");
       
        /*Privjera da li je postavljena nova slika slika*/
        if(empty($c_slika)){
            $query = "SELECT * FROM clients WHERE client_id = $c_id ";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image)){
                    $c_slika = $row['client_slika'];
            }
        }
        $query ="UPDATE clients SET client_naslov = '{$c_naslov}', client_slika ='{$c_slika}' WHERE client_id=$c_id";
        $result = mysqli_query($connection,$query);
        if($result){
            header("Location: azuriraj.php?azuriraj=2&c_id='{$c_id}'");
        }
        else{
            die("Error" . mysqli_error($connection));
        }
    }
    ?>
 <!--FORMA ZA AŽURIRANJE KIJENATA-->   
<form action="" method="post" enctype= "multipart/form-data">
  <div class="form-group">
    <label for="naslov">Naslov:</label><br>
    <input type="text" name="naslov" class="clnaslov" value="<?php echo $db_client_naslov; ?>">
  </div>
  <div class="form-group">
    <img width=100 src="../images/Clients/<?php echo $db_client_slika; ?>" alt='error'><br>
    <input type="file" name="c_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
    <input type="submit" name="azclient" class="azurirajbtn" value="Ažuriraj"><br>
    <a class="azlink" href="sadrzaj.php">Vrati se</a>
  </div>
</form>
<?php } ?>


<!--Ažuriranje Kancelarija-->  
    <?php 
    if(isset($_GET['azuriraj']) && $_GET['azuriraj']==3){
       
        $off_id = $_GET['off_id'];
        $query = "SELECT * FROM offices WHERE off_id=$off_id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
            $db_off_id= $row['off_id'];
            $db_off_naslov = $row['off_naslov'];
            $db_off_cnb = $row['off_cnb'];
            $db_off_ub = $row['off_ub'];
            $db_off_oblast = $row['off_oblast']; 
          
    if(isset($_POST['azoff'])){
        $off_naslov = $_POST['off_naslov'];
        $off_oblast = $_POST['oblast'];
        $off_cnb_slika = $_FILES['off_cnb_slika']['name'];
        $off_cnb_slika_temp = $_FILES['off_cnb_slika']['tmp_name'];
        $off_ub_slika = $_FILES['off_ub_slika']['name'];
        $off_ub_slika_temp = $_FILES['off_ub_slika']['tmp_name'];
        move_uploaded_file($off_cnb_slika_temp,"../images/Offices/cnb/$off_cnb_slika");
        move_uploaded_file($off_ub_slika_temp,"../images/Offices/uboji/$off_ub_slika");
        if(empty($off_cnb_slika)){
            $query = "SELECT * FROM offices WHERE off_id = $off_id ";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image)){
                    $off_cnb_slika = $row['off_cnb'];
            }
        }
        if(empty($off_ub_slika)){
            $query = "SELECT * FROM offices WHERE off_id = $off_id ";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_image)){
                    $off_ub_slika = $row['off_ub'];
            }
        }
        $query ="UPDATE offices SET off_naslov = '{$off_naslov}', off_oblast ='{$off_oblast}', off_cnb ='{$off_cnb_slika}', off_ub ='{$off_ub_slika}' WHERE off_id=$off_id";
        $result = mysqli_query($connection,$query);
        if($result){
            header("Location: azuriraj.php?azuriraj=3&off_id='{$off_id}'");
        }
        else{
            die("Error" . mysqli_error($connection));
        }
    }
    ?>
<!--Forma za ažuriranje kancelarija-->
<form action="" method="post" enctype= "multipart/form-data">
  <div class="form-group">
    <label for="naslov">Naslov:</label><br>
    <input type="text" name="off_naslov" class="clnaslov" value="<?php echo $db_off_naslov; ?>">
  </div>
  <div class="form-group">
      <label for="off_cnb_slika">Izaberite crno-bijelu sliku:</label><br>
    <img width=100 src="../images/Offices/cnb/<?php echo $db_off_cnb; ?>" alt='error'><br>
    <input type="file" name="off_cnb_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
      <label for="off_ub_slika">Izaberite sliku u boji:</label><br>
    <img width=100 src="../images/Offices/uboji/<?php echo $db_off_ub; ?>" alt='error'><br>
    <input type="file" name="off_ub_slika" class="azimg"><br><br>
  </div>
  <div class="form-group">
    <label for="oblast">Oblast:</label><br>
    <select name="oblast" value="<?php echo $db_off_oblast; ?>">
       <option name="EMEA">EMEA</option>
       <option name="AMERICAS">AMERICAS</option>
       <option name="ASIA">ASIA</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" name="azoff" class="azurirajbtn" value="Ažuriraj"><br>
    <a class="azlink" href="sadrzaj.php">Vrati se</a>
  </div>
</form>
<?php } ?>






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