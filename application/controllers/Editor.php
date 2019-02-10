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

  public function registro()
  {
    $datos['titulo'] = 'Registro de Periodista';
    $datos['contenido'] = 'editor/registro.php';
    // Ubicaciones de los archivos CSS y JS
    // $datos['miCSS'] = '';
    $this->load->view('vista_editor', $datos);
  }

  /**
   * Registra el editor pasado por post
   *
   * @return void
   */
  public function registrarEditor()
  {
    // Primero, el usuario y el email se pasarán a minusculas
    $_POST['username'] = strtolower($_POST['username']);
    $_POST['email'] = strtolower($_POST['email']);
    // El nombre y los apellidos se capitalizará la primera letra de cada palabra
    $_POST['nombre'] = ucwords($_POST['nombre']);
    $_POST['apellidos'] = ucwords($_POST['apellidos']);

    
    // redirect('editor');
  }
}