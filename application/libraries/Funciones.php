<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase con funciones de apoyo para toda la aplicación
 */
class Funciones
{

  /**
   * Pone a mayusculas la primera letra de la string y quita los espacios en blanco
   *
   * @param [type] $valor
   * @return void
   */
  public function trimPrimLetrMayus($valor)
  {
    return ucfirst(mb_strtolower(trim($valor)));
  }

  /**
   * Pone a mayusculas la primera letra de cada palabra y quita los espacios en blanco
   *
   * @param string $valor
   * @return string
   */
  public function trimPrimPalbMayus($valor)
  {
    return mb_convert_case(mb_strtolower(trim($valor)), MB_CASE_TITLE);
  }

  /**
   * Pone a minuscula y quita los espacios
   *
   * @param string $valor
   * @return string
   */
  public function trimMinus($valor)
  {
    return mb_strtolower(trim($valor));
  }

  /**
   * Recorre un array y devuelve solo sus valores
   *
   * @param array $array
   * @return array
   */
  public function soloValores($array)
  {
    $arr = array();
    $valores = array_values($array);
    foreach ($valores as $value) {
      if (is_array($value)) {
        array_push($arr, ...$this->soloValores($value));
      } else {
        array_push($arr, $value);
      }
    }
    return $arr;
  }

  /**
   * Configuracion para la paginacion por defecto, 
   * hay que añadir:
   * $this->load->library('pagination');
   * $this->pagination->initialize($this->funciones->$cfgPaginacion);
   *
   * @param string $url a la que direccionan los links
   * @param int $totalRows nº total de elementos
   * @param int $perPage elementos por página
   * @return void
   */
  public function cfgPaginacion($url, $totalRows, $perPage)
  {
    // Template de paginacion de Bootstrap 4
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['attributes'] = ['class' => 'page-link'];
    $config['first_link'] = 'Primera';
    $config['last_link'] = 'Ultima';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    // Fin del Template bootstrap 4
    $config['base_url'] = base_url() . $url;
    $config['total_rows'] = $totalRows;
    $config['num_links'] = 2; // nº enlaces
    $config['per_page'] = $perPage; // elementos por página
    return $config;
  }

  /**
   * Configuracion para la paginacion por defecto solo anterior y siguiente, 
   * hay que añadir:
   * $this->load->library('pagination');
   * $this->pagination->initialize($this->funciones->$cfgPaginacion);
   *
   * @param string $url a la que direccionan los links
   * @param int $totalRows nº total de elementos
   * @param int $perPage elementos por página
   * @return void
   */
  public function cfgPaginacionAntSig($url, $totalRows, $perPage)
  {
    $config['display_pages'] = false;
    $config['uri_segment'] = 4;

    // Template de paginacion de Bootstrap 4
    $config['full_tag_open'] = '<ul class="pagination  pagination-lg">';
    $config['full_tag_close'] = '</ul>';
    $config['attributes'] = ['class' => 'page-link'];
    $config['prev_link'] = 'Mas nuevas';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Mas antiguas';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';;
    // Fin del Template bootstrap 4
    $config['base_url'] = base_url() . $url;
    $config['total_rows'] = $totalRows;
    $config['num_links'] = 2; // nº enlaces
    $config['per_page'] = $perPage; // elementos por página
    return $config;
  }
}

?>