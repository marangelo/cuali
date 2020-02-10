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
                $data['data'][$i]['CLIENTE']     = $key['Nombres'].' '.$key['Apellidos'];
                $data['data'][$i]['ASIGNADO']   = $key['Id_Asignado'];
                $data['data'][$i]['TIPO']     = $key['Id_Tipo'];

                $data['data'][$i]['CATEGORIA']       = $key['Id_Categoria'];


                $data['data'][$i]['CIUDAD']        = $key['Id_Ciudad'];


                $i++;
            }
        }else{
            $data['data'][$i]['N']          = "";
            $data['data'][$i]['FECHA']      = "";
            $data['data'][$i]['CLIENTE']    = "";
            $data['data'][$i]['ASIGNADO']   = "";
            $data['data'][$i]['TIPO']       = "";
            $data['data'][$i]['CATEGORIA']  = "";
            $data['data'][$i]['CIUDAD']     = "";
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

            $tituloReporte = "Reporte de Cuali";
            $titulosColumnas = array('Nº','FECHA','CLIENTE','ASIGNADO','TIPO','CATEGORIA','CIUDAD');

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
                ->setCellValue('G3',  $titulosColumnas[6]);
            $i=4;
            foreach ($resultado->result_array() as $key) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $this->Format_Consecutivo($key['idCaso']))
                    ->setCellValue('B'.$i, date('d-m-Y', strtotime($key['created_at'])))
                    ->setCellValue('C'.$i,  $key['Nombres'].' '.$key['Apellidos'])
                    ->setCellValue('D'.$i,  $key['Id_Asignado'])
                    ->setCellValue('E'.$i,  $key['Id_Tipo'])
                    ->setCellValue('F'.$i,  $key['Id_Categoria'])
                    ->setCellValue('G'.$i,  $key['Id_Ciudad']);
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

            $objPHPExcel->getActiveSheet()->setTitle('Reporte Llamadas');

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
