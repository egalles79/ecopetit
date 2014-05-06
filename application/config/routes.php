<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "inici";
$route['404_override'] = '';

//$route['^ca/(.+)$'] = "$1";
//$route['^es/(.+)$'] = "$1"; 
 
//$route['^ca$'] = $route['default_controller'];
//$route['^es$'] = $route['default_controller'];

// URI like '/en/about' -> use controller 'about'

$route['^(ca|es)'] = "inici";
$route['^(ca|es)/(Inicio|Inici)'] = "inici";


$route['^(ca|es)/(Quien-somos|Qui-som)'] = "quisom";
$route['^(ca|es)/(Privacidad|Privacitat)'] = "privacitat";

$route['^(ca|es)/(Com-funcionem|Funcionamiento)'] = "comfuncionem";

$route['^(ca|es)/(Productes-nous|Productos-nuevos)'] ="productes/nous";

$route['^(ca|es)/(Productes-seminous|Productos-seminuevos)'] ="productes/seminous";

$route['^(ca|es)/(Productes-nous|Productos-nuevos)/(:num)/(:any)'] ="productes/nous/$3/$4";
$route['^(ca|es)/(Productes-seminous|Productos-seminuevos)/(:num)/(:any)'] ="productes/seminous/$3/$4";

$route['^(ca|es)/(Contacte|Contacto)'] = "contacte";

$route['ca/(:num)/(:any)'] = "productes/fitxa/$1/$2";
$route['ca/(:num)/(:any)'] = "productes/fitxa/$1/$2";

$route['es/(:num)/(:any)'] = "productos/ficha/$1/$2";
$route['es/(:num)/(:any)'] = "productos/ficha/$1/$2";

$route['^(ca|es)/(.+)$'] = "$2";



//$route['es/productos/(:num)/(:any)$'] = "productos/ficha/$1/$2";


// '/en', '/de', '/fr' and '/nl' URIs -> use default controller
$route['^(ca|es)$'] = $route['default_controller'];


//Con la siguiente definición una URL como 
//http://example.com/products/herramientas/34 
//se enrutaria a http://example.com/herramientas/id_34





/* End of file routes.php */
/* Location: ./application/config/routes.php */