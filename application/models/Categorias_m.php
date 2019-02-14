<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias_m extends CI_Model
{
  public function registrarCategoria($categoria)
  {
    $this->db->insert('categorias', $categoria);
  }

  public function existeCategoria($categoria)
  {
    $query = $this->db->select('nombre')
      ->where('nombre', $categoria)
      ->get('categorias');
    return $query->row();
  }

  public function obtenerCategorias()
  {
    $query = $this->db->get('categorias');
    return $query->result();
  }

  public function actualizarCategoria($datos)
  {
    $this->db->set('nombre', $datos['nombre'])
      ->where('nombre', $datos['nombreAnterior'])
      ->update('categorias');
  }
}

?>