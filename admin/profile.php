<?php include "includes/admin_header.php"; 
      include "includes/admin_navigation.php";
      include "includes/admin_footer.php";
?>
<?php
    $id = $_SESSION['user_id'];
    $query= "SELECT * FROM users WHERE user_id = {$id}";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      $db_username = $row['username'];
      $db_password = $row['user_password'];
      $db_user_firstname = $row['user_firstname'];
      $db_user_lastname = $row['user_lastname'];
    }
 if(isset($_POST['azuriraj'])){
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $user_password = $_POST['password'];

    $query ="UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', username = '{$username}',
    user_password = '{$user_password}' WHERE user_id = {$id}";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('QUERY ERROR' . mysqli_error($connection));
    }
    header("Location: profile.php");
 }
 
 
 ?>
 <div id="content-wrapper">
    <form action="#" method="post">
    <div class="form-group">
    <label for="firstname"><b>Firstname</b></label>
    <input type="text" name="firstname" class="form-control"  aria-describedby="emailHelp" value="<?php echo $db_user_firstname; ?>">
    </div>
    <div class="form-group">
    <label for="lastname"><b>Lastname</b></label>
    <input type="text" name="lastname" class="form-control"  value="<?php echo $db_user_lastname; ?>">
    </div>
    <div class="form-group">
    <label for="username"><b>Username</b></label>
    <input type="text" name="username" class="form-control"  value="<?php echo $db_username; ?>">
    </div>
    <div class="form-group">
    <label for="password"><b>Password</b></label>
    <input type="text" name="password" class="form-control"  value="<?php echo $db_password; ?>">
    </div>
  <button type="submit" name="azuriraj" class="btn btn-secondary">Ažuriraj informacije</button>
    </form>
</div>







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
<?php stickyFooter(); ?>
<?php footer(); ?>