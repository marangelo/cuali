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
        $this->db->where('estado', 1);
        $qCuentas = $this->db->get('cuentas');
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $data['data'][$i]['N']       = $key['Id_Cuenta'];
                $data['data'][$i]['CUENTA']  = '<a href="CuentaDetalle/'.$key['Id_Cuenta'].'" >'.$key['Nombre'].'</a>';
                $data['data'][$i]['FECHA']   = $key['created_at'];
                $data['data'][$i]['Acc']   = '<i class="material-icons">edit</i>  <i class="material-icons">delete</i>';
                $data['data'][$i]['Acc']   = "<a href='#!' onclick='OpenModal(".'"edit"'.",".$key['Id_Cuenta'].")'> <i class='material-icons'>edit</i></a> <a href='#!' onclick='Descartar(".$key['Id_Cuenta'].")'> <i class='material-icons'>delete</i> </a> ";
                $i++;
            }
        }else{
            $data['data'][0]['N']       = "N/D";
            $data['data'][0]['CUENTA']  = "N/D";
            $data['data'][0]['FECHA']   = "N/D";
            $data['data'][0]['HORA']    = "N/D";
            $data['data'][0]['Acc']     = "";
        }
        echo json_encode($data);
    }
    public function getInfoCuenta($Id) {
        $json = array();
        $qCategorias = $this->db->query("SELECT * FROM categorias WHERE Id_Cuenta ='".$Id."'");
        $qRemitidos = $this->db->query("SELECT * FROM remitidos WHERE Id_Cuenta ='".$Id."'");
        $qDatos = $this->db->query("SELECT * FROM cuentas WHERE Id_Cuenta ='".$Id."' and estado='1'");

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
        $qDatos = $this->db->query("SELECT * FROM cuentas WHERE Id_Cuenta ='".$Id."' and estado='1'");

        $json[] = array(
            'array_Categorias' => $qCategorias->result_array(),
            'array_Remitidos' => $qRemitidos->result_array(),
            'array_Datos' => $qDatos->result_array()
        );
        return $json;
    }
    public function DescartarCuenta($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $this->db->where('Id_Cuenta', $key['mIdCuenta']);
                $result = $this->db->update('cuentas', array(
                    'estado' => 0,
                    'updated_at'    => date('Y-m-d h:i:s')
                ));
            }
        }
        echo $result;
    }
    public function SaveCuenta($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){

                if($key['mflag']=="Add"){
                    $result = $this->db->insert('cuentas', array(
                        'Nombre'        => $key['mtxIdNameCuenta'],
                        'Comentario'    => $key['mtxIdComentario'],
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),
                        'id_usuario'    => $this->session->userdata('idUser'),
                        'estado'        => 1
                    ));
                }else{
                    $this->db->where('Id_Cuenta', $key['mIdCuenta']);
                    $result = $this->db->update('cuentas',  array(
                        'Nombre'        => $key['mtxIdNameCuenta'],
                        'Comentario'    => $key['mtxIdComentario'],
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));

                }

            }
        }
        echo $result;
    }


}