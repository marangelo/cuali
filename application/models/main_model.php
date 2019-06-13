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
                $data['data'][$i]['CUENTA']     = '<a href="DetalleResumen/'.$key['idCaso'].'" >'.$key['Nombres'].' '.$key['Apellidos'].'</a>';
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
                $data['data'][$i]['CUENTA']     = '<a href="DetalleResumen/'.$key['idCaso'].'" >'.$key['Nombres'].' '.$key['Apellidos'].'</a>';
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
    function infoMail($IdC,$IdR,$IdF,$IdT) {

        $Arr = array();
        $qTipos = $this->db->query("SELECT tpNombre FROM tipos WHERE IdTipos ='".$IdT."'");
        $qFuentes = $this->db->query("SELECT fNombre FROM fuentes WHERE idFuentes ='".$IdF."'");
        $qCategoria = $this->db->query("SELECT Nombre FROM categorias WHERE Id_Categorias ='".$IdC."'");
        $qRemitidos = $this->db->query("SELECT Nombre,Email FROM remitidos WHERE Id_Remitidos ='".$IdR."'");

        $Arr[] = array(
            'array_Tipos'       => $qTipos->result_array(),
            'array_Fuentes'     => $qFuentes->result_array(),
            'array_Categoria'   => $qCategoria->result_array(),
            'array_Remitidos'   => $qRemitidos->result_array()
        );
        return $Arr;
    }
    public function SaveSolicitud($data) {
        $result=false;
        if (count($data)>0) {
            foreach ($data as $key){
                $Fecha = date('Y-m-d', strtotime(str_replace('/', '-', $key['mFecha'])));
                $info = $this->infoMail($key['mCategoria'],$key['mRemitido'],$key['mFuente'],$key['mTipo']);
                $result=   $this->db->insert('casos', array(
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
                    'Id_Ciudad'     => $key['mCiudad'],
                    'Monto'         => $key['mMonto'],
                    'created_at'    => $Fecha,
                    'updated_at'    => date('Y-m-d h:i:s'),
                    'id_usuario'    => $this->session->userdata('idUser'),
                    'estado'        => 1
                ));

                $Plantilla ='<!doctype html>
<html lang="es">
<head>
	<title>COLILLA DE PAGO</title>
	<style>
		body {
		    color: #000;    
		    font-family: "Verdana";
		    font-size: 10px;
		}

		table {
		  border-spacing: 1px;
		}

		.center {
			text-align: center;
			border-right: 1px solid black
		}

		.left {
			text-align: left;
			border-right: 1px solid black
		}

		.bold {			
			font-weight: bold
		}

		.border {
			border: 1px solid black;
		}

		table#tbl_1 td {
		  border: 0px solid #0000;
		  border-collapse: collapse;
		  text-align: center;
		}

		table#tbl_2, td {
			padding: 1px 10px 0px 10px;
			border-collapse: collapse;
		}

		table#tbl_2 {

			border: 1px solid black;

			border-collapse: collapse;
		}

		.contenedor {
			width: 90%;
			height: 100%;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="contenedor">
		<div style="margin-bottom: 20px; margin-top: 20px">			
					<table id="tbl_1" style="width:100%">
					  <tr>
					    <td colspan="4" style="font-weight: bold">GSM - NICARAGUA <br> FICHA DE OPORTUNIDAD</td>
					  </tr>
					  <tr>
					    <td colspan="4" style="text-align: left;!important; text-transform: uppercase; text-decoration: underline;"><br></td>
					  </tr>
					  <tr>
					    <td class="bold">Nombres y Apelllidos:</td>					     
					    <td class="bold">Telefono:</td>
					    <td class="bold" >Email:</td>
					    <td class="bold">Fecha</td>
					  </tr>
					  <tr>
					    <td class="center">'.$key['mNombre'].' '.$key['mApellido'].'</td>
					    <td class="center">'.$key['mTelefono'].'</td>					    
					    <td class="center">'.$key['mCorreo'].'</td>
					    <td class="center">'.date('d-m-Y h:i:s').'</td>
					  </tr>
					    <tr>
					    <td colspan="4" style="text-align: left;!important; text-transform: uppercase; text-decoration: underline;"><br></td>
					  </tr>
					  <tr>
					    <td class="bold">Categoria:</td>
					    <td class="bold">Emite</td>
					    <td class="bold">Tipo</td>
					    <td class="bold">Fuente</td>
					  </tr>
					  <tr>
					    <td class="center">'.$info[0]['array_Categoria'][0]['Nombre'].'</td>
					    <td class="center">'.$this->session->userdata('nombre').'</td> 
					    <td class="center">'.$info[0]['array_Tipos'][0]['tpNombre'].'</td>
					    <td class="center">'.$info[0]['array_Fuentes'][0]['fNombre'].'</td>
					  </tr>
					</table>
					<br>
					<table id="tbl_2" style="width:100%"><tr><td>'.$key['mComentario'].'</strong></td></tr></table>					    
		</div>
	</div>
</body>
</html>';
                $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'analista.guma@gmail.com';
                $mail->Password = 'a7m1425.';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                //Recipients
                $mail->setFrom('noreply@company.com', 'GSM - NICARAGUA');
                $mail->addAddress($info[0]['array_Remitidos'][0]['Email'],$info[0]['array_Remitidos'][0]['Nombre']);

                //$mail->addAttachment('./data/colillas/'.$nomQna.'/'.$cod.'.pdf');

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'GSM  - CUALI';
                $mail->Body    = $Plantilla;

                $mail->send();
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