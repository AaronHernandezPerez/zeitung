<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase para manejar la tabla comentarios de la BBDD
 */
class Comentarios_m extends CI_Model
{
  /**
   * Inserta en la BBDD el comentario
   *
   * @param array $datos
   * @return void
   */
  public function registrarComentario($datos)
  {
    // Añadimos la fecha actual al registrarlo
    if (!isset($datos['fecha'])) {
      $datos['fecha'] = date('Y-m-d H:i:s');
    }
    $this->db->insert('comentarios', $datos);
  }

  /**
   * Obtiene los datos de un comentario dada una noticia
   *
   * @param string $idNoticia
   * @return object
   */
  public function obtenerComentariosNoticia($idNoticia)
  {
    return $this->db->where('noticia', $idNoticia)
      ->get('comentarios')->result();
  }

  /**
   * Elimina el comentario de la BBDD
   *
   * @param array $datos array asociativo de la forma 'id'=>1
   * @return void
   */
  public function eliminarComentario($datos)
  {
    $this->db->delete('comentarios', $datos);
  }
}
 