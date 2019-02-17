<?php 
$this->load->view('templates/htmlInicio.php');
// Carga el nabar 
$this->load->view('noticias/complementos/navbar.php');
?>
<style>
/* Estilo para que el footer este al final */
html,
body {
  height: calc(100% - 5em);
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