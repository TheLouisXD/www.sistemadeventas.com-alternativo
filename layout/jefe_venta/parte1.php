<!-- Este archivo incluye la base la interfaz del sistema de ventas, el hacerlo de forma separada nos permite reutilizar codigo y asi ahorrar lineas de codigo -->


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de ventas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  
  <!-- Sweet Alert 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Incorporamos libreria dataTables -->
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">


<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- Ponemos el nombre del bazar -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $URL?>/vistas/Jefe_de_ventas" class="nav-link">los monitos de la nona</a>
      </li>

      <!-- Creamos un boton que llama al archivo que cierra la sesion -->
      <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="btn btn-danger">Cerrar sesion</a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Boton para poner la pagina en pantalla completa :0 -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo del sistema, tambien redirige a la pantalla principal -->
    <a href="<?php echo $URL?>/vistas/Jefe_de_ventas" class="brand-link">
      <img src="<?php echo $URL?>/imagenes/Logo.png" alt="Bazar Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Las nonitas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $URL;?>/public/templates/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <!-- Usamos el session_nombre para poner el nombre del usuario en el navbar -->
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_sesion;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
                <!-- Creamos una variable btn_usuarios vacia para que el boton no resalte -->
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/" class="nav-link <?php if($btn_lateral == 5) echo "active"?>">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>
               <li class="nav-item ">
                <!-- Creamos una variable btn_usuarios vacia para que el boton no resalte -->
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/usuarios" class="nav-link <?php if($btn_lateral == 1) echo "active"?>">
                  <i class="fa fa-user-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <!-- Creamos un nav-item por cada boton para que se vea bien y bonito :3 -->
              <li class="nav-item">
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/inventario" class="nav-link <?php if($btn_lateral == 2) echo "active"?>">
                  <i class="fa fa-box nav-icon"></i>
                  <p>inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/administracion" class="nav-link <?php if($btn_lateral == 3) echo "active"?>">
                  <i class="fa fa-key"></i>
                  <p>Administrar sistema</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/informes" class="nav-link <?php if($btn_lateral == 4) echo "active"?>">
                  <i class="far fa-file nav-icon"></i>
                  <p>Informe de ventas</p>
                </a>
              </li>
          <!-- le sacamos el menu-open para que no este siempre abierto -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link active">

              <!-- Modificamos el boton 
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              Quitamos el active para que no se resalte el boton 
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL;?>/vistas/Jefe_de_ventas/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear usuarios</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- Añadimos el boton de cerrar sesion en la barra lateral -->
          <!-- <li class="nav-item">
            <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link" style="background-color: #ff4040">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
                Cerrar sesion
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>