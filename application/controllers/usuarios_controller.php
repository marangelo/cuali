<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('persona');

        if($this->session->userdata('logged')==0){
            redirect(base_url().'index.php/login','refresh');
        }
    }

    public function index() {
        $this->load->view('header/header');
        $data['ext'] = $this->usuarios_model->getAll();
        $data['inf_Permisos'] = $this->usuarios_model->Permisos();
        $this->load->view('pages/Usuarios/usuarios',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_usuarios');
    }
}
?>