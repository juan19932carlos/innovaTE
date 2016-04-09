<?php 
	final class auxiliarController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - auxiliar");
    }

    public function index(){
        return;
    }

    public function FormularioNoticias() {

    	$this->_view->renderizar(__FUNCTION__);
    	return;
    }

}
 ?>