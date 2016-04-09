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

    public function ObtenerHTML ($contenido = null) {
        if ( is_null($contenido) )
            $contenido = array('contenido' => $_POST['contenido'],
                                        'titulo'=>$_POST['titulo'], 
                                        'tags'=> $_POST['tags']);

        //procesa el contenido
        $map = array("\n"  => '</p><p>',
                     '[b]'  => '<strong>',
                     '[/b]' => '</strong>',
                     '[i]'  => '<em>',
                     '[/i]'  => '</em>',
                     '[img = ' => '</p><img src="',
                     '[lista]' => '<ul>',
                     '[/lista]'  => '</ul>',
                     '[item]'  => '<li>',
                     '[/item]'  => '</li>',
                     '[link ='  => '<a href=',
                     '[/link]'  => '<a>',
                     '[cita]'  => '<blockquote>',
                     '[/cita]'  => '</blockquote>',
                     ']'  => '"><p>');
        $contenido['contenido'] = "<p>".str_replace( array_keys($map), array_values($map), $contenido['contenido']) . "</p>";

        print(json_encode($contenido));

    } 

}
?>
