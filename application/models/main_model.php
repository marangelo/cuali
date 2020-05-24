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
                    'Telefono'      => $key['mTelefono'],
                    'Correo'        => $key['mCorreo'],
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
                $lastid = $this->Format_Consecutivo($idInsert);

                $data = array();
                foreach ($info[0]['array_Remitidos'] as $array_Remitido) {
                    $data[]=
                        array(
                            'Id_asignador' =>$array_Remitido['Id_Remitidos'],
                            'Id_caso' => $idInsert
                        );
                }
                $this->db->insert_batch('asignaciones', $data);

                $Plantilla ='<style type="text/css">
.ReadMsgBody {
	width: 100%;
}
.ExternalClass {
	width: 100%;
}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
	line-height: 100%;
}
p {
	margin: 1em 0;
}
body, table, td, a {
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
}
table, td {
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt;
}
img {
	-ms-interpolation-mode: bicubic;
}
@-ms-viewport {
width: device-width;
}
body {
	margin: 0;
	padding: 0;
}
img {
	border: 0;
	height: auto;
	line-height: 100%;
	outline: none;
	text-decoration: none;
}

table, td {
	border-collapse: collapse !important;
}
body {
	height: 100% !important;
	margin: 0;
	padding: 0;
	width: 100% !important;
}
</style>

<style type="text/css">
 @media only screen and (max-width: 480px) {
.container {
 width: 320px !important;
 min-width: 100%!important;
}
.mobile-hidden {
 display: none !important;
}
.mobileonly  {
 display: block !important;
 width: 100% !important;
 height: auto !important;
 padding: 0;
 max-height: inherit !important;
 overflow: visible !important;
}
.mobile_stats {
display: block !important;
width: auto !important;
height: auto !important;
padding: 0;
max-height: inherit !important;
overflow: visible !important;
}
.paddingnone {
 padding:0px !important;
}
#houdini {
 display: none !important;
}
.footer_padding] {
 padding: 20px !important;
} 
.center_img {
 width: 100% !important;
 padding: 0 !important;
}
.body_padding {
 padding:30px 20px 20px !important;
}
.font22 {
 font-size:22px;
 line-height:27px;
}
.font14 {
 font-size:14px !important;
 line-height:19px !important;
}
.hero_img {
  width: 100% !important;
  height: auto !important;
}
}
</style>
</head>
<body><style type="text/css">
div.preheader 
{ display: none !important; } 
</style>
<div class="preheader" style="font-size: 1px; display: none !important;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ebebeb">
  <tr>
    <td align="center" valign="top" width="100%" bgcolor="#ebebeb">
      <table border="0" class="container" cellpadding="0" cellspacing="0" width="550" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top" width="100%">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
  <td bgcolor="#00AA6C" align="left" valign="top" width="100%">
    <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" class="container" bgcolor="#00AA6C">
      <tr>
        <td height="10"></td>
      </tr>      

      <tr>
        <td valign="bottom" style="padding-left:35px;" class="center_img" align="center" width="200"><img src="http://cuali.publisa.com.ni/assets/images/Logo.png" alt="" width="200" height="auto" border="0" style="display:block;"/></a></td>
        <td width="145" class="mobile-hidden"></td>
        <td align="right" style="font: normal 13px Arial, Helvetica, sans-serif; color:#ffffff; line-height:15px; padding-right:35px;" class="mobile-hidden" width="290"><em>CUALI | PUBLISA </em></td>
      </tr>
       
      <tr>
        <td height="10"></td>
      </tr>
    </table>
    </div>
  </td>
