<?php 
final class indexController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setLayout("empty");
        $this->_view->setTitle("InovaTE - index");

        //TODO: conprobar que el usuario este logeado y tenga el rol adecuado.
        
    }

    /**
     * Panel principal de las opciones del usuario con rol usuario.
     */
    public function index(){
    	
        //TODO: Acabar este modulo.
        $this->_view->renderizar();
    }

}
 ?>