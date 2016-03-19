<?php
final  class perfilController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - perfil");
    }

    /**
     * pagina de inicio.
     * 
     * @return void.
     */
    public function index() {
        echo ($this->_sesion->usuario);
        return;
    }
}
?>