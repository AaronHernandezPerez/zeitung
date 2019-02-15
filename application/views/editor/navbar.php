<style>
#navbar .nav-link {
  display: flex;
  height: 100%;
  align-items: center;
}
</style>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
        <a class="nav-link" href="<?php echo base_url() ?>editor/editarNoticias">Editiar noticias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>editor/">Moderar comentarios</a>
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
          <a class="nav-link" href="<?php echo base_url() ?>editor/">Admin Comentarios</a>
          <a class="nav-link" href="<?php echo base_url() ?>editor/">Admin Editores</a>
        </div>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>editor/cerrarSesion">Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>