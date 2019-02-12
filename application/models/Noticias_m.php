<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias_m extends CI_Model
{
  public function registrarNoticia($datos)
  {
    $this->db->insert('noticias', $datos);
  }



}

?>