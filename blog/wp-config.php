<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', '114242wordpress20140205204524');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'myecopetit');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'z7kf5169');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '.psW_g=~d3M/+zUrj7:.VU{[1A&D|v_A%>#:?C$wy<:yE`(fp5(;g<nm7&vIDlaN'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', ']!avLug`!VRO-.9^0)c 8VWt%W9_-N)FfxK(gF@sO)v/wxuJfe~uu2S4..kJi7=O'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'EyFL.nj+4l?`D!=|WG+0iZgRf&&y+@b ~1++RX7-vxa1n,!!~`a- JU5m8mF6jg]'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'T9?r 6a;0gbqQS900VEO-jjh~)Y-o`H ]Zt:zcU;+`V5=Ebf_Z$IB^SJ;?D%B0:T'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'r<@X-$]ml%tzOP~UrW!k,bX6f>q.q&;+Z`ALVu++Vh>5po*H}?lJ9n=V ay,B$KX'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'n`mk}:-gBN5`>-I7T #P0TFN-;ag+xa6Do,fk8WSSfPAs=od~!ONtJStPV{MZuM,'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '7ZI(QpKoafO+g@,(-.V8EOIjo|~i0D~QW;*Nj}-l=)#YLK,P9==i-MH el{hzfc:'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'Di8,9;DciO:ETI,bh?!K*zi]3EK32SnL8Fycd#g3ae|_yDcIB|-v;onpZG|,1lh/'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

