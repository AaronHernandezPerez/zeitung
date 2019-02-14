<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias_m extends CI_Model
{
  /**
   * Registra la noticia y devuelve su id
   *
   * @param [type] $datos
   * @return void
   */
  public function registrarNoticia($datos)
  {
    $this->db->insert('noticias', $datos);
    return $this->db->insert_id();
  }


  public function obtenerListaNoticiasEditor($idautor)
  {
    $query = $this->db->select('id,titulo,fecha')
      ->where('autor', $idautor)
      ->get('noticias');
    return $query->result();
  }

  public function getAutor($idnoticia)
  {
    $query = $this->db->select('autor')
      ->where('id', $idnoticia)
      ->get('noticias');
    return $query->row()->autor;
  }

  public function obtenerNoticia($idnoticia)
  {
    $query = $this->db->select('id,categoria,titulo,cabecera,cuerpo')
      ->where('id', $idnoticia)
      ->get('noticias');
    return $query->row();
  }

  public function obtenerNombreAutor($idNoticia)
  {
    $query = $this->db->select('username')
      ->from('editores')
      ->join('noticias', 'editores.id = noticias.autor')
      ->where('noticias.id', $idNoticia)
      ->get();
    return $query->row()->username;
  }

  public function actualizarNoticia($datos)
  {
    $this->db->where('id', $datos['id'])
      ->update('noticias', $datos);
  }


  public function eliminarNoticia($idNoticia)
  {
    $this->db->delete('noticias', ['id' => $idNoticia]);
  }
}

?>