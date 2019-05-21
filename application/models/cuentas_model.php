<?php 
class cuentas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');
    }



    public function getCuentas() {
        $data = array();
        for($i=0;$i<=10;$i++){
            $data['data'][$i]['N']       = "C".$i;
            $data['data'][$i]['CUENTA']  = "Numero Cuenta ".$i;
            $data['data'][$i]['FECHA']   = "23/08/2019";
            $data['data'][$i]['HORA']    = "08:00:00";
        }
        echo json_encode($data);
    }
}