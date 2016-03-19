<?php
final class ideasController extends Controller {
	public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - Ideas");
    }

    public function index() {
    	# code...
    }

    public function destacados() {
    	$this->_view->setTitle("InovaTE - Proyectos destacados");
        $this->_view->renderizar(__FUNCTION__);
    }

    public function equipos() {
    	$this->_view->setTitle("InovaTE - Equipos de trabajo");

        $grupos = array();

        $grupos[] = array(
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In voluptatem reprehenderit reiciendis quod harum doloremque aspernatur culpa asperiores. Perspiciatis at laudantium repudiandae sapiente quaerat, consectetur odit vitae? Ipsa, sit, expedita.',
                'integrantes' => array(array('nombre' => 'Integrante 1', 'img' => '1453438312.png'), 
                                       array('nombre' => 'Integrante 2', 'img' => '1453438315.png'),
                                       array('nombre' => 'Integrante 3', 'img' => '1453438394.png')
                                       )
                        );

        $grupos[] = array(
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In voluptatem reprehenderit reiciendis quod harum doloremque aspernatur culpa asperiores. Perspiciatis at laudantium repudiandae sapiente quaerat, consectetur odit vitae? Ipsa, sit, expedita.',
                'integrantes' => array(array('nombre' => 'Integrante 1', 'img' => '1453438312.png'), 
                                       array('nombre' => 'Integrante 2', 'img' => '1453438315.png'),
                                       array('nombre' => 'Integrante 3', 'img' => '1453438394.png'),
                                       array('nombre' => 'Integrante 4', 'img' => '1453438317.png')
                                       )
                        );

        $this->_view->assign('grupos',$grupos);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function graduados() {
    	$this->_view->setTitle("InovaTE - Equipos de trabajo");

      $proyectos = array();

      $proyectos[] = array('nombre' => "proyecto 1", 'img'=>"1453439334.jpg");
      $proyectos[] = array('nombre' => "proyecto 2", 'img'=>"1453439335.png");
      $proyectos[] = array('nombre' => "proyecto 3", 'img'=>"1453439083.png");
      $proyectos[] = array('nombre' => "proyecto 4", 'img'=>"1453439343.jpg");

      $this->_view->assign('proyectos',$proyectos);
      $this->_view->renderizar(__FUNCTION__);
      return;
    }
}