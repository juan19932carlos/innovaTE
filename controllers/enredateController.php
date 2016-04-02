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

        $mentores = array();

        $mentores[] = array('nombre'    => "Nombre",
                            'empresa'   => 'Empresa',
                            'img'       => '1453438312.png',
                            'experiencia'=>'Experiencia');
        $mentores[] = array('nombre'    => "Nombre",
                            'empresa'   => 'Empresa',
                            'img'       => '1453438312.png',
                            'experiencia'=>'Experiencia');
        $mentores[] = array('nombre'    => "Nombre",
                            'empresa'   => 'Empresa',
                            'img'       => '1453438312.png',
                            'experiencia'=>'Experiencia');

    	$this->_view->assign('mentores',$mentores);

        $this->_view->renderizar(__FUNCTION__);
    }

    public function aliados() {

        $this->_view->setTitle("InovaTE - Aliados");

        $Aliados = array();

    	$Aliados[] = array(  'nombre' => "CAMARA DE COMERCIO DE BOGOTÁ",
                                    'imagen' => 'camara-de-comercio-de-bogota-002.jpg');

        $Aliados[] = array(  'nombre' => "MINTIC",
                                    'imagen' => 'lIoVXtYk.png');

        $Aliados[] = array(  'nombre' => "Colciencias",
                                    'imagen' => 'Logo_colciencias.jpg');

        $Aliados[] = array(  'nombre' => "UN Egresados",
                                    'imagen' => 'descarga.png');

        $this->_view->assign('Aliados',$Aliados);

        $this->_view->renderizar(__FUNCTION__);
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