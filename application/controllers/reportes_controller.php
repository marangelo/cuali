<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class reportes_controller extends CI_Controller {
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
        $data['ext'] = $this->main_model->Info_Nuevo_Caso();
        $this->load->view('pages/Reportes/main',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_reportes');
    }
    public function Buscar_Solicitud_reporte(){
        /*$this->reportes_model->Buscar_Solicitud_reporte(
            $_POST['f1'],
            $_POST['f2'],
            $_POST['Cu'],
            $_POST['Ca'],
            $_POST['Ti'],
            $_POST['As'],
            $_POST['Ci']
        );*/

        $this->reportes_model->Buscar_Solicitud_reporte(
            "01-01-2019",
            "20-03-2020",
            "ND",
            "ND",
            "ND",
            "ND",
            "ND"
        );
    }

    public function Buscar_Solicitud_reporte_Excel($f1,$f2,$Cu,$Ca,$Ti,$As,$Ci) {
        $this->reportes_model->Buscar_Solicitud_reporte_Excel($f1,$f2,$Cu,$Ca,$Ti,$As,$Ci);
    }

}
?>