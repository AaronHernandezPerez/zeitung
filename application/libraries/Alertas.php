<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Alertas
{

  public function add($mensaje, $clase = 'danger')
  {
    if (!isset($_SESSION['alertas'])) {
      $_SESSION['alertas'] = array();
    }
    // Añade la alerta pasada por parametro
    array_push($_SESSION['alertas'], ['mensaje' => $mensaje, 'clase' => $clase]);
  }


  /**
   * Devuelve el html de la alerta formateada o nada en caso de que no haya ninguna alerta
   *
   * @return String o nada
   */
  public function show()
  {
    if (isset($_SESSION['alertas'])) {
      $html = '';
      foreach ($_SESSION['alertas'] as $value) {
        $html .= "<div class=\"alert alert-{$value['clase']}\" role=\"alert\">
        {$value['mensaje']}
      </div>";
      }
      unset($_SESSION['alertas']);
      return $html;
    }
  }
}

?>