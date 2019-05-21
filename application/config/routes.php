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

$route['Cuentas'] = 'cuentas_controller';
$route['getCuentas'] = 'cuentas_controller/getCuentas';
$route['Info_Cuenta/(:any)'] = 'cuentas_controller/getInfoCuenta/$1';

$route['Usuarios'] = 'usuarios_controller';