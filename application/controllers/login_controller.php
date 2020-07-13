<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
		$this->load->helper("url");


	}

    public function index() {
        $ApplicationVersion = new git_version();
        $data = [
            'appVersion' => $ApplicationVersion::get(),
        ];

        /*$this->load->view('header/header_login');
		$this->load->view('login/login',$data);
		$this->load->view('footer/footer_login');*/
        $this->load->view('login/auth/login',$data);
    }
    public function Send(){

    $this->login_model->Send($this->input->get_post('Id'));

    }

    public function validandoCuenta() {

            $this->form_validation->set_rules('usuario', 'Usuario', 'required|min_length[3]');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[3]');
             
            $this->form_validation->set_message('required','El campo %s es obligatorio');
             
             if($this->form_validation->run()!=false){

	            $data['user']=$this->login_model->login($this->input->get_post('usuario'),$this->input->get_post('password'));
	            
	            if ($data['user']==0){
	                redirect('?error=2');
	            } else {
	            	$this->login_model->log_session($data['user'][0]['idUser']);
	                
	                $sessiondata = array(
	                    'idUser' => $data['user'][0]['idUser'],
	                    'userName' => $data['user'][0]['userName'],
	                    'nombre' => $data['user'][0]['nombre'],
	                    'rol'=>$data['user'][0]['rol'],
                        'Permisos'=>$data['user'][0]['Cuentas'],
	                    'logged' => 1
	                );

	                $this->session->set_userdata($sessiondata);



	                if($this->session->userdata){
	                    if ($data['user'][0]['rol']==2){
                            redirect('perfil');
                        }elseif($data['user'][0]['rol']==0){
                            redirect('main');
                        }else{
                            redirect('main');
                        }

	                }
	            }   
             }else{
                 $ApplicationVersion = new git_version();
                 $datos = [
                     'appVersion' => $ApplicationVersion::get(),
                 ];
                $datos["mensaje"]="¡Datos vacíos!";
                 $this->load->view('login/auth/login',$datos);
             }
         }


    public function salir() {
        $this->session->sess_destroy();
        $sessiondata = array('logged' => 0);
        $this->session->unset_userdata($sessiondata);
        redirect(base_url().'index.php');
    }
}
