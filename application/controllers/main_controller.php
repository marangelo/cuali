<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class main_controller extends CI_Controller {
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
        //$data['ext'] = $this->reportes_model->getExt();
        $this->load->view('pages/Main/main');
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_main');
    }
    public function NuevaSolicitud() {
        $this->load->view('header/header');
        $data['ext'] = $this->main_model->Info_Nuevo_Caso();
        $this->load->view('pages/Main/nueva_solicitud',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_nueva_solicitud');
    }
    public function getResumen(){
        $this->main_model->getResumen();
    }

}
?>