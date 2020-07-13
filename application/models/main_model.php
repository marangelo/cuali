<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class main_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('persona');

        require(APPPATH.'libraries\PHPMailer\Exception.php');
        require(APPPATH.'libraries\PHPMailer\PHPMailer.php');
        require(APPPATH.'libraries\PHPMailer\SMTP.php');
    }


    public function getResumen() {
        $data = array();
        $i=0;
        $this->db->where('estado', 1);
        if($this->session->userdata('rol')!="0") $this->db->where('id_usuario', $this->session->userdata('idUser'));
        $qCuentas = $this->db->get('vstsolicitudes');

        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $permisos = ($this->session->userdata('rol')=="0") ? '<i class="material-icons" onclick="Descartar('.$key['idCaso'].')">delete</i>' : "-" ;
                $data['data'][$i]['N']          = $this->Format_Consecutivo($key['idCaso']);
                $data['data'][$i]['CUENTA']   = $key['Id_Cuenta'];
                $data['data'][$i]['CLIENTE']     = '<a href="DetalleResumen/'.$key['idCaso'].'" >'.$key['Nombres'].' '.$key['Apellidos'].'</a>';
                $data['data'][$i]['REMITIDO']   = $key['Id_Asignado'];
                $data['data'][$i]['FUENTE']     = $key['Id_Fuente'];
                $data['data'][$i]['FECHA']      = date('d-m-Y', strtotime($key['created_at']));
                $data['data'][$i]['TIPO']       = $key['Id_Tipo'];
                $data['data'][$i]['Acc']        = $permisos;
                $i++;
            }
        }else{
            $data['data'][$i]['N']          = "";
            $data['data'][$i]['CUENTA']     = "";
            $data['data'][$i]['CLIENTE']     = "";
            $data['data'][$i]['REMITIDO']   = "";
            $data['data'][$i]['FUENTE']     = "";
            $data['data'][$i]['FECHA']      = "";
            $data['data'][$i]['TIPO']       = "";
            $data['data'][$i]['Acc']        = "";
        }


        echo json_encode($data);
    }
    public function BuscarSolicitud($f1 = "",$f2 = "") {
        $data = array();

        $i=0;

        $f1 = date('Y-m-d',strtotime($f1));
        $f2 = date('Y-m-d',strtotime($f2));

        $consulta ="SELECT * FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."' and estado='1' and id_usuario='".$this->session->userdata('idUser')."' ";

        $qCuentas = $this->db->query($consulta);
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){

                $permisos = ($this->session->userdata('rol')=="0") ? '<i class="material-icons" onclick="Descartar('.$key['idCaso'].')">delete</i>' : "-" ;


                $data['data'][$i]['N']          = $this->Format_Consecutivo($key['idCaso']);
                $data['data'][$i]['CUENTA']   = $key['Id_Cuenta'];
                $data['data'][$i]['CLIENTE']     = '<a href="DetalleResumen/'.$key['idCaso'].'" >'.$key['Nombres'].' '.$key['Apellidos'].'</a>';
                $data['data'][$i]['REMITIDO']   = $key['Id_Asignado'];
                $data['data'][$i]['FUENTE']     = $key['Id_Fuente'];
                $data['data'][$i]['FECHA']      = date('d-m-Y', strtotime($key['created_at']));
                $data['data'][$i]['TIPO']       = $key['Id_Tipo'];


                $data['data'][$i]['Acc']        = $permisos;


                $i++;
            }
        }else{
            $data['data'][$i]['N']          = "";
            $data['data'][$i]['CUENTA']     = "";
            $data['data'][$i]['CLIENTE']     = "";
            $data['data'][$i]['REMITIDO']   = "";
            $data['data'][$i]['FUENTE']     = "";
            $data['data'][$i]['FECHA']      = "";
            $data['data'][$i]['TIPO']       = "";
            $data['data'][$i]['Acc']        = "";
        }


        echo json_encode($data);
    }
    public function Info_Nuevo_Caso() {
        $json = array();

        $where_in = explode(',', $this->session->userdata('Permisos'));
        $this->db->where('estado', 1);
        $this->db->where_in('Id_Cuenta', $where_in);
        $qCuentas = $this->db->get('cuentas');

        $this->db->where('estado', 1);
        $qTipos = $this->db->get('tipos');

        $this->db->where('estado', 1);
        $qFuentes = $this->db->get('fuentes');

        $qCiudades = $this->db->get('ciudades');



        $json[] = array(
            'array_Cuentas'  => $qCuentas->result_array(),
            'array_Tipos'    => $qTipos->result_array(),
            'array_Fuentes'  => $qFuentes->result_array(),
            'array_Ciudades' => $qCiudades->result_array()
        );


        return $json;
    }
    public function DetalleResumen($Id) {
        $json = array();

        $this->db->where('idCaso', $Id);
        $qCaso = $this->db->get('vstsolicitudes');

        $this->db->order_by("Created_at", "desc");
        $this->db->where('IdCaso', $Id);
        $qComentarios = $this->db->get('comentarios');

        $json[] = array(
            'array_Caso'    => $qCaso->result_array(),
            'array_Comentario' => $qComentarios->result_array()
        );
        return $json;
    }
    private function Format_Consecutivo($Contador){

        return substr("00000", strlen ($Contador), 5).$Contador;

    }
    public function config() {

        $Arr = array();
        $qTipos = $this->db->query("SELECT * FROM tipos WHERE estado ='1'");
        $qFuentes = $this->db->query("SELECT * FROM fuentes WHERE estado ='1'");

        $Arr[] = array(
            'array_Tipos' => $qTipos->result_array(),
            'array_Fuentes' => $qFuentes->result_array()
        );
        return $Arr;
    }
    function infoMail($IdC,$IdR,$IdF,$IdT,$IdCiudad) {

        $IdR = substr($IdR, 0, -1);

        $Arr = array();
        $qTipos     = $this->db->query("SELECT tpNombre FROM tipos WHERE IdTipos ='".$IdT."'");
        $qFuentes   = $this->db->query("SELECT fNombre FROM fuentes WHERE idFuentes ='".$IdF."'");
        $qCategoria = $this->db->query("SELECT Nombre FROM categorias WHERE Id_Categorias ='".$IdC."'");
        $qRemitidos = $this->db->query("SELECT Id_Remitidos,Nombre,Email FROM remitidos WHERE Id_Remitidos in (".$IdR.")");
        $qCiudad    = $this->db->query("SELECT NombreCiudad FROM ciudades WHERE IdCiudad ='".$IdCiudad."'");
        $Arr[] = array(
            'array_Tipos'       => $qTipos->result_array(),
            'array_Fuentes'     => $qFuentes->result_array(),
            'array_Categoria'   => $qCategoria->result_array(),
            'array_Remitidos'   => $qRemitidos->result_array(),
            'array_Ciudad'      => $qCiudad->result_array()
        );
        return $Arr;
    }
    public function SaveSolicitud($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $Fecha = date('Y-m-d', strtotime(str_replace('/', '-', $key['mFecha'])));
                $info = $this->infoMail($key['mCategoria'],$key['mRemitido'],$key['mFuente'],$key['mTipo'],$key['mCiudad']);
                $result=   $this->db->insert('casos', array(
                    'Nombres'       => $key['mNombre'],
                    'Apellidos'     => $key['mApellido'],
                    'Telefono'      => ($key['mTelefono']=="")? "0" : $key['mTelefono'],
                    'Correo'        => ($key['mCorreo']=="")? "nd@corre.com" : $key['mCorreo'],
                    'Id_Cuenta'     => $key['mCuenta'],
                    'Id_Fuente'     => $key['mFuente'],
                    'Id_Tipo'       => $key['mTipo'],
                    'Id_Categoria'  => $key['mCategoria'],
                    'Comentarios'   => $key['mComentario'],
                    'Id_Ciudad'     => $key['mCiudad'],
                    'Monto'         => $key['mMonto'],
                    'created_at'    => $Fecha,
                    'updated_at'    => date('Y-m-d h:i:s'),
                    'id_usuario'    => $this->session->userdata('idUser'),
                    'estado'        => 1
                ));
                $idInsert = $this->db->insert_id();

                $data = array();
                foreach ($info[0]['array_Remitidos'] as $array_Remitido) {
                    $data[]=
                        array(
                            'Id_asignador' =>$array_Remitido['Id_Remitidos'],
                            'Id_caso' => $idInsert
                        );
                }
                $this->db->insert_batch('asignaciones', $data);


                //SERVICIO DE ENVIO DE EMAIL
                $this->curlPost('http://186.1.15.164:8448/cuali_send_email/index.php/send', [
                    'Id' => $idInsert,
                ]);

            }
        }

        echo $result;

    }

    public function get_casos(){
        $this->db->where('estado', 1);
        $query = $this->db->get('vstsolicitudes');

        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function get_user_ticket($ticket_id){
        $this->db->where('idCaso', $ticket_id);
        $query = $this->db->get('vstsolicitudes');
        return ($query->num_rows() == 1)?$query->row_array():FALSE;
    }
    public function get_replies($ticket_id){
        $this->db->where('IdCaso', $ticket_id);
        $query = $this->db->get('comentarios');
        return ($query->num_rows() > 0)?$query->result_array():FALSE;

    }


    private function curlPost($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error !== '') {
            throw new \Exception($error);
        }

        return $response;
    }

    public function DescartarSolicitud($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $this->db->where('idCaso', $key['mID']);
                $result = $this->db->update('casos', array(
                    'estado' => 0,
                    'updated_at'    => date('Y-m-d h:i:s')
                ));
            }
        }
        echo $result;
    }

    public function SaveComentario($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $result=   $this->db->insert('comentarios', array(
                    'IdCaso'        => $key['mID'],
                    'Comentario'   => $key['mComentario'],
                    'Created_at'    => date('Y-m-d h:i:S'),
                    'Id_Usuario'    => $this->session->userdata('idUser'),
                    'Name_Usuario'    => $this->session->userdata('userName')
                ));
            }
        }
        echo $result;
    }
}