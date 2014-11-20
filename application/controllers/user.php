<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('user_model');

    }

    public function index()
    {
        $this->estoyLogueado();

        $data["users"] = $this->user_model->read([]);


        $this->load->view('layouts/header', $data);
        $this->load->view('user/index');
        $this->load->view('layouts/footer');
    }

    public function login()
    {

        if (isset($_SESSION["idUsuario"])) {
            header("Location:" . base_url() . "album");
            exit();
        }
        $this->load->view('user/login');

    }

    public function in()
    {

        $email = $this->input->post("email");
        $password = $this->input->post("password");
        if (!$email || !$password) {
            $this->mensaje("E-mail o contraseña incorrectos", "error");
        } else {
            $where = array("email" => $email, "password" => sha1($password));
            $usuario = $this->user_model->read($where);
            if ($usuario) {
                $_SESSION["idUsuario"] = $usuario[0]->id;
                $_SESSION["nombre"] = $usuario[0]->first_name;
                $this->mensaje("Bienvenido nuevamente {$_SESSION["nombre"]}", "success", "/album");
            } else {
                $this->mensaje("E-mail o contraseña incorrectos", "error", "entrar");
            }
        }
    }

    public function salir()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        redirect(base_url());
    }

}

