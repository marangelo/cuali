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
    public function DetalleResumen() {
        $this->load->view('header/header');
        $this->load->view('pages/Main/detalle_solicitud');
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_detalle_solicitud');
    }
    public function getResumen(){
        $this->main_model->getResumen();
    }
    public function Config(){
        $this->load->view('header/header');
        $data['DataConfig'] = $this->main_model->config();
        $this->load->view('pages/parametros/parametros',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_parametros');
    }

}
?>