<?php 
	final class herramientasController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InnovaTE - Herramientas");
    }

    public function index(){
        return;
    }

    public function manuales() {
        $this->_view->setTitle("InnovaTE - Manuales");

        $archivos = array();

        $archivos[] =  array( 'extencion' => 'pdf', 
                              'link' => 'descargables/3452452345.pdf',
                              'nombre' => 'TUtorial PHP y SQL');

        $archivos[] =  array( 'extencion' => 'pdf', 
                              'link' => 'descargables/3452452343.pdf',
                              'nombre' => 'Electrónica');

        $archivos[] =  array( 'extencion' => 'pdf', 
                              'link' => 'descargables/3452452343.pdf',
                              'nombre' => 'Electrónica');

        $archivos[] =  array( 'extencion' => 'pdf', 
                              'link' => 'descargables/3452452343.pdf',
                              'nombre' => 'Electrónica');

        $archivos[] =  array( 'extencion' => 'pdf', 
                              'link' => 'descargables/3452452343.pdf',
                              'nombre' => 'Electrónica');

        $this->_view->assign('archivos',$archivos);
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