<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class reportes_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        include(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php');
        $this->load->library('persona');

    }
    public function Buscar_Solicitud_reporte($f1,$f2,$Cu,$Ca,$Ti,$As,$Ci) {
        $data = array();

        $i=0;

        $f1 = date('Y-m-d',strtotime($f1));
        $f2 = date('Y-m-d',strtotime($f2));

        $consulta ="SELECT * FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";
        $consulta .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $consulta .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $consulta .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $consulta .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $consulta .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;




        $qCuentas = $this->db->query($consulta);
        if($qCuentas->num_rows() > 0 ) {
            foreach ($qCuentas->result_array() as $key){
                $data['data'][$i]['N']          = $this->Format_Consecutivo($key['idCaso']);
                $data['data'][$i]['FECHA']      = date('d-m-Y', strtotime($key['created_at']));
                $data['data'][$i]['CUENTA']   = $key['Id_Cuenta'];
                $data['data'][$i]['CLIENTE']     = $key['Nombres'].' '.$key['Apellidos'];
                $data['data'][$i]['ASIGNADO']   = $key['Id_Asignado'];
                $data['data'][$i]['EMITIDO']   = $key['Id_Emite'];
                $data['data'][$i]['TIPO']     = $key['Id_Tipo'];
                $data['data'][$i]['CATEGORIA']       = $key['Id_Categoria'];
                $data['data'][$i]['CIUDAD']        = $key['Id_Ciudad'];


                $i++;
            }
        }else{
            $data['data'][$i]['N']          = "";
            $data['data'][$i]['FECHA']      = "";
            $data['data'][$i]['CUENTA']      = "";
            $data['data'][$i]['CLIENTE']    = "";
            $data['data'][$i]['ASIGNADO']   = "";
            $data['data'][$i]['TIPO']       = "";
            $data['data'][$i]['CATEGORIA']  = "";
            $data['data'][$i]['CIUDAD']     = "";
        }

        $qTipo ="SELECT Id_Tipo,count(Id_Tipo) as Count_Tipo FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."' ";
        $qTipo .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $qTipo .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $qTipo .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $qTipo .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $qTipo .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;
        $qTipo .= ' GROUP BY T0.Id_Tipo';

        $rTipo = $this->db->query($qTipo);
        $t = 0;
        if($rTipo->num_rows() > 0 ) {
            foreach ($rTipo->result_array() as $key){
                $data['Tipos'][$t]['name']       = $key['Id_Tipo'];
                $data['Tipos'][$t]['y']         = floatval($key['Count_Tipo']);
                $t++;
            }
        }else{
            $data['Tipos'][$t]['name']     = "";
            $data['Tipos'][$t]['y']        = 0;
        }


        $qCuid ="SELECT Id_Ciudad,count(Id_Ciudad) as Count_Ciudad FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";
        $qCuid .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $qCuid .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $qCuid .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $qCuid .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $qCuid .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;
        $qCuid .= ' GROUP BY T0.Id_Ciudad';

        $rCuid = $this->db->query($qCuid);
        $c = 0;
        if($rCuid->num_rows() > 0 ) {
            foreach ($rCuid->result_array() as $key){
                $data['Ciudad'][$c]['name']     = $key['Id_Ciudad'];
                $data['Ciudad'][$c]['y']        = floatval($key['Count_Ciudad']);
                $c++;
            }
        }else{
            $data['Ciudad'][$c]['name']       = "";
            $data['Ciudad'][$c]['y']          = 0;
        }


        $qAsig ="SELECT Id_Asignado,count(Id_Asignado) as Count_Asignado FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";
        $qAsig .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $qAsig .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $qAsig .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $qAsig .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $qAsig .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;
        $qAsig .= ' GROUP BY T0.Id_Asignado';

        $rAsig = $this->db->query($qAsig);

        $a=0;
        if($rAsig->num_rows() > 0 ) {
            foreach ($rAsig->result_array() as $key){
                $data['Asignada'][$a]['Id_Asignado']       = $key['Id_Asignado'];
                $data['Asignada'][$a]['Count_Asignado']    = floatval($key['Count_Asignado']);
                $a++;
            }
        }else{
            $data['Asignada'][$c]['Id_Asignado']       = "";
            $data['Asignada'][$c]['Count_Asignado']    = 0;
        }


        $qDias ="SELECT created_at,count(Id_Asignado) as Count_Dia FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";
        $qDias .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $qDias .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $qDias .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $qDias .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $qDias .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;
        $qDias .= " GROUP BY T0.created_at";

        $rDias = $this->db->query($qDias);
        $a=0;
        if($rDias->num_rows() > 0 ) {
            foreach ($rDias->result_array() as $key){
                $data['Dias'][$a]['created_at']  = $key['created_at'];
                $data['Dias'][$a]['Count_Dia']   = floatval($key['Count_Dia']);
                $a++;
            }
        }else{
            $data['Dias'][$c]['created_at']      = "";
            $data['Dias'][$c]['Count_Dia']       = 0;
        }

        echo json_encode($data);
    }
    public function Buscar_Solicitud_reporte_Excel($f1,$f2,$Cu,$Ca,$Ti,$As,$Ci) {

        $f1 = date('Y-m-d',strtotime($f1));
        $f2 = date('Y-m-d',strtotime($f2));

        $consulta ="SELECT * FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";
        $consulta .= ($Cu=="ND") ? "" : " AND T0.IdCuenta='".$Cu."'" ;
        $consulta .= ($Ca=="ND") ? "" : " AND T0.IdCat='".$Ca."'" ;
        $consulta .= ($Ti=="ND") ? "" : " AND T0.IdTipo='".$Ti."'" ;
        $consulta .= ($As=="ND") ? "" : " AND T0.IdAsig='".$As."'" ;
        $consulta .= ($Ci=="ND") ? "" : " AND T0.IdCiudad='".$Ci."'" ;


        $resultado = $this->db->query($consulta);



        if($resultado->num_rows() > 0 ) {

            $objPHPExcel = new PHPExcel();

            $tituloReporte = "Reporte de CUALI | PUBLISA";
            $titulosColumnas = array('Nº','FECHA','CUENTA','CLIENTE','ASIGNADO','TIPO','CATEGORIA','CIUDAD');

            $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:H1');


            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1',$tituloReporte)
                ->setCellValue('A3',  $titulosColumnas[0])
                ->setCellValue('B3',  $titulosColumnas[1])
                ->setCellValue('C3',  $titulosColumnas[2])
                ->setCellValue('D3',  $titulosColumnas[3])
                ->setCellValue('E3',  $titulosColumnas[4])
                ->setCellValue('F3',  $titulosColumnas[5])
                ->setCellValue('G3',  $titulosColumnas[6])
                ->setCellValue('H3',  $titulosColumnas[7]);
            $i=4;
            foreach ($resultado->result_array() as $key) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $this->Format_Consecutivo($key['idCaso']))
                    ->setCellValue('B'.$i, date('d-m-Y', strtotime($key['created_at'])))
                    ->setCellValue('C'.$i,  $key['Id_Cuenta'])
                    ->setCellValue('D'.$i,  $key['Nombres'].' '.$key['Apellidos'])
                    ->setCellValue('E'.$i,  $key['Id_Asignado'])
                    ->setCellValue('F'.$i,  $key['Id_Tipo'])
                    ->setCellValue('G'.$i,  $key['Id_Categoria'])
                    ->setCellValue('H'.$i,  $key['Id_Ciudad']);
                $i++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Verdana',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size' =>18,
                    'color'     => array(
                        'rgb' => '212121'
                    )
                ),
                'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'       => TRUE,
                )
            );

            $estiloTituloColumnas = array(
                'font' => array(
                    'name'      => 'Arial',
                    'bold'      => true
                ),
                'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
                ));

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray(
                array(
                    'font' => array(
                        'name'      => 'Arial',
                        'size' => 11
                    )
                ));
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);

            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:E".($i-1));

            $objPHPExcel->getActiveSheet()->setTitle('Reporte CUALI | PUBLISA');

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet(0)->freezePane('A4');
            $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Reporte de '.$f1.' Hasta '.$f2.'.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');



        }
        else{
            print_r('No hay resultados para mostrar');
        }
    }

    public function Solicitud_reporte_Excel($f1,$f2) {

        $f1 = date('Y-m-d',strtotime($f1));
        $f2 = date('Y-m-d',strtotime($f2));

        $consulta ="SELECT * FROM vstsolicitudes T0  WHERE T0.created_at BETWEEN '".$f1."' AND '".$f2."'";



        $resultado = $this->db->query($consulta);



        if($resultado->num_rows() > 0 ) {

            $objPHPExcel = new PHPExcel();

            $tituloReporte = "Reporte de CUALI | PUBLISA";
            $titulosColumnas = array('Nº','FECHA','CUENTA','CLIENTE','ASIGNADO','TIPO','CATEGORIA','CIUDAD');

            $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A1:H1');


            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1',$tituloReporte)
                ->setCellValue('A3',  $titulosColumnas[0])
                ->setCellValue('B3',  $titulosColumnas[1])
                ->setCellValue('C3',  $titulosColumnas[2])
                ->setCellValue('D3',  $titulosColumnas[3])
                ->setCellValue('E3',  $titulosColumnas[4])
                ->setCellValue('F3',  $titulosColumnas[5])
                ->setCellValue('G3',  $titulosColumnas[6])
                ->setCellValue('H3',  $titulosColumnas[7]);
            $i=4;
            foreach ($resultado->result_array() as $key) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $this->Format_Consecutivo($key['idCaso']))
                    ->setCellValue('B'.$i, date('d-m-Y', strtotime($key['created_at'])))
                    ->setCellValue('C'.$i,  $key['Id_Cuenta'])
                    ->setCellValue('D'.$i,  $key['Nombres'].' '.$key['Apellidos'])
                    ->setCellValue('E'.$i,  $key['Id_Asignado'])
                    ->setCellValue('F'.$i,  $key['Id_Tipo'])
                    ->setCellValue('G'.$i,  $key['Id_Categoria'])
                    ->setCellValue('H'.$i,  $key['Id_Ciudad']);
                $i++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Verdana',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size' =>18,
                    'color'     => array(
                        'rgb' => '212121'
                    )
                ),
                'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'       => TRUE,
                )
            );

            $estiloTituloColumnas = array(
                'font' => array(
                    'name'      => 'Arial',
                    'bold'      => true
                ),
                'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
                ));

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray(
                array(
                    'font' => array(
                        'name'      => 'Arial',
                        'size' => 11
                    )
                ));
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);

            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:E".($i-1));

            $objPHPExcel->getActiveSheet()->setTitle('Reporte CUALI | PUBLISA');

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet(0)->freezePane('A4');
            $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Reporte de '.$f1.' Hasta '.$f2.'.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');



        }
        else{
            print_r('No hay resultados para mostrar');
        }
    }

    private function Format_Consecutivo($Contador){

        return substr("00000", strlen ($Contador), 5).$Contador;

    }

}
