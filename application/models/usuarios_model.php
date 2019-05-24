<?php 
class usuarios_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');
    }
    public function getAll() {
        $data = array();
        $i=0;
        $q = $this->db->get('usuarios');
        if($q->num_rows() > 0 ) {
            foreach ($q->result_array() as $key){
                $data['data'][$i]['N']       = $key['idUser'];
                $data['data'][$i]['USUARIOS']  = $key['userName'];
                $data['data'][$i]['nombre']   = $key['nombre'];
                $data['data'][$i]['created_at']   = $key['created_at'];
                $data['data'][$i]['Acc']   = "<a href='#!' onclick='OpenModal(".'"edit"'.")'> <i class='material-icons'>edit</i></a>  <i class='material-icons'>delete</i>  <a href='#!' onclick='OpenModalPermisos()'><i class='material-icons'>fingerprint</i></a>";
                $i++;
            }
        }else{
            $data['data'][0]['N']           = "N/D";
            $data['data'][0]['USUARIOS']    = "N/D";
            $data['data'][0]['nombre']      = "N/D";
            $data['data'][0]['created_at']  = "N/D";
            $data['data'][0]['Acc']         = "N/D";
        }
        return $data;
    }

    public function Permisos(){
        $data = array(
            'id'         => 0 ,
            'checked'       => true,
            'onClick'       => 'getPermiso()',
            'class'         => 'filled-in'

        );


        $temp = array();
        $i=0;
        $qCuentas = $this->db->get('cuentas');
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $temp["dtCheck"][$i]["Id"]     = $key['Id_Cuenta'];
                $temp["dtCheck"][$i]["name"]   = $key['Nombre'];
                $temp["dtCheck"][$i]["chck"]   = form_checkbox($data);
                $i++;
            }
        }else{
            $temp["dtCheck"][$i]["Id"]     = "N/D";
            $temp["dtCheck"][$i]["name"]   = "";
            $temp["dtCheck"][$i]["chck"]   = "";
        }
        return $temp;

    }


}