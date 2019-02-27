<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase para manejar la tabla categorias de la BBDD
 */
class Categorias_m extends CI_Model
{
  /**
   * Guarda la categoria en la BBDD
   *
   * @param string $categoria
   * @return void
   */
  public function registrarCategoria($categoria)
  {
    $this->db->insert('categorias', $categoria);
  }

  /**
   * Devuelve la categoria por NOMBRE, el cuál se pasa por parametro       
   *
   * @param string $categoria
   * @return array con el nombre
   */
  public function existeCategoria($categoria)
  {
    $query = $this->db->select('nombre')
      ->where('nombre', $categoria)
      ->get('categorias');
    return $query->row();
  }

  /**
   * Devuelve todo de las categorias
   *
   * @return array de objetos
   */
  public function obtenerCategorias()
  {
    $query = $this->db->get('categorias');
    return $query->result();
  }

  /**
   * Devuelve el nombre de las categorias
   *
   * @return void
   */
  public function obtenerNombreCategoriasArr()
  {
    $query = $this->db->select('nombre')
      ->get('categorias');
    return $query->result_array();
  }


  /**
   * Actualiza los datos de las categorias
   *
   * @param string $datos
   * @return void
   */
  public function actualizarCategoria($datos)
  {
    $this->db->set('nombre', $datos['nombre'])
      ->where('nombre', $datos['nombreAnterior'])
      ->update('categorias');
  }
}