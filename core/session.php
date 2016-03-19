<?php

session_save_path(APP_ROOT . "tmp" . DS .'session');
//session_save_path('/var/www/coparevistastage/public/sessionTmp');
ini_set('session.gc_probability', 1);
/**
 * Gestion la sessiones de la aplicación basada en el patron de diseño
 * singleton.
 */
class Session {

    /**
     * Única instancia de la clase.
     * 
     * @var Session $_instance
     */
    private static $_instance;

    /**
     * Identificador de la session
     *
     * @var string $_sessionID
     */
    public static $_sessionID;

    /**
     * Inicializa la sessión y actualiza su identificador.
     */
    private function __construct() {
        session_start();
        self::$_sessionID = session_id();
    }

    /**
     * Obtiene la instancia de sessión
     * 
     * @return Session
     */
    public static function singleton() {
        if (!isset(self::$_instance)) {
            $className = __CLASS__;
            self::$_instance = new $className;
        }
        return self::$_instance;
    }

    /**
     * Retorna el valor de una variable de sessión
     * 
     * @param string $var
     * @return string
     */
    public function __get($var) {
        if (isset($_SESSION[sha1($var)])) {
            return $_SESSION[sha1($var)];
        }
        return false;
    }

    /**
     * Crea una variable de sessión
     * 
     * @param string $var nombre de la variable de session
     * @param string $val valor de la variable de session
     * @return type
     */
    public function __set($var, $val) {
        if (!empty($var)) {
            return $_SESSION[sha1($var)] = $val;
        }
    }

    /**
     * Destruye la sessión, eliminando todas las variables de 
     * sessión
     */
    public function __destroy() {
        foreach ($_SESSION as $var => $val) {
            $_SESSION[$var] = null;
        }
        session_destroy();
    }

    /**
     * Verifica si existe la variable @var{$var} en el array.
     * 
     * @param  $name    Nombre de la variable.
     * @return boolean  Retorna true si existe false en caso contrario.
     */
    public function __isset($var){
        return isset( $_SESSION[sha1( $var )] );
    }

    /**
     * Elimina una variable de sesión. <br />
     * Devuelve true, si logro eliminar la variable en caso contrario <br />
     * devuelve false.
     * 
     * @param String $var Nombre de la variable
     * @return boolean 
     */
    public function __unset($var) {
        if (isset($_SESSION[sha1($var)])) {
            unset($_SESSION[sha1($var)]);
            return true;
        }
        return false;
    }

    /**
     * Destruye la sessión
     */
    public function __destruct() {
        session_write_close();
    }

}