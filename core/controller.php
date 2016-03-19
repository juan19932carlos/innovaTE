<?php

abstract class Controller {

    /**
     * Objeto que gestiona la vista de la aplicación.
     * 
     * @var View $_view 
     */
    protected $_view;

    /**
     * Objeto que gestiona las solicitudes.
     * 
     * @var Request $_request 
     */
    protected $_request;

    /**
     * Objeto Sesion
     *
     * @var Session $_sesion 
     */
    protected $_sesion;

    public function __construct() {
        $this->_sesion = Session::singleton();
        $this->_request = new Request();
        $this->_view = new View( $this->_request );

        //configuración general
        $this->_view->setTitle("InovaTE");
        $this->_view->setCharset("utf-8");
        $this->_view->setAuthor("UNAL");
        $this->_view->setlang("es");

        //hojas de estilo por defecto.
        $this->_view->setitem("bootstrap.min.css");
        $this->_view->setitem("tema.css");

        //scripts por defecto.
        $this->_view->setitem("jquery-1.12.0.min.js");
        $this->_view->setitem("bootstrap.min.js");
        $this->_view->setitem("script.js");

        //¿ya inicio sesión?
        if ( isset($this->_sesion->usuario) )
            $this->_view->assign("_sesion",$this->_sesion->usuario);
        else
            $this->_view->assign("_sesion",false);
        
    }

    abstract public function index();

    /**
     * Limpia de injección sql el valor solicitado en el array $_POST.
     * 
     * @param string $clave
     * @return String
     */
    public static function post($clave = null) {
        if(is_null($clave)){
            return $_POST;
        }
        if (isset($_POST[$clave])) {
            if (is_string($_POST[$clave])) {
                $_POST[$clave] = strip_tags($_POST[$clave]);
                if (!get_magic_quotes_gpc()) {
                    $_POST[$clave] = ($_POST[$clave]);
                }
                return trim($_POST[$clave]);
            } elseif (is_array($_POST[$clave])) {
                return $_POST[$clave];
            }
        } else {
            return NULL;
        }
    }

    
    /**
     * Limpia de injección sql el valor solicitado en el array $_GET
     * 
     * @param string $clave
     * @return String
     */
    public static function get($clave = null) {
        if(is_null($clave)){
            return $_GET;
        }
        if (isset($_GET[$clave]) && !empty($_GET[$clave])) {
            $_GET[$clave] = strip_tags($_GET[$clave]);
            if (!get_magic_quotes_gpc()) {
                $_GET[$clave] = ($_GET[$clave]);
            }
            return trim($_GET[$clave]);
        }
    }

    /**
     * 
     * @param String $ruta Ruta a la cual desea redireccionar
     */
    protected function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

}
