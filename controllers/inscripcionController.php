<?php 
	final class inscripcionController extends Controller {

    public function __construct() {
        parent::__construct();

        $this->_view->setTitle("InovaTE - inscripcion");
    }

    public function index(){

    	$this->_view->renderizar();
        return;
    }

    /**
     * Despliege de formularios de inscripcion para equipos y para usuarios individuales.
     * 
     */
    public function form($clase = null){

    	if ( is_null($clase)) 
    		$this->redireccionar("/inscripcion");

    	if ( $clase != "equipo" and $clase != "individual" )
    		$this->redireccionar("/inscripcion");

    	$this->_view->renderizar(__FUNCTION__."-".$clase);
    	return;
    }

    /**
     * Inscribe un usuario con un formulario que tenga la siguiente informacion
     * $_POST['nombre']     Nombre del usuario.
     * $_POST['apellido']   Apellido del usuario.
     * $_POST['documento']  Documento de identidad, esta ligado al tipo de documento.
     * $_POST['tipo']       Clase de documento TI (Targeta de identidad), CC(Cedula de ciudadanis),CE(cedula de extrangeria), NIT.
     * $_POST['contraseña'] Password para el inicio de sesión.
     * $_POST['email']      Email para el envio de informacón.
     * 
     * @return JSON, Resultado de la inscripcion de el usuario especificado.
     * 
     */
    public function registrarUsuario() {

    	$datos = array(	"rol" => 1,
						"nombre" => $_POST['nombre'],
						"apellido" => $_POST['apellido'],
						"id" => $_POST['documento'],
						"claseDoc" => $_POST['tipo'],
						"contraseña" => $_POST['contraseña'],
						"email" => $_POST['email']);

    	//validar correo
    	if ( !filter_var($datos["email"], FILTER_VALIDATE_EMAIL) ) echo "correo incorrecto";
    		//$this->redireccionar("/inscripcion");

    	//validar documento
    	if ( !is_numeric($datos['id']) ) echo "documento incorrecto";
			//$this->redireccionar("/inscripcion");

		//convertir contraseña para almacenarla.
		$datos['contraseña'] = password_hash($datos['contraseña'],PASSWORD_BCRYPT);

		//registrarlo en la base de datos
		try {
			DAOFactory::getUsuariosDAO()->insert( (object) $datos );
		} catch (Exception $e) {
            echo $e->getMessage();
			if ( strpos( "Duplicate entry", $e->getMessage() ) !== false);
				echo "Valor duplicado";
			return;
		}
    }

    public function registraridea(){

    }

}
 ?>