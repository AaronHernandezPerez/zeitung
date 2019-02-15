<style>
@media (min-width: 768px) {
  .abs-center-x {
    position: absolute;
    top: 5px;
    left: 50%;
    transform: translateX(-50%);
  }
}
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>noticias">Zeitung</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav abs-center-x">
        <?php foreach ($categorias as $key => $value) : ?>
        <li class="nav-item ">
          <a class="nav-link" href="<?= base_url() ?>noticias/index/<?= $value ?>"><?= $value ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
      <ul class="ml-auto navbar-nav">
        <li class="nav-item ">
          <a class="btn btn-outline-primary" href="<?= base_url() ?>login">IniciarSesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>