<?php 
class cuentas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');
    }



    public function getCuentas() {
        $data = array();
        $i=0;
        $qCuentas = $this->db->get('cuentas');
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $data['data'][$i]['N']       = $key['Id_Cuenta'];
                $data['data'][$i]['CUENTA']  = '<a href="CuentaDetalle/'.$key['Id_Cuenta'].'" >'.$key['Nombre'].'</a>';
                $data['data'][$i]['FECHA']   = $key['created_at'];
                $i++;
            }
        }else{
            $data['data'][0]['N']       = "N/D";
            $data['data'][0]['CUENTA']  = "N/D";
            $data['data'][0]['FECHA']   = "N/D";
            $data['data'][0]['HORA']    = "N/D";
        }
        echo json_encode($data);
    }
    public function getInfoCuenta($Id) {
        $json = array();
        $qCategorias = $this->db->query("SELECT * FROM categorias WHERE Id_Cuenta ='".$Id."'");
        $qRemitidos = $this->db->query("SELECT * FROM remitidos WHERE Id_Cuenta ='".$Id."'");
        $qDatos = $this->db->query("SELECT * FROM cuentas WHERE Id_Cuenta ='".$Id."'");

        $json[] = array(
            'array_Categorias' => $qCategorias->result_array(),
            'array_Remitidos' => $qRemitidos->result_array(),
            'array_Datos' => $qDatos->result_array()
        );
        echo json_encode($json);
    }
    public function DataCuenta($Id) {

        $json = array();
        $qCategorias = $this->db->query("SELECT * FROM categorias WHERE Id_Cuenta ='".$Id."'");
        $qRemitidos = $this->db->query("SELECT * FROM remitidos WHERE Id_Cuenta ='".$Id."'");
        $qDatos = $this->db->query("SELECT * FROM cuentas WHERE Id_Cuenta ='".$Id."'");

        $json[] = array(
            'array_Categorias' => $qCategorias->result_array(),
            'array_Remitidos' => $qRemitidos->result_array(),
            'array_Datos' => $qDatos->result_array()
        );
        return $json;
    }


}