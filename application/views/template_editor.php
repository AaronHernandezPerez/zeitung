<?php 
$this->load->view('templates/htmlInicio.php');
// Carga el nabar 
$this->load->view('editor/navbar.php'); ?>
<!-- Inicio de l contenido -->
<div class="container mt-4">
  <?php echo $this->alertas->show() ?>
  <?php $this->load->view($contenido); ?>
</div>
<!-- fin del container y contenido -->
<?php $this->load->view('templates/htmlFin.php'); ?>