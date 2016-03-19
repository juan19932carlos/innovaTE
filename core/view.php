<?php

require_once APP_ROOT . 'libraries' . DS . 'smarty' . DS . 'Smarty.class.php';
class View extends Smarty {

    /**
     * Permite obtener información respecto a una solicitud.
     *
     * @var Request $_request
     */
    private $_request;

    /**
     * Titulo de la página actual.
     *
     * @var String $_title
     */
    private $_title;

    /**
     * Charset que utiliza la página actual.
     * 
     * @var String $_charset
     */
    private $_charset;

    /**
     * Idioma que utiliza la página actual.
     * 
     * @var String $_lang
     */
    private $_lang;

    /**
     * Idioma que utiliza la página actual.
     * 
     * @var String $_lang
     */
    private $_autor;

    /**
     * Meta descripción
     * 
     * @var String $_meta_description
     */
    private $_meta_description;

    /**
     * Meta keywords
     * 
     * @var String $_meta_keywords
     */
    private $_meta_keywords;

    /**
     * Contiene las rutas de (views, js, css, img) utilizados por la 
     * vista solicitada.
     * 
     * @var Array $_rutas
     */
    private $_rutas;

    /**
     * Nombre del archivo tpl base de la vista, por defecto
     * su nombre es template.tpl
     * 
     * @var String $_display
     */
    private $_display;

    /**
     * Nombre del archivo tpl base de la vista, por defecto
     * su nombre es template.tpl
     * 
     * @var String $_layout
     */
    private $_layout;

    /**
     * Determina la salida del smarty
     * @var type 
     */
    private $_output;

    /**
     * Recusrsos css js
     * @var array
     */
    private $_recursos = array();

    /**
     * Actualiza las rutas, y layout solicitado por la vista.
     * 
     * @param Request $peticion
     */
    public function __construct(Request $peticion) {
        parent::__construct();
        $this->_request = $peticion;
        $this->_title = "Empty";
        $this->_charset = "Empty";
        $this->_lang = "Empty";
        $this->_autor = "Empty";
        $this->_layout = DEFAULT_LAYOUT;
        $this->_display = "template.tpl";
        $this->_meta_description = "";
        $this->_meta_keywords = "";
        $this->_output = true;
        $this->_recursos['js'] = array();
        $this->_recursos['css'] = array();

        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();

        if ($modulo) {
            $this->_rutas['view'] = APP_ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/img/';
        } else {
            $this->_rutas['view'] = APP_ROOT . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'views/' . $controlador . '/img/';
        }

        //Coloca por defecto el layout default.
        $this->setTemplateDir(APP_ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS);
        $this->setConfigDir ( APP_ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS);
        $this->setCacheDir( APP_ROOT . 'tmp' . DS . 'SMARTYcache' . DS);
        $this->setCompileDir( APP_ROOT . 'tmp' . DS . 'SMARTYtemplate' . DS);
    }

    /**
     * Cambia la vista del modulo respectivo para las 
     * que se encuentren dentro de ese módulo
     * 
     * @param type $vista
     * @return null
     */
    private function changeView($vista) {
        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();
        if (is_null($vista))
            $vista = $controlador;

        if (($modulo) && ($controlador != $vista)) {
            //$controlador = $vista;
            $this->_rutas['view'] = APP_ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/img/';
        }
    }

    /**
     * Renderiza los datos de la vista solicitada.
     * 
     * @param String $vista Nombre de la vista
     * @throws Exception Se lanza cuando no se encuentra la vista solicitada.
     */
    public function renderizar($vista = null) {
        $this->changeView($vista);
        if (is_null($vista)) {
            $vista = $this->_request->getControlador();
        } else {
            $vista = SECTIONS . $vista;
        }

        $this->_recursos['js'] = array_merge(   $this->getAssetsLayout('js'),
                                                $this->_recursos['js'],
                                                $this->getItems('js', $vista));
        $this->_recursos['css'] = array_merge(  $this->getAssetsLayout('css'),             
                                                $this->_recursos['css'],
                                                $this->getItems('css', $vista));
        $_params = array(
            'js' => $this->_recursos['js'],
            'css' => $this->_recursos['css'],
            'site' => SITE,
            'base' => BASE_URL,
            'root' => APP_ROOT,
            'module' => $this->_request->getModulo(),
            'controller' => $this->_request->getControlador(),
            'configs' => array(
                'view' => $vista,
                'm_description' => $this->_meta_description,
                'm_keywords' => $this->_meta_keywords
            )
        );

        if (is_readable($this->_rutas['view'] . $vista . '.tpl'))
            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');
        else
            throw new Exception('Error de vista');

        $this->assign('_params', $_params);

        $this->assign('__titulo', $this->_title);
        $this->assign('__lang', $this->_lang);
        $this->assign('__charset', $this->_charset);        
        $this->assign('__autor', $this->_autor);


        if ($this->_output)
            $this->display( $this->_display );
        else
            return $this->fetch( $this->_display );

    }

