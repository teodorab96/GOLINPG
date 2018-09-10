<?php
function zakaziForma(){ ?>
    <div id="zakaziModal" >
    <form action="index.php" method="post" id="zakazi">
       <img id="x" src="images/x ikonica.svg"> 
        <div class="form-group">
            <img width="100vw" src="images/GolinPG.svg" alt=""/><br><br>
            <h4>Zakažite sastanak sa nekim <br> od naših poslodavaca</h4>
        </div>
          <div class="form-group">
            <input type="text" class="form-control" name="ime" aria-describedby="emailHelp" placeholder="Ime i Prezime" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="firma" placeholder="Firma" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="e-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="telefon" placeholder="Broj telefona" required>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="date" class="form-control" name="datum" placeholder="mm/dd/yy" required>
            </div>
            <div class="col">
             <input type="text" class="form-control" name="vrijeme" placeholder="10:00 h" required>
            </div>
          </div>
          <button type="submit" name="zakazi" class="btn btn-primary">ZAKAŽI SASTANAK</button>
    </form>
  </div>
  <?php
}

function loginForma(){
    ?>
  <div id="loginModal">
    <form action="includes/login.php" method="post" id="login">
       <img id="x1" src="images/x ikonica.svg"> 
        <div class="form-group">
            <img width="100vw" src="images/GolinPG.svg" alt=""/><br><br><br><br>
        </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username..." required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Lozinka.." required>
          </div>
          <button type="submit" name="adminlogin" class="btn btn-primary">Log In</button>
    </form>
</div>
    <?php
}
?>