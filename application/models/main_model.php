<?php 
class main_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');
    }


    public function getResumen() {
        $data = array();
        $i=0;
        $qCuentas = $this->db->get('casos');
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $data['data'][$i]['N']          = $this->Format_Consecutivo($key['idCaso']);
                $data['data'][$i]['CUENTA']     = '<a href="DetalleResumen/'.$key['idCaso'].'" >'.$key['Nombres'].' '.$key['Apellidos'].'</a>';
                $data['data'][$i]['REMITIDO']   = $key['Id_Asignado'];;
                $data['data'][$i]['FUENTE']     = $key['Id_Fuente'];;
                $data['data'][$i]['FECHA']      = $key['created_at'];
                $data['data'][$i]['HORA']       = $key['created_at'];;
                $data['data'][$i]['Acc']        = '<i class="material-icons">visibility</i>  <i class="material-icons">delete</i>';
                $i++;
            }
        }else{
            $data['data'][$i]['N']          = "";
            $data['data'][$i]['CUENTA']     = "";
            $data['data'][$i]['REMITIDO']   = "";
            $data['data'][$i]['FUENTE']     = "";
            $data['data'][$i]['FECHA']      = "";
            $data['data'][$i]['HORA']       = "";
            $data['data'][$i]['Acc']        = "";
        }


        echo json_encode($data);
    }
    public function Info_Nuevo_Caso() {
        $json = array();
        $qCount = $this->db->get('casos');
        $qCuentas = $this->db->get('cuentas');
        $qTipos = $this->db->get('tipos');
        $qFuentes = $this->db->get('fuentes');

        $Contador =  $this->Format_Consecutivo($qCount->num_rows() + 1);


        $json[] = array(
            'array_Cont'    => $Contador,
            'array_Cuentas' => $qCuentas->result_array(),
            'array_Tipos'   => $qTipos->result_array(),
            'array_Fuentes' => $qFuentes->result_array()
        );
        return $json;
    }
    private function Format_Consecutivo($Contador){

        return substr("00000", strlen ($Contador), 5).$Contador;

    }
    public function config() {

        $Arr = array();
        $qTipos = $this->db->query("SELECT * FROM tipos ");
        $qFuentes = $this->db->query("SELECT * FROM fuentes ");

        $Arr[] = array(
            'array_Tipos' => $qTipos->result_array(),
            'array_Fuentes' => $qFuentes->result_array()
        );
        return $Arr;
    }


    public function SaveSolicitud($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){

                $Fecha = date('Y-m-d', strtotime(str_replace('/', '-', $key['mFecha'])));

                $result=   $this->db->insert('casos', array(
                    'idCaso'        => $key['mID'],
                    'Nombres'       => $key['mNombre'],
                    'Apellidos'     => $key['mApellido'],
                    'Telefono'      => $key['mTelefono'],
                    'Correo'        => $key['mCorreo'],
                    'Id_Cuenta'     => $key['mCuenta'],
                    'Id_Fuente'     => $key['mFuente'],
                    'Id_Tipo'       => $key['mTipo'],
                    'Id_Categoria'  => $key['mCategoria'],
                    'Id_Asignado'   => $key['mRemitido'],
                    'Comentarios'   => $key['mComentario'],
                    'created_at'    => $Fecha,
                    'updated_at'    => date('Y-m-d'),
                    'id_usuario'    => $this->session->userdata('idUser')
                ));
            }
        }
        echo $result;
    }
}