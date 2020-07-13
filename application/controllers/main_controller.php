<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class main_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('persona');
        //Load Libraries
        $this->load->library(array('pagination'));
        //pagination settings
        $this->perPage = 10;
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
    public function get_user_id(){
        return $this->session->userdata('idUser');
    }
    public function perfil() {
        $data['title']="text_dashboard";
        $user_id = $this->get_user_id();
        $dashboard_data = $this->usuarios_model->get_dashboard_data($user_id);
        $data['dashboard_data']=$dashboard_data;
        $data['sub_view'] = $this->load->view('pages/User/dashboard', $data, TRUE);
        $this->load->view('pages/_layout', $data);
    }
    public function casos(){

        $data['title']="text_tickets";
        $data['sub_view'] = $this->load->view('pages/user/tickets', $data, TRUE);
        $this->load->view('pages/_layout', $data);
    }

    public function list_casos_ajax($page=0){
        $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        //get tickets count
        $tickets=$this->main_model->get_casos();
        $ticketsCount = ($tickets) ? count($tickets) : 0;

        //set start and limit
        $conditions['start'] = $page;
        $conditions['limit'] = $this->perPage;

        //get all tickets
        $tickets = $this->main_model->get_casos();

        //get pagination confing
        $config=$this->pagination_config($base_url=base_url().'tickets/list_tickets_ajax',$total_rows=$ticketsCount,$per_page=$this->perPage);
        // Initialize
        $this->pagination->initialize($config);
        //set data array
        $data['pagination'] = $this->pagination->create_links();
        $data['page']=$page;
        $data['tickets']=$tickets;
        //response
        $success = true;
        $message = '';
        $content = $this->load->view('pages/user/list_tickets_ajax',$data,TRUE);
        $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
        echo json_encode($json_array);
        exit();
    }

    //veiw ticket
    public function view_caso($ticket_id=null){
        $data['title']="text_view_ticket";
        if($ticket_id!=NULL){
            //get user ticket by id
            $ticket = $this->main_model->get_user_ticket($ticket_id);
            if($ticket){
                $data['ticket']=$ticket;
                //get ticket replies
                $replies = $this->main_model->get_replies($ticket_id);
                $data['replies']=$replies;
                //load view
                $data['sub_view'] = $this->load->view('pages/user/view_ticket', $data, TRUE);
                $this->load->view('pages/_layout', $data);
            }else{
                //if ticket id goes wrong
                redirect('/user/casos', 'refresh');
            }
        }else{
            //if ticket id goes empty
            redirect('/user/casos', 'refresh');
        }
    }
    public function Myprofile(){
        $data['title']="text_profile";
        //get user by id
        $data['sub_view'] = $this->load->view('pages/user/profile', $data, TRUE);
        $this->load->view('pages/_layout', $data);
    }
    public function change_password(){
        if($this->input->post()){
            $this->form_validation->set_rules('old_password','Old Password','trim|required' );
            $this->form_validation->set_rules('new_password','New Password','trim|required');
            $this->form_validation->set_rules('confirm_new_password','Confirm New Password','trim|required');

            if ($this->form_validation->run() == FALSE) {
                $success = FALSE;
                $message = validation_errors();

            }else{
                $user_id=$this->get_user_id();
                $old_password=$this->input->post('old_password');
                $new_password=$this->input->post('new_password');
                $result = $this->user_model->change_password($user_id,$old_password,$new_password);
                if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                    $success = TRUE;
                    $message = $this->lang->line("alert_password_updated");
                }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_password_not_updated");
                }elseif($result['status']==FALSE &&$result['label']=='INVALID'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_old_password_incorrect");
                }
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
        $data['title']="text_change_password";

        $data['sub_view'] = $this->load->view('pages/user/change_password', $data, TRUE);
        $this->load->view('pages/_layout', $data);
    }


    private function pagination_config($base_url,$total_rows,$per_page){
        // Pagination Configuration
        $config['base_url'] = $base_url;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = "<ul class='pagination ci-pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = '<i class="feather icon-chevrons-left"></i> '.$this->lang->line("text_first");
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = $this->lang->line("text_last").' <i class="feather icon-chevrons-right"></i>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="feather icon-chevron-left"></i> '.$this->lang->line("text_previous");
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line("text_next").' <i class="feather icon-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        return $config;
    }



    public function NuevaSolicitud() {
        $this->load->view('header/header');
        $data['ext'] = $this->main_model->Info_Nuevo_Caso();
        $this->load->view('pages/Main/nueva_solicitud',$data);
        $this->load->view('footer/footer');
        $this->load->view('jsView/js_nueva_solicitud');
    }
    public function DetalleResumen($Id) {
        $this->load->view('header/header');
        $data['Info'] = $this->main_model->DetalleResumen($Id);
        $this->load->view('pages/Main/detalle_solicitud',$data);
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
    public function SaveSolicitud() {
        $this->main_model->SaveSolicitud($this->input->post('data'));
    }
    public function DescartarSolicitud() {
        $this->main_model->DescartarSolicitud($this->input->post('data'));
    }
    public function SaveComentario() {

        $this->main_model->SaveComentario($this->input->post('data'));

    }
    public function BuscarSolicitud(){
        $this->main_model->BuscarSolicitud($_POST['f1'],$_POST['f2']);
    }

}
?>