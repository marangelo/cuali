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

        $this->load->view('pages/Usuarios/usuarios',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_usuarios');
    }
    public function SaveUsuario() {
        $this->usuarios_model->SaveUsuario($this->input->post('data'));
    }
    public function DescartarUsuario() {
        $this->usuarios_model->DescartarUsuario($this->input->post('data'));
    }
    public function getPermisos($Id){
        $this->usuarios_model->getPermisos($Id);
    }
    public function lst_ajax_SavePermisos() {
        $this->usuarios_model->lst_ajax_SavePermisos(
            $this->input->post('IdCuenta'),
            $this->input->post('IdUsuario')
        );
    }
}
?>