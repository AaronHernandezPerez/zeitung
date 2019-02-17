<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Comentarios_m extends CI_Model
{
  public function registrarComentario($datos)
  {
    // Añadimos la fecha actual al registrarlo
    if (!isset($datos['fecha'])) {
      $datos['fecha'] = date('Y-m-d H:i:s');
    }
    $this->db->insert('comentarios', $datos);
  }

  public function obtenerComentariosNoticia($idNoticia)
  {
    return $this->db->where('noticia', $idNoticia)
      ->get('comentarios')->result();
  }

}

?>