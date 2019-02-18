<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias_m extends CI_Model
{
  /**
   * Registra la noticia y devuelve su id
   *
   * @param [type] $datos
   * @return object
   */
  public function registrarNoticia($datos)
  {
    $this->db->insert('noticias', $datos);
    return $this->db->insert_id();
  }

  /**
   * Obtiene el listado de las noticias para editarlas
   *
   * @param string $idautor id del autor
   * @param string $limite cuantas noticias debe obtener
   * @param string $offset a partir de cual debe cogerlas
   * @return object
   */
  public function obtenerListaNoticiasEditor($idautor, $limite = '', $offset = '')
  {
    $subquery = ', (SELECT COUNT(*) FROM comentarios WHERE noticia = noticias.id) comentarios';
    $query = $this->db->select('noticias.id,titulo,noticias.fecha, (SELECT COUNT(*) FROM comentarios WHERE noticia = noticias.id) comentarios')
      ->where('autor', $idautor)
      ->order_by('id', 'DESC')
      ->get('noticias', $limite, $offset);
    return $query->result();
  }

  /**
   * Devuelve cuantas noticias ha publicado un autor
   *
   * @param string $idautor
   * @return int
   */
  public function obtenerNumeroNoticiasEditor($idautor)
  {
    return $this->db->where('autor', $idautor)
      ->count_all_results('noticias');
  }

  /**
   * Devuelve cuantas noticias tiene el nombre de la categoria pasada por parametro
   *
   * @param string $nombreCategoria
   * @return int
   */
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
   * @return object
   */
  public function getAutor($idnoticia)
  {
    $query = $this->db->select('autor')
      ->where('id', $idnoticia)
      ->get('noticias');
    return $query->row()->autor;
  }

  /**
   * Obtiene una noticia a partir de su id
   *
   * @param string $idnoticia
   * @return object
   */
  public function obtenerNoticia($idnoticia)
  {
    $query = $this->db->select('id,categoria,titulo,cabecera,cuerpo')
      ->where('id', $idnoticia)
      ->get('noticias');
    return $query->row();
  }

  /**
   * Devuelve todos los paratados de las noticias, y el nombre completo del autor
   *
   * @param [type] $idnoticia
   * @return object
   */
  public function obtenerNoticiaNombre($idnoticia)
  {
    $query = $this->db->select('noticias.*,CONCAT(editores.nombre," ",editores.apellidos) nombre')
      ->join('editores', 'noticias.autor = editores.id')
      ->where('noticias.id', $idnoticia)
      ->get('noticias');
    return $query->row();
  }

  /**
   * Obtiene el nombre del autor a partir de la id de la noticia
   *
   * @param string $idNoticia
   * @return object
   */
  public function obtenerNombreAutor($idNoticia)
  {
    $query = $this->db->select('username')
      ->from('editores')
      ->join('noticias', 'editores.id = noticias.autor')
      ->where('noticias.id', $idNoticia)
      ->get();
    return $query->row()->username;
  }

  /**
   * Actualiza una noticia con los nuevos datos
   *
   * @param array $datos
   * @return void
   */
  public function actualizarNoticia($datos)
  {
    $this->db->where('id', $datos['id'])
      ->update('noticias', $datos);
  }

  /**
   * Elimina la noticia 
   *
   * @param string $idNoticia
   * @return void
   */
  public function eliminarNoticia($idNoticia)
  {
    $this->db->delete('noticias', ['id' => $idNoticia]);
  }

  /**
   * Obtiene los autores que tienen notiicas publicadas
   *
   * @return object
   */
  public function obtenerIdAutores()
  {
    return $this->db->select('autor')
      ->group_by('autor')
      ->get('noticias')->result();
  }

  /**
   * Obtiene las noticias de la categoria, siendo la categoria su nombre, ordenada de forma descendente
   * Este metodo es le que se llama para ver el listado de las noticias en el controlado noticias
   *
   * @param string $categoria
   * @param string $limite
   * @param string $offset
   * @return object
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