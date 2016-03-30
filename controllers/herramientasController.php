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
        $videos = array();

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
        
        /*Videos*/
        $videos[] =  array( 'link' => 'https://youtu.be/ZOdbo5pA4Ig',
                            'nombre' => 'Jaime Garzon');
        
        $videos[] =  array( 'link' => 'https://youtu.be/Mtjatz9r-Vc',
                            'nombre' => 'The art of innovation | Guy Kawasaki | TEDxBerkeley');
        
        $videos[] =  array( 'link' => 'https://youtu.be/B4ZSGQW0UMI',
                            'nombre' => 'Business Model Innovation');

        $videos[] =  array( 'link' => 'https://youtu.be/B4ZSGQW0UMI',
                            'nombre' => 'Business Model Innovation');

        /*Solución al problema de embebido de Youtube*/
        foreach ($videos as  $key => $video) {
          if( strpos($video['link'], ".be") )
            $videos[$key]['link'] = str_replace( ".be", "be.com/embed", $video['link']);
          else
            $videos[$key]['link'] = str_replace( ".com", ".com/embed", $video['link']);
        }

        /*Asignar variables Smarty*/
        $this->_view->assign('videos',$videos);
        $this->_view->assign('archivos',$archivos);
        $this->_view->renderizar(__FUNCTION__);
        return;
    }

    public function enlaces() {
      $this->_view->setTitle("InnovaTE - Manuales");

      $enlaces = array();

      $enlaces[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                          'nombre' => 'The thinking business',
                          'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");

      $enlaces[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                          'nombre' => 'The thinking business',
                          'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");

      $enlaces[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                          'nombre' => 'The thinking business',
                          'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");

      $this->_view->assign('enlaces',$enlaces);
      $this->_view->renderizar(__FUNCTION__);
      return;
    }

    public function software() {
    	$programas = array();

      $programas[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                            'nombre' => 'The thinking business',
                            'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");
      
      $programas[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                            'nombre' => 'The thinking business',
                            'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");
      
      $programas[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                            'nombre' => 'The thinking business',
                            'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");

      $programas[] =  array('direccion' => 'http://www.thethinkingbusiness.com/',
                            'nombre' => 'The thinking business',
                            'descripcion' => "The Thinking Business is a global training company specialising in thinking skills. We are experts in creative thinking, strategic thinking and mind mapping. Our world-class training programmes are designed to give you the knowledge, skills and techniques to be able to generate creative ideas and strategies that will drive your personal and business growth.");
      $this->_view->assign('programas',$programas);
      $this->_view->renderizar(__FUNCTION__);
      return;
    }

}
 ?>