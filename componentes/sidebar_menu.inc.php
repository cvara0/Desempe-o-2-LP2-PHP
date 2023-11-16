<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo($_SESSION['foto'])?>" alt="<?php echo($_SESSION['nombre'])?>">
          <div>
            <p class="app-sidebar__user-name"><?php echo($_SESSION['nombre'])?></p>
            <p class="app-sideba__user-designation"><?php
              require_once "servicios/bd/roles/select_rol_por_id.php";
              echo(selectNombreRol($_SESSION['id_rol']));
              ?></p>
          </div>
    </div>
    
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
    
            <li><a class="app-menu__item" href="formulario_solicitud.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registro</span></a></li>
    
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <?php ?><li><a class="treeview-item" href="lista_solicitudes.php"><i class="icon fa fa-circle-o"></i> Solicitudes</a></li>
                <li><a class="treeview-item" href="lista_usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
              </ul>
            </li>
          </ul>
      </aside>