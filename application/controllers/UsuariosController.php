<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuariosController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsuariosModel');

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }


    public function lista_usuarios()
    {
        $dataUsuarios = $this->UsuariosModel->obtenerTodosLosUsuarios();

        $data = array(
            "usuarios" => $dataUsuarios
        );
        $this->load->view("template/head");
        $this->load->view("template/header");
        $this->load->view("template/menu");

        $this->load->view("lista_usuarios", $data);
        $this->load->view("template/footer", array("js" => "lista_usuarios.js"));
    }
}
