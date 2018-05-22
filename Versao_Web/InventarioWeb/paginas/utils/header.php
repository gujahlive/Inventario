<?php
  require_once "../../conexao/Conexao.class.php";
  require_once "../../classes/Usuario.class.php";

  $Usuario = Usuario::getInstance(Conexao::getInstance());
  if(!$Usuario->verificaSessao()){
    header("Location: ../../index.php");
  }

 ?>
<!--<![endif]-->
<!-- start: HEAD -->
<head>
  <title>HPS - Serviços</title>
  <!-- start: META -->
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <!-- end: META -->

  <!-- start: MAIN CSS -->
  <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../vendor/themify-icons/themify-icons.min.css">
  <link href="../../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
  <link href="../../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
  <link href="../../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
  <link href="../../vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">


  <!-- end: MAIN CSS -->
  <!-- start: CLIP-TWO CSS -->
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/plugins.css">
  <link rel="stylesheet" href="../../assets/css/themes/theme-4.css">
  <link href="../../assets/images/semfundo.png" rel="icon" type="image/x-icon" />

  <!-- end: CLIP-TWO CSS -->
  <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
  <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<?php
  if($_SESSION['tipo_usuario'] == 'administrador'){
    require_once "../utils/sidebar.php";
    require_once "../utils/navbar.php";
  } else {
    header("location: ../../paginas/home/home.php");
  }
?>
<!-- start: MAIN JAVASCRIPTS -->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../../vendor/modernizr/modernizr.js"></script>
<script src="../../vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- end: MAIN JAVASCRIPTS -->

<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="../../assets/js/main.js"></script>
<script src="../../vendor/select2/select2.min.js"></script>
<script src="../../vendor/maskedinput/jquery.maskedinput.min.js"></script>

<!-- start: JavaScript Event Handlers for this page -->
<script src="../../vendor/DataTables/jquery.dataTables.min.js"></script>
<script src="../../assets/js/table-data.js"></script>

<script>
  jQuery(document).ready(function() {
    Main.init();
  });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
