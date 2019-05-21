<?php 
class main_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');
    }


    public function getResumen() {
        $data = array();
        for($i=0;$i<=10;$i++){
            $data['data'][$i]['N']       = "C".$i;
            $data['data'][$i]['CUENTA']  = "Numero Cuenta ".$i;
            $data['data'][$i]['REMITIDO']  = "Numero REMITIDO ".$i;
            $data['data'][$i]['FUENTE']  = "Numero FUENTE ".$i;
            $data['data'][$i]['FECHA']   = "23/08/2019";
            $data['data'][$i]['HORA']    = "08:00:00";
        }
        echo json_encode($data);
    }
    public function Info_Nuevo_Caso() {
        $json = array();
        $qCuentas = $this->db->get('cuentas');
        $qTipos = $this->db->get('tipos');
        $qFuentes = $this->db->get('fuentes');
        $json[] = array(
            'array_Cuentas' => $qCuentas->result_array(),
            'array_Tipos'   => $qTipos->result_array(),
            'array_Fuentes' => $qFuentes->result_array()
        );
        return $json;
    }
}