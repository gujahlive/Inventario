<header class="navbar navbar-default navbar-static-top">
  <!-- start: NAVBAR HEADER -->
  <div class="navbar-header">
    <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
      <i class="ti-align-justify"></i>
    </a>
    <a href="#" class="logo menu-toggler" onclick="toggleLogo()">
      <img src="../../imagens/logo/logomarca.png" width="65px" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
    </a>
    <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app" onclick="toggleLogo()">
      <i class="ti-align-justify"></i>
    </a>
    <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="ti-view-grid"></i>
    </a>
  </div>
  <!-- end: NAVBAR HEADER -->
  <!-- start: NAVBAR COLLAPSE -->
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-right">
      <!-- start: LANGUAGE SWITCHER -->
      <li class="dropdown">
        <a href class="dropdown-toggle" data-toggle="dropdown">
          <i class="ti-world"></i> <?php echo $_SESSION['email']; ?>
        </a>
        <ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
          <li>
            <a href="../../php/autentificacao/sair.php" class="menu-toggler">
              Sair
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
  </div>
  <!-- end: NAVBAR COLLAPSE -->
</header>

<script type="text/javascript">
  var logo = true
  function toggleLogo(){
    if(logo){
      $('.logo').hide();
      logo = false
    } else {
      $('.logo').show();
      logo = true
    }
  }
</script>
