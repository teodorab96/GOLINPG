<nav class="navbar navbar-expand static-top">

  <a class="navbar-brand mr-1" href="index.php"><?php echo $_SESSION['username']; ?></a>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div id="ddm" class="dropdown-menu " aria-labelledby="userDropdown">
        <a class="dropdown-item" href="profile.php">My Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>
  <img width=100 style="margin-left:87%;" src="../images/logo.svg">
</nav>
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">

    <li class="nav-item">
      <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-table"></i>
        <span>Svi zakazani sastanci</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Filtrirana tabela</span></a>
    </li>

<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Izmijena tekstova</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="sadrzaj.php">Sadržaj početne</a>
            <a class="dropdown-item" href="add_clients.php">Dodaj klijenta</a>
            <a class="dropdown-item" href="add_offices.php">Dodaj kancelariju</a>
          </div>
</li>
  </ul>