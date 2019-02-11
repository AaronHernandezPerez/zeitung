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
    $datos['titulo'] = "Editor {$_SESSION['username']}";
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


  ### Metodos solo para el admin


  private function comprobarAdmin()
  {
    if (!$_SESSION['admin']) {
      $this->alertas->add("No tienes <b>acceso</b> a estas opciones");
      redirect('editor');
      die;
    }
  }

  /**
   * Carga la vista categoria
   *
   * @return void
   */
  public function categoria()
  {
    $this->comprobarAdmin();
    $datos['titulo'] = "Editor {$_SESSION['username']}";

    $datos['contenido'] = 'editor/categoria.php';
    $this->load->view('template_editor', $datos);
  }

  /**
   * Hace las operaciones necesarias para añadir la categoria
   *
   * @param String $categoria
   * @return void
   */
  public function addCategoria()
  {
    $_POST['nombre'];
    $this->load->model('categorias_m');
    // Comprobamos que la categoria existe
    if ($this->categorias_m->existeCategoria($_POST['nombre'])) {
      $this->alertas->add("La <b>categoria</b> ya existe");
    } else {
      $this->categorias_m->registrarCategoria($_POST);
      $this->alertas->add("La <b>categoria</b> ha sido añadido con éxito", 'success');
    }
    redirect('editor/categoria');
  }

}