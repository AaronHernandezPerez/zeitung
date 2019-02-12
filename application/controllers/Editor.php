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
      redirect('login');
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

  public function publicarNoticia()
  {
    $datos['titulo'] = "Editor {$_SESSION['username']}";
    $datos['contenido'] = 'editor/publicar-noticia.php';
    // Dtos para publicar la noticia
    $this->load->model('categorias_m');
    $datos['categorias'] = $this->categorias_m->obtenerCategorias();
    // Libreria para el editor de texto del cuerpo de la noticia
    $datos['miJS'] = ['js/publicar-noticias.js'];
    $this->load->view('template_editor', $datos);
  }

  /**
   * Guarda en la BBDD la noticia pasada por formulario
   *
   * @return void
   */
  public function addNoticia()
  {
    // Sacamos las tags del array
    $tags = explode(',', $_POST['tags']);
    unset($_POST['tags']);

    // Descodificamos el cuerpo
    $_POST['cuerpo'] = json_decode($_POST['cuerpo']);
    // Añadimos la id y la fecha
    $_POST['autor'] = $_SESSION['id'];
    $_POST['fecha'] = date('Y-m-d');

    // Introducimos la noticia
    $this->load->model('noticias_m');
    $this->noticias_m->registrarNoticia($_POST);

    // Limpiamos los tags
    foreach ($tags as $key => $value) {
      // Comprobamos si esta vacio
      if (!preg_match('/[A-z0-9]/', $value)) {
        unset($tags[$key]);
        continue;
      }
      $tags[$key] = trim($value);
    }

    print_r($tags);
    // Introducimos sus tags
    // $this->load->model('tags_m');
    // foreach ($tags as $value) {
    //   $this->tags_m->registrarTag(['nombre' => $value]);
    // }
  }
  public function editarNoticias($id = '')
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
      // Funcion para pasar todo el array a minusculas menos la primera letra, aunque solo hay 1 valor :>
      $_POST = array_map(function ($value) {
        $value = strtolower($value);
        $value = ucfirst($value);
        return $value;
      }, $_POST);
      $this->categorias_m->registrarCategoria($_POST);
      $this->alertas->add("La categoria <b>{$_POST['nombre']}</b> ha sido añadida con éxito", 'success');
    }
    redirect('editor/categoria');
  }

}