    /**
     * Obtiene los respectivos js, css, img de la vista.
     * 
     * @param String $item Item que se desea cargar
     * @param String $vista La vista solicitada
     * @return Array Rutas solicitadas por el item.
     */
    private function getItems($item, $vista) {
        $_items = array();
        if (in_array($item, array('js', 'css', 'img'))) {
            if (@$handle = opendir($this->_rutas[$item])) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != '.' && $file != '..') {
                        $modulo = $this->_request->getModulo();
                        if (strpos($vista, SECTIONS) !== FALSE) {
                            $vista = $this->_request->getControlador();
                        }
                        if ($modulo) {
                            $_ruta = SITE . DS . 'modules' . DS . $modulo . DS . 'views' . DS . $vista . DS . $item . DS;
                        } else {
                            $_ruta = SITE . DS . 'views' . DS . $this->_request->getControlador() . DS . $item . DS;
                        }
                        if (is_dir($this->_rutas[$item] . $file)) {
                            foreach ($this->items_add as $it) {
                                if ($it[0] == '/') {
                                    $it[0] = '';
                                }
                                $arr = explode("/", $it);
                                if (count($arr) > 1) {
                                    if (is_file($this->_rutas[$item] . $it)) {
                                        $_ruta = $_ruta . $it;
                                        $_items[] = $_ruta;
                                    }
                                }
                            }
                        } else {
                            $_ruta = $_ruta . $file;
                            
                            if (empty($this->items_except) && empty($this->items_only)) {
                                $_items[] = $_ruta;
                            } else {
                                if (!empty($this->items_only) && in_array($file, $this->items_only)) {
                                    $_items[] = $_ruta;
                                }
                                if (!empty($this->items_except) && !in_array($file, $this->items_except)) {
                                    $_items[] = $_ruta;
                                }
                            }
                        }
                    }
                }
                closedir($handle);
            }
        }
        return $_items;
    }

    /**
     * 
     * @param type $item
     * @return string
     */
    private function getAssetsLayout($item) {
        $path = APP_ROOT . 'views/layout/' . $this->_layout . DS . $item;
        $_items = array();
        if (in_array($item, array('js', 'css', 'img'))) {
            if (@$handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != '.' && $file != '..') {
                        $_items[] = SITE . DS . 'views/layout/' . $this->_layout . DS . $item . DS . $file;
                    }
                }
                closedir($handle);
            }
        }
        return $_items;
    }

    /**
     * Selecciona el layout que se va utilizar para renderizar.
     * 
     * @param String $name
     */
    public function setLayout($name = DEFAULT_LAYOUT) {
        $this->_layout = $name;
        $this->setTemplateDir(APP_ROOT . 'views' . DS . 'layout' . DS . $name. DS);
        $this->setConfigDir ( APP_ROOT . 'views' . DS . 'layout' . DS . $name . DS . 'configs' . DS);
    }

    /**
     *     
     */
    public function getLayout() {
        return $this->_layout;
    }

    /**
     * Este función se utiliza para fijar un <br/>
     * layout que no se el principal y que se necesite <br/>
     * renderizar otra cosa. <br/>
     * @param type $_display
     */
    public function setDisplay($_display) {
        $this->_display = $_display;
    }

    public function _print($data_request, $json = true) {
        if ($json) {
            if (is_array($data_request)) {
                header("content-type: application/json");
                print json_encode($data_request);
                exit();
            }
        }
        if (is_array($data_request)) {
            $temp = Array();
            foreach ($data_request as $value) {
                if (is_object($value)) {
                    $temp[] = ((object) get_object_vars($value));
                } else {
                    $temp[] = ($value);
                }
            }
            @print_r($temp);
        }
    }

    public function setTitle($arg) {
        $this->_title = $arg;
    }

    public function setAuthor($arg) {
        $this->_autor = $arg;
    }

    public function setCharset($arg) {
        $this->_charset = $arg;
    }

    public function setLang($title) {
        $this->_lang = $title;
    }

    public function setMetaDescription($meta) {
        $this->_meta_description = $meta;
    }

    public function setMetaKeywords($meta) {
        $this->_meta_keywords = $meta;
    }

    public function setOutput($output) {
        $this->_output = $output;
    }

    public function getOutput() {
        return $this->_output;
    }

    /**
     * Busca una libreria css ó js de la carpeta library, la agrega al array 
     * de recursos, para luego ser incluidos en el template.
     *
     * Ej. view.setItem("foo.js")
     *     view.setItem("foo.css")
     * 
     * @param string $item Nombre del archivo.
     */
    public function setItem( $item ) {

        $arr = explode(".", $item);
        $ext = end($arr);

        if(is_readable(APP_ROOT . "libraries" . DS . $ext . DS . $item))
            $this->_recursos[$ext][] = SITE . DS . "libraries" . DS . $ext . DS . $item;
        else
            throw new Exception("Asegurese que el documento $item se encuentra en el directorio.");
    }
}
?>