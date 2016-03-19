<?php 
	final class herramientasController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - Herramientas");
    }

    public function index(){
        return;
    }

    public function manuales() {
        $this->_view->setTitle("InovaTE - Manueles");

        
        $this->_view->renderizar(__FUNCTION__);
        return;
    }

    public function enlaces() {
    	# code...
    }

    public function software() {
    	# code...
    }

}
 ?>