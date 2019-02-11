<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Comprobamos si ha iniciado sesión todos los sitios
    if ($this->session->has_userdata('username')) {
      // redirect('editor');
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
    $datos['titulo'] = 'Registro de Periodista';
    $datos['contenido'] = 'login/login.php';
    // Ubicaciones de los archivos CSS y JS
    // $datos['miCSS'] = '';
    $datos['alertas'] = $this->alertas->show();
    $this->load->view('template_login', $datos);
  }

  /**
   * Vista del registro de usuarios
   *
   * @return void
   */
  public function registro()
  {
    $datos['titulo'] = 'Registro de Periodista';
    $datos['contenido'] = 'login/registro.php';
    $this->load->view('template_login', $datos);
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
    // Por ultimo encriptamos la contraseña con Argon2
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_ARGON2I);

    // Utilizaremos Flash data para enviar la información al modelo para registrarlo
    $this->session->set_flashdata('editor', $_POST);
    
    // Importamoos el modelo y lo llamamos con los datos guardados
    $this->load->model('editores_m');
    $this->editores_m->registrarEditor();
    
    // Iniciamos sesión
    $this->autenticarEditor($_POST['username']);

    // Y lo redirigimos al editor
    redirect('editor');
  }

  /**
   * Comprueba las credenciales pasadas por post
   *
   * @return void
   */
  public function comprobarCredenciales()
  {
    $this->load->model('editores_m');
    // Comprobamos que el editor exista
    if ($resultado = $this->editores_m->obtenerDatosLogin($_POST['username'])) {
      // Si el usuario es correcto comprobamos la contraseña
      if (password_verify($_POST['password'], $resultado->password)) {
        // Si la contraseña es correcta lo logueamos y lo redireccionamos a editor
        // Iniciamos sesión
        $this->autenticarEditor($_POST['username']);

        // Y lo redirigimos al editor
        redirect('editor');
      } else {
        // Si no mostramos su correspondiente mensaje de error y volvemos a login
        $this->alertas->add("La <b>contraseña</b> no es correcta");
        redirect('login');
      }
    } else {
        // Si no mostramos su correspondiente mensaje de error y volvemos a login
      $this->alertas->add("El usuario <b>{$_POST['username']}</b> no existe");
      redirect('login');
    }
  }

  /**
   * Funcion privada para autenticar al usuario a partir de su username,
   * no requiere validación asique hay que asegurarse que se llama desde el sitio apropiado
   *
   * @param String $usuario
   * @return void
   */
  private function autenticarEditor($usuario)
  {
    $this->load->model('editores_m');
    if ($resultado = $this->editores_m->obtenerDatosLogin($usuario)) {
      $_SESSION['id'] = $resultado->id;
      $_SESSION['username'] = $resultado->username;
      
      // Para las opciones de administador
      if ($resultado->administrador == 1) {
        $_SESSION['admin'] = true;
      } else {
        $_SESSION['admin'] = false;
      }
    }
  }
}