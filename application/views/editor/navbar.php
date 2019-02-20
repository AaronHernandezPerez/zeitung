<style>
#navbar .nav-link {
  display: flex;
  height: 100%;
  align-items: center;
  text-align: center;
}

canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
</style>
<?php 
// LLamada para carga la imagen de perfil
$img = $this->editores_m->obtenerImagen($_SESSION['id']);
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand text-white">Edicción</a>
    <button class="navbar-toggler" data-target="#navbar" data-toggle="collapse" aria-controls="navbar"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>editor">Estadísticas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>editor/publicarNoticia">Publicar noticia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>editor/moderarNoticias">Moderar noticias</a>
        </li>
        <?php if ($_SESSION['admin']) : ?>
        <!-- Menu solo para los administradores -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Opciones Admin
          </a>
          <div class="dropdown-menu bg-dark px-1 px-sm-0" aria-labelledby="navbarDropdown">
            <a class="nav-link" href="<?php echo base_url() ?>editor/categoria">Admin categorias</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="<?php echo base_url() ?>editor/adminNoticias">Admin Noticias</a>
          </div>
        </li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img class="img-fluid mr-2 rounded-circle" src="<?= base_url('assets/img/') . $img ?>" width="28px">
            <?= $_SESSION['username'] ?>
          </a>
          <div class="dropdown-menu bg-dark px-1 px-sm-0" aria-labelledby="navbarDropdown">
            <a class="nav-link" href="<?php echo base_url() ?>editor/modificarPerfil">Modificar perfil</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="<?php echo base_url() ?>editor/cerrarSesion">Cerrar Sesión</a>
          </div>
        </li>

        <li class="nav-item">
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="<?= base_url('assets/libraries/chartjs/moment-with-locales.js') ?>"></script>
<script src="<?= base_url('assets/libraries/chartjs/Chart.bundle.js') ?>"></script>