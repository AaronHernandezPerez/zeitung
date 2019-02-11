<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
        // echo ($_SESSION['username']);
    unset($_SESSION['username']);
    // Comprobamos si ha iniciado sesión en cualquier lugar menos en registro
    if (($this->uri->segment('2') && $this->uri->segment('2') != 'registro') && !$this->session->has_userdata('username')) {
      redirect('editor');
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
    $datos['contenido'] = 'editor/index.php';
    // Ubicaciones de los archivos CSS y JS
    // $datos['miCSS'] = '';
    $this->load->view('vista_editor', $datos);
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

}