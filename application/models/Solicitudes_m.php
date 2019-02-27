<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase para manejar la tabla solicitudes de la BBDD
 */
class Solicitudes_m extends CI_Model
{

  /**
   * Guarda una solicitud
   *
   * @param array $datos
   * @return void
   */
  public function guardarSolicitud($datos)
  {
    $this->db->insert('solicitudes', $datos);
  }

  /**
   * Devuelve todas las solicitudes con todos sus datos
   *
   * @return array
   */
  public function obtenerSolicitudes()
  {
    return $this->db->get('solicitudes')->result();
  }

  /**
   * ACtualiza los datos de la solicitud
   *
   * @param array $datos asociativo con el campo a cambiar como clave
   * @param string $id id de la solicitud
   * @return void
   */
  public function actualizarSolicitud($datos, $id)
  {
    $this->db->set($datos)
      ->where('id', $id)
      ->update('solicitudes');
  }

  /**
   * Elimina la tupla de la solicitud
   *
   * @param string $id
   * @return void
   */
  public function eliminarSolicitudId($id)
  {
    $this->db->where('id', $id)
      ->delete('solicitudes');
  }

  /**
   * Elimina la tupla de la solicitud
   *
   * @param string $token
   * @return void
   */
  public function eliminarSolicitudToken($token)
  {
    $this->db->where('token', $token)
      ->delete('solicitudes');
  }

  /**
   * Devuelve la tupla de la solicitud por el token
   *
   * @param string $token
   * @return array
   */
  public function obtenerSolicitudPorToken($token)
  {
    return $this->db->where('token', $token)
      ->get('solicitudes')->row();
  }
}