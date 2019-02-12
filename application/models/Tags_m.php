<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Tags_m extends CI_Model
{
  public function registrarTag($datos)
  {
    $this->db->insert('tags', $datos);
  }

  public function comprobarTag($tag)
  {
    $query = $this->db->where('nombre', $tag)
      ->get('tags');
    return $query->row();
  }

  public function registrarTag_noticia($datos)
  {
    $this->db->insert('tags_noticias', $datos);
  }

  public function obtenerTags_noticia($idnoticia)
  {
    $query = $this->db->select('tag')
      ->where('noticia', $idnoticia)
      ->get('tags_noticias');
    return $query->result_array();
  }
}

?>