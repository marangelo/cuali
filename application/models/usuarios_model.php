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

        $this->db->where('estado', 1);
        $q = $this->db->get('usuarios');
        if($q->num_rows() > 0 ) {
            foreach ($q->result_array() as $key){
                $data['data'][$i]['N']              = $key['idUser'];
                $data['data'][$i]['USUARIOS']       = $key['userName'];
                $data['data'][$i]['nombre']         = $key['nombre'];
                $data['data'][$i]['password']       = $key['password'];
                $data['data'][$i]['rol']            = $key['rol'];
                $data['data'][$i]['created_at']     = $key['created_at'];
                $data['data'][$i]['Acc']            = "<a href='#!' onclick='OpenModal(".'"edit"'.")'> <i class='material-icons'>edit</i></a>
                                                       <a href='#!' onclick='DescartarUsarios(".$key['idUser'].")'> <i class='material-icons'>delete</i></a>
                                                       <a href='#!' onclick='OpenModalPermisos(".$key['idUser'].")'><i class='material-icons'>fingerprint</i></a>";
                $i++;
            }
        }else{
            $data['data'][0]['N']           = "N/D";
            $data['data'][0]['USUARIOS']    = "N/D";
            $data['data'][0]['nombre']      = "N/D";
            $data['data'][0]['password']      = "N/D";
            $data['data'][0]['created_at']  = "N/D";
            $data['data'][0]['Acc']         = "N/D";
        }
        return $data;
    }
    public function lst_ajax_SavePermisos($Cuenta,$Usuario) {

        if ($this->has_permission($Cuenta,$Usuario)==false){
            $this->db->insert('permissions', array (
                'Usuario_id' => $Usuario,
                'modules_id' => $Cuenta,
                'FechaCreacion' => date("Y-m-d"),
                'usuarioCU' => $this->session->userdata('idUser')

            ));
            echo json_encode(($this->db->affected_rows() > 0) ? 1 : 0);
        }else{
            $this->db->delete('permissions',
                array(
                    'Usuario_id' => $Usuario,
                    'modules_id' => $Cuenta
                ), 1);
            echo json_encode(($this->db->affected_rows() > 0) ? 1 : 0);
        }


    }
    public function getPermisos($ID){


        $temp = array();
        $i=0;
        $this->db->where('estado', 1);
        $qCuentas = $this->db->get('cuentas');
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){

                $data = array(
                    'id'         => $i ,
                    'checked'       => $this->has_permission
                    (
                        $key['Id_Cuenta'],
                        $ID
                    ),
                    'onClick'       => 'SavePermiso('.$key['Id_Cuenta'].','.$ID.')',
                    'class'         => 'filled-in'

                );


                $temp["data"][$i]["Id"]     = $key['Id_Cuenta'];
                $temp["data"][$i]["name"]   = $key['Nombre'];
                $temp["data"][$i]["chck"]   = form_checkbox($data);
                $i++;
            }
        }else{
            $temp["data"][$i]["Id"]     = "N/D";
            $temp["data"][$i]["name"]   = "";
            $temp["data"][$i]["chck"]   = "";
        }
        echo json_encode($temp);

    }
    function has_permission($module_id,$person_id)
    {
        if($module_id==null)
        {
            return true;
        }

        $query = $this->db->get_where('permissions',
            array(
                'Usuario_id' => $person_id,
                'modules_id'=>$module_id
            ), 1);
        return $query->num_rows() == 1;


    }

    public function SaveUsuario($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                if($key['Flag']=="Add"){
                    $result = $this->db->insert('usuarios', array(
                        'userName'      => $key['txUsuario'],
                        'password'      => $key['txPassword'],
                        'nombre'        => $key['txFullName'],
                        'rol'           => $key['txRol'],
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),
                        'id_usuario'    => $this->session->userdata('idUser'),
                        'estado'        => 1
                    ));
                }else{
                    $this->db->where('idUser', $key['Id']);
                    $result = $this->db->update('usuarios',  array(
                        'userName'      => $key['txUsuario'],
                        'password'      => $key['txPassword'],
                        'nombre'        => $key['txFullName'],
                        'rol'           => $key['txRol'],
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));
                }
            }
        }
        echo $result;
    }
    public function DescartarUsuario($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $this->db->where('idUser', $key['mId']);
                $result = $this->db->update('usuarios', array(
                    'estado' => 0,
                    'updated_at'    => date('Y-m-d h:i:s')
                ));
            }
        }
        echo $result;
    }


}