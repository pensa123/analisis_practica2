<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Repair</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../../Plantilla/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="../../Plantilla/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="../../Plantilla/css/grid.css" type="text/css" media="screen">
<script src="../../Plantilla/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../../Plantilla/js/cufon-yui.js" type="text/javascript"></script>
<script src="../../Plantilla/js/cufon-replace.js" type="text/javascript"></script>
<script src="../../Plantilla/js/Vegur_500.font.js" type="text/javascript"></script>
<script src="../../Plantilla/js/FF-cash.js" type="text/javascript"></script>
<script src="../../Plantilla/js/tms-0.3.js" type="text/javascript"></script>
<script src="../../Plantilla/js/tms_presets.js" type="text/javascript"></script>
<script src="../../Plantilla/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="../../Plantilla/js/jquery.equalheights.js" type="text/javascript"></script>
<!-- BOOTSTRAP STYLES-->
    <link href="../../Plantilla/assets/css/bootstrap.css" rel="stylesheet" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page1">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
          <h1><a href="index.php">Car Repair</a></h1>
          <div class="fright">
            <div class="indent"> <span class="address">Administrador</span> <span class="phone"><?php session_start();echo $_SESSION['USER']; ?></span> </div>
          </div>
        </div>
        <nav>
          <ul class="menu">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="Mecanico-Read.php">Mecánicos</a></li>
            <li><a href="./ListaServicio.php">Maintenance </a></li>
            <li><a href="crudvehiculo.php">Vehiculos</a></li>
            <li><a href="vehiculos.php">Estado de vehiculos</a></li>
            <li><a href="fac.php">Fac</a></li>
            <li><a href="../index.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
