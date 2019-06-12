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

                $retVal = ($key['estado']=="1") ? " [ Activa ]" : " [ Inactiva ]" ;
                $rColor = ($key['estado']=="1") ? "#1db954" : "#f27474" ;
                $Icon = ($key['estado']=="1") ? "done" : "clear" ;

                $data['data'][$i]['N']       = $key['Id_Cuenta'];
                $data['data'][$i]['CUENTA']  = '<a href="CuentaDetalle/'.$key['Id_Cuenta'].'" >'.$key['Nombre'].'</a>'.'<span style="color: '.$rColor.'">'.$retVal.'</span>';
                $data['data'][$i]['FECHA']   = $key['created_at'];
                $data['data'][$i]['Acc']   = '<i class="material-icons">edit</i>  <i class="material-icons">delete</i>';
                $data['data'][$i]['Acc']   = "<a href='#!' onclick='OpenModal(".'"edit"'.",".$key['Id_Cuenta'].")'> <i class='material-icons'>edit</i></a> 
                                              <a href='#!' onclick='Descartar(".$key['Id_Cuenta'].','.$key['estado'].")'> <i class='material-icons' style='color:$rColor'>".$Icon."</i> </a> ";
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
        $qCategorias = $this->db->query("SELECT * FROM categorias WHERE Id_Cuenta ='".$Id."' and estado='1'");
        $qRemitidos = $this->db->query("SELECT * FROM remitidos WHERE Id_Cuenta ='".$Id."' and estado='1'");
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
        $qCategorias = $this->db->query("SELECT * FROM categorias WHERE Id_Cuenta ='".$Id."' and estado='1'");
        $qRemitidos = $this->db->query("SELECT * FROM remitidos WHERE Id_Cuenta ='".$Id."' and estado='1'");
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

                $retVal = ($key['mEstado']=="1") ? 0 : 1 ;

                $this->db->where('Id_Cuenta', $key['mIdCuenta']);
                $result = $this->db->update('cuentas', array(
                    'estado' => $retVal,
                    'updated_at'    => date('Y-m-d h:i:s')
                ));
            }
        }
        echo $result;
    }
    public function DescargarParametro($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                if($key['mFormulario']=="delete_categoria"){
                    $this->db->where('Id_Categorias', $key['mIdCuenta']);
                    $result = $this->db->update('categorias', array(
                        'estado' => 0,
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));
                }else{
                    $this->db->where('Id_Remitidos', $key['mIdCuenta']);
                    $result = $this->db->update('remitidos', array(
                        'estado' => 0,
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));
                }
            }
        }
        echo $result;
    }
    public function DescartarTipo($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                if($key['slFlag']=="F"){
                    $this->db->where('idFuentes', $key['mIdTipo']);
                    $result = $this->db->update('fuentes', array(
                        'estado' => 0,
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));
                }else{
                    $this->db->where('IdTipos', $key['mIdTipo']);
                    $result = $this->db->update('tipos', array(
                        'estado' => 0,
                        'updated_at'    => date('Y-m-d h:i:s')
                    ));
                }
            }
        }
        echo $result;
    }
    public function SaveParametro($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                if($key['slFlag']=="T"){
                    $result = $this->db->insert('tipos', array(
                        'tpNombre'        => $key['mTipo'],
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),
                        'id_usuario'    => $this->session->userdata('idUser'),
                        'estado'        => 1
                    ));
                }else{
                    $result = $this->db->insert('fuentes', array(
                        'fNombre'        => $key['mTipo'],
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),
                        'id_usuario'    => $this->session->userdata('idUser'),
                        'estado'        => 1
                    ));
                }
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
    public function SaveParametrosCuenta($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){

                if($key['mFormulario']=="CAT"){
                    $result = $this->db->insert('categorias', array(
                        'Nombre'        => $key['mCategoria'],
                        'Id_Cuenta'     => $key['mId'],
                        'created_at'    => date('Y-m-d h:i:s'),
                        'updated_at'    => date('Y-m-d h:i:s'),
                        'estado'        => 1,
                        'id_usuario'    => $this->session->userdata('idUser')
                    ));
                }elseif($key['mFormulario']=="REM"){
                    if($key['mFrmAccion']=="N"){
                        $result = $this->db->insert('remitidos', array(
                            'Nombre'        => $key['mRemitidoNombre'],
                            'Email'         => $key['mRemitidoEmail'],
                            'Cargo'         => $key['mRemitidoCargo'],
                            'Id_Cuenta'     => $key['mId'],
                            'created_at'    => date('Y-m-d h:i:s'),
                            'updated_at'    => date('Y-m-d h:i:s'),
                            'estado'        => 1,
                            'id_usuario'    => $this->session->userdata('idUser')
                        ));
                    }elseif($key['mFrmAccion']=="E"){
                        $this->db->where('Id_Remitidos', $key['mIdCat']);
                        $result = $this->db->update('remitidos',  array(
                            'Nombre'        => $key['mRemitidoNombre'],
                            'Email'         => $key['mRemitidoEmail'],
                            'Cargo'         => $key['mRemitidoCargo'],
                            'updated_at'    => date('Y-m-d h:i:s')
                        ));
                    }


                }

            }
        }
        echo $result;
    }

}