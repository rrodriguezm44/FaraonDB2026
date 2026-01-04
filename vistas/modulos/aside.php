<?php

//$menuUsuario = UsuarioControlador::ctrObtenerMenuUsuario($_SESSION["usuario"]->id_usuario);
$menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($_SESSION["usuario"]->id_usuario);

//var_dump($menuUsuario);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">FaraonBd</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <h6 class="text-warning">
          <?php echo $_SESSION["usuario"]->nombre_usuario . ' ' . $_SESSION["usuario"]->apellido_usuario ?></h6>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        <?php foreach ($menuUsuario as $menu) : ?>
        <?php
          $isOpen = $menu->abrir_arbol == 1 ? 'menu-is-opening menu-open' : '';
          $isActive = $menu->vista_inicio == 1 ? 'active' : '';
        ?>
        <li class="nav-item <?php echo $isOpen; ?>">
          <a style="cursor: pointer;" class="nav-link <?php echo $isActive; ?>"
            <?php if (!empty($menu->vista)) : ?>
              onclick="CargarContenido('.content-wrapper','vistas/<?php echo $menu->vista; ?>')"
            <?php endif; ?>
          >
            <i class="nav-icon <?php echo $menu->icon_menu; ?>"></i>
            <p>
              <?php echo $menu->modulo; ?>
              <?php if (empty($menu->vista)) : ?>
                <i class="right fas fa-angle-left"></i>
              <?php endif; ?>
            </p>
          </a>
          <?php if (empty($menu->vista)) : ?>
            <?php 
              $subMenuUsuario = UsuarioModelo::mdlObtenerSubMenuUsuario($menu->id, $_SESSION["usuario"]->id_usuario);
            ?>
            <ul class="nav nav-treeview">
              <?php foreach ($subMenuUsuario as $subMenu) : ?>
                <?php $subActive = $subMenu->vista_inicio == 1 ? 'active' : ''; ?>
                <li class="nav-item">
                  <a style="cursor: pointer;" class="nav-link <?php echo $subActive; ?>"
                    onclick="CargarContenido('.content-wrapper','vistas/<?php echo $subMenu->vista; ?>')">
                    <i class="<?php echo $subMenu->icon_menu; ?> nav-icon"></i>
                    <p><?php echo $subMenu->modulo; ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
        <li class="nav-item">
          <a href="http://localhost/faraonbd?cerrar_sesion=1" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar Sesion</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>