<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Editores_m extends CI_Model
{
  public function registrarEditor()
  {
    $this->db->insert('editores', $this->session->flashdata('editor'));
  }

  public function obtenerDatosLogin($username)
  {
    $query = $this->db->select('id,username,administrador,password')
      ->where('username', $username)
      ->get('editores');
    if ($result = $query->row()) {
      return $result;
    } else {
      return false;
    }
  }

}

?>