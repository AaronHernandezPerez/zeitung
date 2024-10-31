<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controlador encargado de autotenticar o registrar el editor
 */
class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Comprobamos si ha iniciado sesión todos los sitios
    if ($this->session->has_userdata('username')) {
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
    $datos['titulo'] = 'Registro de Periodista';
    $datos['contenido'] = 'login/login.php';
    // Ubicaciones de los archivos CSS y JS
    // $datos['miCSS'] = '';
    $this->load->view('template_login', $datos);
  }

  /**
   * Vista del registro de usuarios, se atocompletarán los campos
   * introducidos al solicitar el registro
   *
   * @return html
   */
  public function registro($token)
  {
    // Comprobamos que la token exista, sino redireccionamos
    $this->load->model('solicitudes_m');
    $datos['solicitud'] = $this->solicitudes_m->obtenerSolicitudPorToken($token);
    if (!$datos['solicitud']) {
      $this->alertas->add("La <b>url de registro</b> no es correcta");
      redirect('login');
      die;
    }
    // Preparamos el nombre de la solicitud
    $datos['solicitud']->nombre = explode(' ', $datos['solicitud']->nombre);

    $test = array();
    echo (array_shift($test));
    $datos['titulo'] = 'Registro de Periodista';
    $datos['contenido'] = 'login/registro.php';
    $datos['miJS'] = ['js/registro.js'];
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
    $_POST['username'] = $this->funciones->trimMinus($_POST['username']);
    $_POST['email'] = $this->funciones->trimMinus($_POST['email']);
    // El nombre y los apellidos se capitalizará la primera letra de cada palabra
    $_POST['nombre'] = $this->funciones->trimPrimPalbMayus($_POST['nombre']);
    $_POST['apellidos'] = $this->funciones->trimPrimPalbMayus($_POST['apellidos']);
    // Por ultimo encriptamos la contraseña con Argon2
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_ARGON2I);

    // Borramos el token registrado
    $this->load->model('solicitudes_m');
    $this->solicitudes_m->eliminarSolicitudToken($_POST['token']);

    // Eliminamos el valor del captcha-response y el token antes de registrarlo
    unset($_POST['g-recaptcha-response']);
    unset($_POST['token']);

    // Importamoos el modelo y lo llamamos con los datos guardados
    $this->load->model('editores_m');
    $this->editores_m->registrarEditor($_POST);

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
			// Print pass
			error_log("This is a debug message");
			error_log(print_r($_POST['password'], true));
			error_log(print_r($resultado->password, true));
			error_log(password_verify($_POST['password'], $resultado->password));
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

  /**
   * Funcion para validar los campos del registro pasados por POST
   *
   * @return 1 si son válidos 0 en caso contrariom se considera válido si no está en la BBDD
   */
  public function validacionesR()
  {
    $this->load->model('editores_m');

    // Cualquier valor menos el email
    if ($test = $this->editores_m->validacionesR($_POST['campo'], $_POST['valor'])) {
      // Si está en la BBDD
      echo (0);
    } else {
      // Si no esta en la BBDD
      echo (1);
    }
  }

  /**
   * Página para solicitar el registro 
   *
   * @return html
   */
  public function solicitar()
  {
    $datos['titulo'] = 'Mándanos tu candidatura';
    $datos['contenido'] = 'login/solicitar.php';
    $this->load->view('template_login', $datos);
  }

  /**
   * Guarda la solicitud en la BBDD para ser aprovada o no por un administrador
   *
   * @return void
   */
  public function enviarSolicitud()
  {
    // Guardamos la solicitud en la BBDD
    $this->load->model('solicitudes_m');
    $_POST['nombre'] = $this->funciones->trimPrimPalbMayus($_POST['nombre']);
    $this->solicitudes_m->guardarSolicitud($_POST);

    $this->alertas->add("<b>Solicitud</b> enviada con éxito", 'success');
    redirect('login');
  }
}
?>
