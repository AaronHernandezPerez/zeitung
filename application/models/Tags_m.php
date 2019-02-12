<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Tags_m extends CI_Model
{
  public function registrarTag($datos)
  {
    $this->db->insert('tags', $datos);
  }



}

?>