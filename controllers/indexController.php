<?php
final class indexController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - inicio");
    }

    /**
     * pagina de inicio.
     * 
     * @return void.
     */
    public function index() {
        $this->_view->setItem("fotorama.js");
        $this->_view->setItem("fotorama.css");

        //cargar las noticias

        $this->_view->renderizar();
        return;
    }

    /**
     * Inicia session del usuario con los datos del formulario.
     * 
     * @param  $_POST['usuario']    Id del usuario con el que inicia sesión.
     * @param  $_POST['contraseña'] Contraseña del usuario.
     * @return void.
     */
    public function login() {

        if (isset($this->_sesion->usuario))
            $this->redireccionar("/perfil/");
        elseif ( !empty($_POST['usuario']) and !empty($_POST['contraseña'])){
            //TODO: Implementar, selección de tipo de documento de identificacion en el inicio de sesión.
            $a = DAOFactory::getUsuariosDAO()->load( $_POST['usuario'] , "NIT" );

            // Si el usuario no existe.
            if ( empty($a) ) {
                $error_log["hidden"] = "";
                $error_log["msg"]    = "El usuario no existe.";
                $this->_view->assign("error_log",$error_log);
                $this->_view->renderizar(__FUNCTION__);
                return;
            }

            // Si la contraseña esta mal.
            if( !password_verify( $_POST['contraseña'], $a->contraseña) ) {
                $error_log["hidden"] = "";
                $error_log["msg"]    = "La contraseña no es correcta.";
                $this->_view->assign("error_log",$error_log);
                $this->_view->renderizar(__FUNCTION__);
                return;
            }
            
            //Si logra pasar exitosamente los controles.
            $this->_sesion->usuario = $_POST['usuario'];
            $this->redireccionar("/perfil/");
            return;
        }

        //Oculta el cuadro de errores y déja el mensage en blanco.
        $error_log["hidden"] = "hidden";
        $error_log["msg"]    = "";
        $this->_view->assign("error_log",$error_log);
        $this->_view->renderizar(__FUNCTION__);
        return;
    }

    public function test($pass = null){
        $hash = password_hash($pass,PASSWORD_BCRYPT);
        echo $hash ."<hr>";
        echo password_verify($pass,$hash);
        return;
    }
}
?>