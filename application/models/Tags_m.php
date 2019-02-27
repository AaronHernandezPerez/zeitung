<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase para manejar las tablas "tag" y "tags_noticias" de la BBDD
 */
class Tags_m extends CI_Model
{
  /**
   * Guarda la tag en la BBDD
   *
   * @param string $datos
   * @return void
   */
  public function registrarTag($datos)
  {
    $this->db->insert('tags', $datos);
  }

  /**
   * Devuelve la tag si existe
   *
   * @param string $tag
   * @return array
   */
  public function comprobarTag($tag)
  {
    $query = $this->db->where('nombre', $tag)
      ->get('tags');
    return $query->row();
  }

  /**
   * Guarda la noticia con su tag en la relacion  tags_noticias
   *
   * @param array $datos
   * @return void
   */
  public function registrarTag_noticia($datos)
  {
    $this->db->insert('tags_noticias', $datos);
  }

  /**
   * Obtiene todas las tags de la relacion tags_noticias
   *
   * @param string $idNoticia
   * @return array de arrays
   */
  public function obtenerTags_noticia($idNoticia)
  {
    $query = $this->db->select('tag')
      ->where('noticia', $idNoticia)
      ->get('tags_noticias');
    return $query->result_array();
  }

  /**
   * Devuelve la noticia de la relacion tags_noticias
   *
   * @param [type] $noticia
   * @param [type] $tag
   * @return void
   */
  public function comprobarTags_noticia($noticia, $tag)
  {
    $query = $this->db->select('noticia')
      ->where(['noticia' => $noticia, 'tag' => $tag])
      ->get('tags_noticias');
    return $query->row();
  }

  /**
   * Elimina todas las tags de la noticia  de la relacion tags_noticias
   *
   * @param string $noticia
   * @return void
   */
  public function eliminarTags_noticia($noticia)
  {
    $this->db->where('noticia', $noticia)
      ->delete('tags_noticias');
  }

  /**
   * Devuelve los datos necesarios para generar el cloud de tags,
   *  de la relacion tags_noticias
   *
   * @return void
   */
  public function tagsCloud()
  {
    return $this->db->select('tag text,count(*) weight')
      ->group_by('tag')
      ->order_by('COUNT(tag)', 'DESC')
      ->limit(6)
      ->get('tags_noticias')
      ->result();
  }
}