</tr>

              <tr>
                <td align="center" style="border-bottom:solid 6px #000000; padding:30px 50px 20px;" class="body_padding">
                  <div align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td align="left" style="font:25px normal Helvetica, sans-serif; line-height:36px; color:#000000; padding:0px 0px 20px;" class="font22">FICHA DE OPORTUNIDAD
                        

                           <div align="left" style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000;" class="font14"><em>
                           <br>¡Hola! Se te ha asignado un caso <br><br>
                            Ticket #: '.$lastid.'
                        </em>
                        </div>

                        </td>
                      </tr>
                      <tr>
                        <td style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000; padding: 0px 0px 20px 0px;" class="font14">
                         <table style="height: 48px;" border="1" width="597">
                          <tbody>
                          <tr>
                          <td style="width: 141px; text-align: center;">Nombres</td>
                          <td style="width: 142px; text-align: center;">Tel&eacute;fono</td>
                          <td style="width: 142px; text-align: center;">Email</td>
                          <td style="width: 144px; text-align: center;">Fecha</td>
                          </tr>
                          <tr>
                          <td style="width: 141px; text-align: center;">'.$key['mNombre'].' '.$key['mApellido'].'</td>
                          <td style="width: 142px; text-align: center;">'.$key['mTelefono'].'</td>
                          <td style="width: 142px; text-align: center;">'.$key['mCorreo'].'</td>
                          <td style="width: 144px; text-align: center;">'.date('d-m-Y h:i:s').'</td>
                          </tr>
                          </tbody>
                          </table>

                          <br>

                          <table style="height: 45px;" border="1" width="594">
                          <tbody>
                          <tr>
                          <td style="width: 112px; text-align: center;">Tipo</td>
                          <td style="width: 112px; text-align: center;">Categor&iacute;a</td>
                          <td style="width: 112px; text-align: center;">Emite</td>
                          <td style="width: 112px; text-align: center;">Fuente</td>
                          <td style="width: 112px; text-align: center;">
                          <div>Departamento</div>
                          </td>
                          </tr>
                          <tr>
                          <td style="width: 112px; text-align: center;">'.$info[0]['array_Tipos'][0]['tpNombre'].'</td>
                          <td style="width: 112px; text-align: center;">'.$info[0]['array_Categoria'][0]['Nombre'].'</td>
                          <td style="width: 112px; text-align: center;">'.$this->session->userdata('nombre').'</td>
                          <td style="width: 112px; text-align: center;">'.((!isset($info[0]['array_Fuentes'][0]['fNombre'])) ? "N/D" : $info[0]['array_Fuentes'][0]['fNombre']  ).'</td>
                          <td style="width: 112px; text-align: center;">'.$info[0]['array_Ciudad'][0]['NombreCiudad'].'</td>
                          </tr>
                          </tbody>
                          </table>

                          <br>

                          <table style="height: 132px;" border="1" width="588">
                          <tbody>
                          <tr>
                          <td style="width: 578px;">
                          <div>
                              '.$key['mComentario'].'
                          </td>
                          </tr>
                          </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding:20px 0px;">
                         
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000;" class="font14"><em>
                          Cordial,<br>
 
                          Equipo de mercadeo digital
                          Publicidad Integral<br>
                          <a href="mailto:mercadeo@publisa.com.ni">mercadeo@publisa.com.ni</a>
                        </em>
                        </td>
                      </tr>
                    </table>        
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        
      </table>
    </td>
  </tr>
</table>
</body>
</html>


</body>
</html>
';




                /*$mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();

                $qccEmail = $this->db->get('ccemail');
                foreach ($qccEmail->result_array() as $key )
                {
                    $mail->AddCC(trim($key['emai']), $key['Nombre']);
                }




                $mail->Host = 'smtp.netfirms.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'cuali@publisa.com.ni';
                $mail->Password = 'Cu4l1_Publ1s4$';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                //Recipients
                $mail->setFrom('cuali@publisa.com.ni', 'CUALI | PUBLISA');

                foreach ($info[0]['array_Remitidos'] as $array_Remitido) {
                    $mail->addAddress($array_Remitido['Email'],$array_Remitido['Nombre']);
                }



                //$mail->addAttachment('./data/colillas/'.$nomQna.'/'.$cod.'.pdf');

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'CUALI  | '.$key['mNombre'].' '.$key['mApellido'].' ';
                $mail->Body    = $Plantilla;

                $mail->send();*/
            }
        }

        echo $result;
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