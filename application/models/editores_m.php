<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Editores_m extends CI_Model
{
  public function registrarEditor($datos)
  {
    $this->db->insert('editores', $datos);
  }

  public function obtenerDatosLogin($username)
  {
    $query = $this->db->select('id,username,administrador,password')
      ->where('username', $username)
      ->get('editores');
    return $query->row();
  }

  public function obtenerUsername($idEditor)
  {
    return $this->db->select('username')
      ->where('id', $idEditor)
      ->get('editores')->row()->username;
  }

  public function obtenerTodoEditor($idEditor)
  {
    return $this->db->where('id', $idEditor)->get('editores')->row();
  }

  /**
   * Funcion para validar el registro
   *
   * @param string $campo, puede ser username o email
   * @param string $valor el valor a buscar en la BBDD
   * @return void
   */
  public function validacionesR($campo, $valor)
  {
    return $this->db->select($campo)
      ->where($campo, $valor)
      ->get('editores')->row();
  }

  /**
   * Obtiene la ruta de la imagen de un editor
   *
   * @param string $idEditor
   * @return void
   */
  public function obtenerImagen($idEditor)
  {
    return $this->db->select('imagen_p')
      ->where('id', $idEditor)
      ->get('editores')->row()->imagen_p;
  }


  ### Métodos del perfil

  /**
   * Cambia la imagen de perfil de un editor, solo hay que indicar el nombre del archivo
   *
   * @param string $var el nombre con la extensión del archivo
   * @return void
   */
  public function cambiarImagen($nombreImg, $idEditor)
  {
    $this->db->set('imagen_p', "editores/{$nombreImg}")
      ->where('id', $idEditor)
      ->update('editores');
  }

  /**
   * ACtualiza los campos pasados por parametro
   *
   * @param array $datos array asociativo
   * @return void
   */
  public function cambiarDatos($datos, $idEditor)
  {
    $this->db->where('id', $idEditor)
      ->update('editores', $datos);
  }

  public function getPassword($idEditor)
  {
    return $this->db->select('password')
      ->where('id', $idEditor)
      ->get('editores')->row()->password;
  }


  public function cambiarPassword($password, $idEditor)
  {
    $this->db->where('id', $idEditor)
      ->set('password', $password)
      ->update('editores');
  }
}

?>