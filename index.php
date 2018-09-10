<?php
       ob_start(); 
       include "includes/db.php";
       include "includes/forme.php";

//provjera da li je kliknuto na dugme zakaži
  if(isset($_POST['zakazi'])){
    $ime_klijenta = $_POST['ime'];
    $firma = $_POST['firma'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $datum = $_POST['datum'];
    $vrijeme = $_POST['vrijeme'];
//Slanje maila 
    $to = "aleksandar.plamenac@amplitudo.me";
    $subject ="Zakazan sastanak";
    $poruka ="Ime klijenta: ".$ime_klijenta."\n Firma: ".$firma."\n Email: ".$email."\n Broj telefona: ".$telefon."\n Datum i vrijeme zakazivanja: ".$datum." ".$vrijeme;
    mail($to, $subject, $poruka, "From:". $email);
//Provjera da li su ispunjena polja
  if($ime_klijenta== "" || $firma== "" || $email== "" || $telefon== "" ||
    $datum== "" || $vrijeme == "" ){
     header("Location: index.php");
  }
//Upit za bazu
  $query = "INSERT INTO sastanci(ime_klijenta,firma,email,telefon,datum,vrijeme,status_sastanka) VALUES ('{$ime_klijenta}','{$firma}','{$email}','{$telefon}','{$datum}','{$vrijeme}','Zakazan')";
    $rezultat =mysqli_query($connection, $query);
    if(!$rezultat){
      die('Error' . mysqli_error($connection));
    }
  } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOLINPG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BOOTSTRAP 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js" defer></script>
  
</head>
<body>

<!--Navigation-->
<?php include "includes/header.php"; ?>

<!--Kontejner ispod navbara-->
<div id="zakaziSas" class="container-fluid ">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-5">
        <h1>AMPLITUDO <br> AFFILIATE OF GOLIN</h1>
        <p><?php 
          $query = "SELECT * FROM tekstovi WHERE text_id=1";
          $result = mysqli_query($connection,$query);
          $row = mysqli_fetch_assoc($result);
          $sadrzaj = $row['text_sadrzaj'];
          echo $sadrzaj;
        ?></p>
        <button id="zakazibtn" type="button" class="btn">ZAKAŽI SASTANAK</button>
       <?php zakaziForma(); ?>
    </div>
    </div>
</div>

<!--Kontejner sa PR i EVENT-->
  <div id="pr" class="container-fluid">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-4">
        <h1>PR AND COMMUNICATION</h1>
        <p><?php 
      
      $query = "SELECT * FROM tekstovi WHERE text_id=2";
      $result = mysqli_query($connection,$query);
      $row = mysqli_fetch_assoc($result);
      $sadrzaj = $row['text_sadrzaj'];
      $slika = $row['text_slika'];
      echo $sadrzaj;
        
        ?></p>
      </div>
      <div class="col-3">
        <img id="slikad" src="images/<?php echo $slika; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-2"></div>
      <?php 
      
      $query = "SELECT * FROM tekstovi WHERE text_id=3";
      $result = mysqli_query($connection,$query);
      $row = mysqli_fetch_assoc($result);
      $sadrzaj = $row['text_sadrzaj'];
      $slika = $row['text_slika'];
      
      ?>
      <div id="slika" class="col-5">
        <img id="slikal" src="images/<?php echo $slika; ?>">
      </div>
      <div class="col-3">
        <h1 id="EventHeader">EVENT MANAGEMENT</h1>
        <p>
        <?php 
          echo $sadrzaj;
        ?>
          </p>
      </div>
    </div>
  </div>

<!--CLIENTS dio stranice-->
  <div id="clients" class="container-fluid">
    <div class="row">
      <div class="col">
        <h1 style="color:rgb(254,198,39);text-align: center;font-size:4vw;">CLIENTS</h1>
      </div>
    </div>  
    <div class="row">
      <div class="col">
        <table>
          <tbody>
<?php
  $query = "SELECT * FROM clients";
  $result = mysqli_query($connection, $query);
  $broj_strana = mysqli_num_rows($result);
  $broj_strana = ceil($broj_strana/6);
  $brojac = 0;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = "";
  }
  if($page == "" || $page == 1){
    $page_1=0;
  }
  else{
    $page_1 = ($page * 6)-6;
  }
  $query = "SELECT * FROM clients LIMIT $page_1,6";
  $result= mysqli_query($connection,$query);
