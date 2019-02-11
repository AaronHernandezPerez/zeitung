<?php 
$this->load->view('templates/htmlInicio.php');
// Carga el nabar 
$this->load->view('editor/navbar.php');
$this->load->view($contenido);
$this->load->view('templates/htmlFin.php');
?>