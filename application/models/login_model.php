<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();


    }

    public function login($userName, $pass) {
        if($userName != FALSE && $pass != FALSE) {
            $this->db->where('userName', $userName);
            $this->db->where('password', $pass);
            $this->db->where('estado', 1);
            
            $query = $this->db->get('vstcuentasusuarios');

            if($query->num_rows()>0){
                return $query->result_array();
            }
            return 0;
        }
    }
    private function Format_Consecutivo($Contador){

        return substr("00000", strlen ($Contador), 5).$Contador;

    }
    public function Send($lastid){


        $this->db->where('idCaso', $lastid);
        $qCaso = $this->db->get('vstsolicitudes');
        $Row_caso = $qCaso->result_array();

        $Arr = array();

        $IdR = $this->db->query("SELECT GROUP_CONCAT(Id_asignador)  as Id_Asignador FROM asignaciones WHERE Id_caso= '".$lastid."'");
        $Id_R = $IdR->result_array()[0]['Id_Asignador'];

        $qRemitidos = $this->db->query("SELECT Id_Remitidos,Nombre,Email FROM remitidos WHERE Id_Remitidos in (".$Id_R.")");
        $Arr[] = array(
            'array_Remitidos'   => $qRemitidos->result_array()
        );

        $lastid = $this->Format_Consecutivo($Row_caso[0]['idCaso']);




       $Plantilla ='
<!DOCTYPE html>
<html>
<head>
    
</head>
	<meta charset="UTF-8">
<style type="text/css">
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
  <td  align="left" valign="top" width="100%">
    <div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" class="container">
      <tr>
        <td height="10"></td>
      </tr>      

      <tr>
        <td valign="bottom" style="padding-left:35px;" class="center_img" align="center" width="200"><img src="http://cuali.publisa.com.ni/assets/images/Logo.png" alt="" width="200" height="auto" border="0" style="display:block;"/></a></td>
        <td width="145" class="mobile-hidden"></td>
        <td align="right" style="font: normal 13px Arial, Helvetica, sans-serif; color:gray; line-height:15px; padding-right:35px;" class="mobile-hidden" width="290"><em>INISER </em></td>
      </tr>
       
      <tr>
        <td height="10"></td>
      </tr>
    </table>
        <hr style="width:90%;">
    </div>
  </td>
</tr>

              <tr>
                <td align="center" style="border-bottom:solid 6px #000000; padding:30px 50px 20px;" class="body_padding">
                  <div align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td align="center" style="font:25px normal Helvetica, sans-serif; line-height:36px; color:#000000; padding:0px 0px 20px;" class="font22">FICHA DE OPORTUNIDAD
                        

                           <div align="left" style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000;" class="font14"><em>
                           <br>¡Hola! Se te ha asignado un caso <br><br>
                            Ticket #: '.$lastid.'
                        </em>
                        </div>

                        </td>
                      </tr>
                      <tr>
                        <td style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000; padding: 0px 0px 20px 0px;" class="font14">
                         <table  border="1" width="100%">
                          <tbody>
                          <tr>
                          <td style="width: 141px; text-align: center;">Nombres</td>
                          <td style="width: 142px; text-align: center;">Tel&eacute;fono</td>
                          <td style="width: 142px; text-align: center;">Email</td>
                          <td style="width: 144px; text-align: center;">Fecha</td>
                          </tr>
                          <tr>
                          <td style="width: 141px; text-align: center;">'.$Row_caso[0]['Nombres'].' '.$Row_caso[0]['Apellidos'].'</td>
                          <td style="width: 142px; text-align: center;">'.$Row_caso[0]['Telefono'].'</td>
                          <td style="width: 142px; text-align: center;">'.$Row_caso[0]['Correo'].'</td>
                          <td style="width: 144px; text-align: center;">'.$Row_caso[0]['created_at'].'</td>
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
                          <td style="width: 112px; text-align: center;">'.$Row_caso[0]['Id_Tipo'].'</td>
                          <td style="width: 112px; text-align: center;">'.$Row_caso[0]['Id_Categoria'].'</td>
                          <td style="width: 112px; text-align: center;">'.$Row_caso[0]['Id_Emite'].'</td>
                          <td style="width: 112px; text-align: center;">'.((!isset($Row_caso[0]['Id_Fuente'])) ? "N/D" : $Row_caso[0]['Id_Fuente']  ).'</td>
                          <td style="width: 112px; text-align: center;">'.$Row_caso[0]['Id_Ciudad'].'</td>
                          </tr>
                          </tbody>
                          </table>

                          <br>

                          <table border="1" width="100%">
                          <tbody>
                          <tr>
                          <td style="width: 578px;">
                          <div>
                              '.$Row_caso[0]['Comentarios'].'
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
                        <td align="left" style="font:13px normal Helvetica, sans-serif; line-height:18px; color:#000000;" class="font14">
                        <em>
                          Cordial,<br>
 
                         Equipo de mercadeo digital<br>
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


</body>
</html>
';
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();

        $qccEmail = $this->db->get('ccemail');
        foreach ($qccEmail->result_array() as $cckey )
        {
            $mail->AddCC(trim($cckey['emai']), $cckey['Nombre']);
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

        $mail->setFrom('cuali@publisa.com.ni', 'CUALI | PUBLISA');

        foreach ($Arr[0]['array_Remitidos'] as $array_Remitido) {
            $mail->addAddress($array_Remitido['Email'],$array_Remitido['Nombre']);
        }

        $mail->isHTML(true);
        $mail->Subject = 'CUALI  | '.$Row_caso[0]['Nombres'].' '.$Row_caso[0]['Apellidos'].' ';
        $mail->Body    = $Plantilla;

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 1;

        }
    }

    public function log_session($idUser) {
        $this->db->insert('log_sesion',array(
            'idUser' => $idUser,
            'fecha' => date('Y-m-d H:i:s')
        ));       
    }

    public function info_cliente($idUser) {
        $this->db->where('idUser', $idUser);
        $info_cliente=$this->db->get('usuarios');

        if ($info_cliente->num_rows()>0) {
            return $info_cliente->result_array();
        }else {
            return false;
        }
    }

    public function ultimoAcceso($idUser) {
        $ultimo_acceso=$this->db->query("SELECT * FROM log_sesion WHERE idUser='".$idUser."' ORDER BY id_log DESC LIMIT 1, 2;");

        if ($ultimo_acceso->num_rows()>0) {
            return $ultimo_acceso->result_array();
        }else {
            return false;
        }
    }
}