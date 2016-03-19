<?php

final  class OpsController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("Error");
    }

    public function index() {
        $this->error(404);
    }

    public function error($code_error = 0) {
        if (!is_numeric($code_error)) {
            throw new Exception('Código de error inválido.');
        }
        $this->_view->setLayout("empty");
        $this->_view->assign('code_error', $code_error);
        $this->_view->renderizar();
        return;
    }

}
?>