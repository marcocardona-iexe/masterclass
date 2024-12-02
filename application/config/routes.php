<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'SesionesController/index';
$route['nueva-sesion'] = 'SesionesController/nueva_sesion';


$route['lista-sesiones'] = 'SesionesController/index';


#Rutas para agregar una nueva sesion
$route['agregar-sesion'] = 'SesionesController/agregar_sesion';
$route['verifica-codigo-docente/(:any)'] = 'SesionesController/verifica_codigo_docente/$1';
$route['verifica-codigo-alumno/(:any)'] = 'SesionesController/verifica_codigo_alumno/$1';
#############################################################################################################


#Modulo del login
$route['acceso-docente'] = 'SesionesController/acceso_docente';
$route['validar-acceso-sesion'] = 'SesionesController/validar_acceso_sesion';
##############################################################################################################


#Modulos para ennpoint
$route['get-masterclass'] = 'SesionesController/get_masterclass';
$route['get-taller'] = 'SesionesController/get_taller';

##############################################################################################################


#Modulo Usuarios
$route['lista-usuarios'] = 'UsuariosController/lista_usuarios';



#Info para modulos en plataformas
$route['get-session/(:any)'] = "SesionesController/get_session/$1";

#Unirse a la sesion el alumno
$route['alumno-unirse'] = "BigbluebuttonController/alumno_unirse";
#Crear sala 
$route['crear-sala'] = "BigbluebuttonController/crear_sala";

#Ver grabacion
$route['ver-grabacion'] = "BigbluebuttonController/ver_grabacion";


$route['get-talleres'] = "SesionesController/get_talleres";
$route['get-video-taller/(:any)'] = "BigbluebuttonController/get_video_taller/$1";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