?>
          <tr>
<?php
  while($row = mysqli_fetch_assoc($result)){
    $db_client_slika = $row['client_slika'];
    $db_client_naslov = $row['client_naslov'];  
    if($brojac<3 || $brojac>3){              
    echo  "<td class='klijent'><img  src='images/Clients/{$db_client_slika}' ><div class='client-text'><p>{$db_client_naslov}</p></div></td>";
    $brojac++;
  }
    else{
      echo "</tr><tr>";
      echo "<td class='klijent'><img  src='images/Clients/{$db_client_slika}' ><div class='client-text'><p>{$db_client_naslov}</p></div></td>";
      $brojac++;
    }
  }
?>
            </tr>
          </tbody>
        </table>
        <ul id="clientPagination">
<?php 
  for($i=1;$i<=$broj_strana;$i++){ ?>
    <li><a href="index.php?page=<?php echo $i; ?>">5</a></li>
    <?php
  }
?>
        </ul>
      </div>
    </div>
  </div>

<!--Go All IN-->
  <div id="GoAllIn" class="countainer-fluid">
      <div id="gai" class="row">
          <div class="col">
        <img class="goallin" src="images/go-all-in.gif">
      </div>
      </div>
      <div class="row">
        <div class="col">
            <br><br><br>
          <h3>WE ARE THE RELEVANSE AGENCY.</h3>
          <h6 style="font-size:1.3vw;font-weight:bold;">We're relevance obsessed. More importantly, we're relevance equipped.</h6><br>
          <p>We are integrated agency with PR, Digital and Content at our core.
             Oure ambition is to create change throught brave, relevant work worthy of
             awe, action and awards.<br> By embracing new technologies and pushing creative boundaries,
             we help our clients adapt and win in a constantly evolving world.<br><br>
             We are committed to delivering the deepest insights, boldest ideas and broadest
             engagement to the world's leading brands throught seamless integrated <br>
             communications.<br> We're the nice quys who kick ass.
          </p>
        </div>
      </div>
      <div id="red" class="row">
      <?php 
      
      $query = "SELECT * FROM tekstovi WHERE text_id=4";
      $result = mysqli_query($connection,$query);
      $row = mysqli_fetch_assoc($result);
      $sadrzaj = $row['text_sadrzaj'];
      $slika = $row['text_slika'];
      $naslov = $row['text_naslov'];
      ?>
        <div class="col">
          <img src="images/<?php echo $slika; ?>"><br><br>
          <h3><?php echo $naslov; ?></h3>
          <p><?php echo $sadrzaj; ?></p>
        </div>

        <?php 
        $query = "SELECT * FROM tekstovi WHERE text_id=5";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $sadrzaj = $row['text_sadrzaj'];
        $slika = $row['text_slika'];
        $naslov = $row['text_naslov'];
        ?>
        <div class="col">
            <img src="images/<?php echo $slika; ?>"><br><br>
          <h3><?php echo $naslov ?></h3>
          <p>
          <?php echo $sadrzaj;?>
          </p>
        </div>


        <?php
        $query = "SELECT * FROM tekstovi WHERE text_id=6";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $sadrzaj = $row['text_sadrzaj'];
        $slika = $row['text_slika'];
        $naslov = $row['text_naslov'];
        ?>
        <div class="col">
            <img src="images/<?php echo $slika; ?>"><br><br>
          <h3><?php echo $naslov; ?></h3>
          <p>
          <?php echo $sadrzaj;?>
          </p>
        </div>

         <?php
        $query = "SELECT * FROM tekstovi WHERE text_id=7";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $sadrzaj = $row['text_sadrzaj'];
        $slika = $row['text_slika'];
        $naslov = $row['text_naslov'];
        ?>
        <div class="col">
            <img src="images/<?php echo $slika; ?>"><br><br>
          <h3><?php echo $naslov; ?></h3>
          <p>
          <?php echo $sadrzaj; ?>
          </p>
        </div>
      </div>
  </div>

