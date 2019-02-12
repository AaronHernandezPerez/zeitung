<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Editores_m extends CI_Model
{
  public function registrarEditor($datos)
  {
    $this->db->insert('editores', $datos);
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