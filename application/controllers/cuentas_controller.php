<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class cuentas_controller extends CI_Controller {
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
        $this->load->view('pages/Cuentas/cuentas');
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_cuentas');
    }
    public function getCuentas(){
        $this->cuentas_model->getCuentas();
    }
    public function getInfoCuenta($id){
        $this->cuentas_model->getInfoCuenta($id);
    }
    public function CuentaDetalle($id){

        $this->load->view('header/header');
        $data['DataCuenta'] = $this->cuentas_model->DataCuenta($id);
        $this->load->view('pages/Cuentas/cuentasdetalles',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_cuentasdetalles');
    }
    public function SaveCuenta() {
        $this->cuentas_model->SaveCuenta($this->input->post('data'));
    }
    public function SaveParametrosCuenta() {
        $this->cuentas_model->SaveParametrosCuenta($this->input->post('data'));
    }
    public function DescartarCuenta() {
        $this->cuentas_model->DescartarCuenta($this->input->post('data'));
    }
    public function DescargarParametro() {
        $this->cuentas_model->DescargarParametro($this->input->post('data'));
    }
    public function SaveParametro() {
        $this->cuentas_model->SaveParametro($this->input->post('data'));
    }
    public function DescartarTipo() {
        $this->cuentas_model->DescartarTipo($this->input->post('data'));
    }

}
?>