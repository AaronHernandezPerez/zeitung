<?php 
$this->load->view('templates/htmlInicio.php');
?>
<style>
  html,
  body {
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
  }
</style>
<?php
$this->load->view($contenido);
$this->load->view('templates/htmlFin.php');
?>