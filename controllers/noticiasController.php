<?php
final class noticiasController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - Noticias");
    }

    public function index() {

    	$Noticias = array();

    	$Noticias[] = array('titulo'	=> 'TItulo',
    						'autor'		=> 'Autor',
    						'contenido' => ''
    						);

        return;
    }

    public function eventos() {
        
    }

    public function Publicarnoticia() {
    	print_r($_POST);
    	return;
    }

    public function ObtenerHTML () {
        print (json_encode( $_POST ) );
    } 

}
?>
