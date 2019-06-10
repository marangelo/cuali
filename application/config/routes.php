<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login_controller';
$route['404_override'] = 'login_controller';
$route['translate_uri_dashes'] = FALSE;

//RUTA: LOGIN
$route['acreditando'] = 'login_controller/validandoCuenta';
$route['salir'] = 'login_controller/salir';


//RUTA: REPORTES
$route['main'] = 'main_controller';
$route['Nueva'] = 'main_controller/NuevaSolicitud';
$route['getResumen'] = 'main_controller/getResumen';
$route['SaveSolicitud'] = 'main_controller/SaveSolicitud';
$route['SaveComentario'] = 'main_controller/SaveComentario';
$route['DetalleResumen/(:any)'] = 'main_controller/DetalleResumen/$1';
$route['BuscarSolicitud'] = 'main_controller/BuscarSolicitud';
$route['DescartarSolicitud'] = 'main_controller/DescartarSolicitud';

$route['Cuentas'] = 'cuentas_controller';
$route['getCuentas'] = 'cuentas_controller/getCuentas';
$route['Info_Cuenta/(:any)'] = 'cuentas_controller/getInfoCuenta/$1';
$route['CuentaDetalle/(:any)'] = 'cuentas_controller/CuentaDetalle/$1';
$route['SaveCuenta'] = 'cuentas_controller/SaveCuenta';
$route['SaveParametrosCuenta'] = 'cuentas_controller/SaveParametrosCuenta';
$route['DescartarCuenta'] = 'cuentas_controller/DescartarCuenta';
$route['DescargarParametro'] = 'cuentas_controller/DescargarParametro';


$route['Usuarios'] = 'usuarios_controller';

$route['Config'] = 'main_controller/Config';