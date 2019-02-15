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
    return $query->row();
  }

  public function obtenerUsername($idAutor)
  {
    return $this->db->select('username')
      ->where('id', $idAutor)
      ->get('editores')->row()->username;
  }
}

?>