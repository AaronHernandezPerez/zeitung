<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Funciones
{

  public function trimPrimLetrMayus($valor)
  {
    return ucfirst(strtolower(trim($valor)));
  }

  public function trimMinus($valor)
  {
    return strtolower(trim($valor));
  }

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
}

?>