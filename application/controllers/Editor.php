<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Comprobamos si ha iniciado sesión todos los sitios
    if (!$this->session->has_userdata('username')) {
      $this->alertas->add("No has <b>iniciado sesión</b>");
      // redirect('login');
      die;
    }
  }

  /**
   * Pagina de logeo del editor/admin
   *
   * @return void
   */
  public function index()
  {
    $datos['titulo'] = 'Titulo';
    
    // Si se ha mandado un mensaje POST, intentará autenticar al usuario, sino cargará la página de login

    $datos['contenido'] = 'editor/resumen.php';
    $this->load->view('template_editor', $datos);
  }

  public function noticias()
  {

  }

  public function crearNoticia()
  {

  }

  public function editarNoticia($id)
  {

  }


  public function cerrarSesion()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}