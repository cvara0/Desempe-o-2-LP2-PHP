<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: login_usuario.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
  <!-- Head-->
  <?php require_once "componentes/head.inc.php"?>
  
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once 'componentes/header.inc.php'; ?>
    <!-- Sidebar menu-->
    <?php require_once "componentes/sidebar_menu.inc.php"?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
          <!-- si es administrador vera este titulo-->
          <p>Listado total de solicitudes</p>
          
          <!-- si es usuario normal vera este titulo-
          <p>Listado de mis solicitudes cargadas</p> -->

          <!-- si es analista o tecnico vera este titulo
          <p>Listado de solicitudes cargadas</p> -->


        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Solicitudes (Nro Total)</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Registro</th>
                    <th>Fecha estimada</th>
                    <th>Solicitante</th>
                    <th>Opciones</th>

                  </tr>
                </thead>
                <tbody>
                  <tr class="table-danger">
                    <td>1</td>
                    <td>El monitor enciende, pero con brillo muy bajo</td>
                    <td>Al encender el equipo, el monitor enciende pero con muy poco brillo (las primeras 20 palabras)...</td>
                    <td>Soporte tecnico</td>
                    <td>01/11/2023 10:23:56</td>
                    <td>02/11/2023 10:23:56</td>
                    <td>Carmen Ramirez</td>
                    <td>
                      <a href="#">Ver detalles...</a>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>

                  <tr class="table-info">
                    <td>2</td>
                    <td>Modificar lista de precios</td>
                    <td>Generar cálculo automático de precio segun variación del dólar.</td>
                    <td>Desarrollo nueva funcionalidad </td>
                    <td>01/11/2023 12:55:56</td>
                    <td>03/11/2023 12:55:56</td>
                    <td>Gisela Marquez</td>
                    <td>
                      <a href="#">Ver detalles...</a>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>
                 
                  <tr class="table-danger">
                      <td>3</td>
                      <td>Sin acceso a la VPN</td>
                      <td>Solicito me habiliten el ingreso a la red de la empresa</td>
                      <td>Soporte tecnico</td>
                      <td>01/11/2023 13:55:21</td>
                      <td>02/11/2023 13:55:21</td>
                      <td>Martin Cardozo</td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr>

                  <tr class="table-warning">
                      <td>4</td>
                      <td>No muestra mensaje al fallar la clave de acceso</td>
                      <td>En acceso al sistema debe mostrar mensaje si hay fallo en la clave.</td>
                      <td>Reporte de error</td>
                      <td>02/11/2023 08:25:42</td>
                      <td>05/11/2023 08:25:42</td>
                      <td>Paola Torres</td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr>
                  
                  <tr class="table-warning">
                      <td>5</td>
                      <td>En el login, se ve mensaje</td>
                      <td>Al ingresar al equipo de trabajo con mi login y clave, veo error de conexion con la base de datos.</td>
                      <td>Reporte de Error</td>
                      <td>02/11/2023 14:30:15</td>
                      <td>09/11/2023 14:30:15</td>
                      <td>Mario Gimenez</td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    
  </body>
</html>