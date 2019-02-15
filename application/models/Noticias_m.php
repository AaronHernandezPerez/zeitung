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


  public function obtenerListaNoticiasEditor($idautor, $limite = '', $offset = '')
  {
    $query = $this->db->select('id,titulo,fecha')
      ->where('autor', $idautor)
      ->get('noticias', $limite, $offset);
    return $query->result();
  }

  public function obtenerNumeroNoticiasEditor($idautor)
  {
    return $this->db->where('autor', $idautor)
      ->count_all_results('noticias');
  }

  public function obtenerNumeroNoticiasCategoria($nombreCategoria)
  {
    return $this->db->select('*')
      ->from('noticias')
      ->join('categorias', 'noticias.categoria = categorias.id')
      ->like('categorias.nombre', $nombreCategoria)
      ->count_all_results();
  }

  /**
   * Obtiene el autor de una noticia
   *
   * @param int $idnoticia
   * @return void
   */
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

  public function obtenerNoticiaNombre($idnoticia)
  {
    $query = $this->db->select('noticias.*,editores.username nombre')
      ->join('editores', 'noticias.autor = editores.id')
      ->where('noticias.id', $idnoticia)
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

  public function obtenerIdAutores()
  {
    return $this->db->select('autor')
      ->group_by('autor')
      ->get('noticias')->result();
  }

  /**
   * Obtiene las noticias de la categoria, siendo la categoria su nombre,
   *
   * @param string $categoria
   * @param string $limite
   * @param string $offset
   * @return void
   */
  public function obtenerNoticiasPorNombreCat($categoria = '', $limite = '', $offset = '')
  {
    return $this->db->select('noticias.id,noticias.autor,noticias.titulo,noticias.cabecera,noticias.fecha,editores.username nombre')
      ->from('noticias')
      ->join('categorias', 'noticias.categoria = categorias.id')
      ->join('editores', 'noticias.autor = editores.id')
      ->like('categorias.nombre', $categoria)
      ->order_by('fecha', 'DESC')
      ->limit($limite, $offset)
      ->get()->result();
  }
}

?>