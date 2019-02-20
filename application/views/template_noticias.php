<?php 
$this->load->view('templates/htmlInicio.php');
// Carga el nabar 
$this->load->view('noticias/complementos/navbar.php');
?>
<style>
/* Estilo para que el footer este al final */
html,
body {
  height: calc(100% - 4em);
  margin-top: 1.5em;
  background-color: #F5F5F5;
}

#contenedor {
  min-height: calc(100%);
}

.ql-video {
  width: 100%;
}


img[src^="data:"] {
  width: 100%;
}

@media (min-width: 768px) {
  .abs-center-x {
    position: absolute;
    /* top: 5px; */
    left: 50%;
    transform: translateX(-50%);
  }
}

.navbar-brand {
  font-family: 'Great Vibes', cursive;
  font-size: 2em;
  padding: 0 !important;
}

.navbar-nav,
a.nav-link {
  height: 100% !important;
}

.enlacesF,
.nav-link {
  display: flex;
  align-items: center;
  padding: 0 1em !important;
  transition: all .5s;
  height: 100% !important;
}

.nav-link:hover {
  color: white !important;
  background: black;
}

.enlacesF {
  color: #E0E0E0;
}

.enlacesF:hover {
  color: white;
}
</style>
<!-- Inicio del contenido -->
<div id="contenedor" class="container mt-5">
  <?php $this->load->view($contenido); ?>
</div>
<!-- fin del container y contenido -->

<?php
$this->load->view('noticias/complementos/footer.php');
$this->load->view('templates/htmlFin.php');
?>