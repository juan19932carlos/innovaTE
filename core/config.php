<?php
/**
 * Este archivo inicializara en constantes valores
 * que se utilicen a lo largo de la aplicación.
 */
/**
 * Controlador por defecto, en caso de que no se especifique el controlador <br />
 * durante la petición.
 * 
 * @global string DEFAULT_CONTROLLER
 */
define('DEFAULT_CONTROLLER', 'index');

/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string DEFAULT_LAYOUT
 */
define('DEFAULT_LAYOUT', 'predeterminado');

/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string SDS
 */
define('SDS', '/');
/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string SDS
 */
define('SECTIONS', 'sections' . SDS);

/**
 * Ruta de la raiz del servidor.
 * 
 * @global string DOCUMENT_ROOT
 */
define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"]);

/**
 * Ruta de la raiz del sitio, para la gestion de archivos.
 * 
 * @global string DOCUMENT_ROOT_SITE
 */
define("DOCUMENT_ROOT_SITE", $_SERVER["DOCUMENT_ROOT"] . SITE);


/**
 * Host de la base de datos.
 * 
 * @global string DB_HOST
 */
define("DB_HOST", 'localhost');

/**
 * Usuario de la base de datos
 * 
 * @global string DB_USER
 */
define("DB_USER", "root");

/**
 * Password
 * 
 * @global string DB_PASSWORD
 */
define("DB_PASSWORD", '1234');

/**
 * Nombre de la base de datos.
 * 
 * @global string DB_NAME
 */
define("DB_NAME", 'innovate');

/**
 * Motor de base de datos.
 * 
 * @global string DB_NAME
 */
define("ENGINE_DATABASE", 'MYSQL');

?>