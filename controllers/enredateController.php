<?php 
	final class enredateController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - Enredate");
    }

    public function index(){
        return;
    }

    public function mentores() {
    	# code...
    }

    public function aliados() {
    	# code...
    }

    public function inversionistas() {
    	$this->_view->setTitle("InovaTE - Inversionistas");

        $Inversionistas = array();

        $Inversionistas[] = array(  'nombre' => "CAMARA DE COMERCIO DE BOGOTÁ",
                                    'imagen' => 'camara-de-comercio-de-bogota-002.jpg');

        $Inversionistas[] = array(  'nombre' => "MINTIC",
                                    'imagen' => 'lIoVXtYk.png');

        $Inversionistas[] = array(  'nombre' => "Colciencias",
                                    'imagen' => 'Logo_colciencias.jpg');

        $Inversionistas[] = array(  'nombre' => "UN Egresados",
                                    'imagen' => 'descarga.png');

        $this->_view->assign('inversionistas',$Inversionistas);

        $this->_view->renderizar(__FUNCTION__);
    }
}
 ?>