<!--OFFICES-->
<div id="offices" class="container-fluid">
    <div class="row">
    <div class="col">
      <h1 style="text-align:center; text-decoration: underline;text-decoration-color: rgb(254, 198, 39);">OFFICES</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
<ul class="nav  justify-content-center">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">EMEA</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">AMERICAS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu3">ASIA</a>
  </li>
</ul>
    </div>
  </div>
  <div class="row">
    <div class="col tab-content">
<div class="tab-pane container active" id="menu1">
<table >
        <tbody>
          <tr>
<?php
  $query = "SELECT * FROM offices";
  $result = mysqli_query($connection,$query);
  $brojac=0;
  
  while($row = mysqli_fetch_assoc($result)){
    $db_naslov = $row['off_naslov'];
    $db_oblast = $row['off_oblast'];
    $db_cnb = $row['off_cnb'];

    if($db_oblast == "EMEA"){
    if($brojac<4){
      echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
      $brojac++;
    }
      else{
        echo "</tr><tr>";
        echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
        $brojac=1;
      }
  }
  }     
?>
 </tr>
        </tbody>
      </table>
    </div>


    <div class="tab-pane container" id="menu2">
    <table >
        <tbody>
        <tr>
        <?php

  $query = "SELECT * FROM offices";
  $result = mysqli_query($connection,$query);
  $brojac=0;

  if(mysqli_fetch_assoc($result) != NULL){
  while($row = mysqli_fetch_assoc($result)){
    $db_naslov = $row['off_naslov'];
    $db_oblast = $row['off_oblast'];
    $db_cnb = $row['off_cnb'];

    if($db_oblast == "AMERICAS"){
    if($brojac<4){
      echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
      $brojac++;
    }
      else{
        echo "</tr><tr>";
        echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
        $brojac=1;
      }
  }
  }     
}
else{
  echo "<td><h1 style='text-align:center;'>NO OFFICES</h1></td>";
}
?>
          </tr>
          </tbody>
      </table>
    </div>



    <div class="tab-pane container" id="menu3">
    <table >
        <tbody>
          <tr>
          <?php

  $query = "SELECT * FROM offices";
  $result = mysqli_query($connection,$query);
  $brojac=0;

  if(mysqli_fetch_assoc($result) != NULL){
  while($row = mysqli_fetch_assoc($result)){
    $db_naslov = $row['off_naslov'];
    $db_oblast = $row['off_oblast'];
    $db_cnb = $row['off_cnb'];

    if($db_oblast == "ASIA"){
    if($brojac<4){
      echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
      $brojac++;
    }
      else{
        echo "</tr><tr>";
        echo "<td><img class='off' src='images/Offices/cnb/{$db_cnb}'><div class='text-img'><h4>{$db_naslov}</h4></div></td>";
        $brojac=1;
      }
  }
  }     
}
else{
  echo "<td><h1 style='text-align:center;'>NO OFFICES</h1></td>";
}
?>
          </tr>
        </tbody>
      </table>
    </div>
    <!--/#menu3-->


    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
<!--/#offices-->

  <!--Mapa i kontakt na dnu-->
<div id="kontakt" class="container-fluid">
    <div class="row">
    <div class="col">
    <div id="mapa" >
        <figure>
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                <div style='border:1px solid rgb(254,198,39);overflow:hidden;height:220px;width:25vw;padding-left: 0px;'>
                <div id='gmap_canvas' style='height:220px;width:25vw; padding-left: 0px;'></div></div>
        </figure> 
    </div>   
    </div>
      <div class="col">
        <h4>CONTACT</h4>
        <p>Bulevar Petra Cetinjskog 56<br>
            81000 Podgorica, Montenegro<br><br>
            +382 223 240<br><br>
            info@amplitudo.me
        </p>
      </div>
    </div>
</div>
<script>
function initMap() {
    // The location of Uluru
    var uluru = {lat: -25.344, lng: 131.036};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
  }

</script>
<!--Footer-->
<?php include "includes/footer.php";