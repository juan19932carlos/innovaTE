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
     * Inscribe un usuario con un formulario con los datos necesarios, os datos son recividos por POST.
     * 
     * @return JSON, Resultado de la inscripcion de el usuario especificado.
     */
    public function registrarUsuario() {

    	$datos = array(	"rol" => 1,
						"nombre" => $_POST['nombre'],
						"apellido" => $_POST['apellido'],
						"id" => $_POST['documento'],
						"claseDoc" => $_POST['tipo'],
						"contraseña" => $_POST['contraseña'],
						"email" => $_POST['email']);

        $resp = $this->validarUsuario( $datos );
        if ( is_string($resp) )
            echo $resp;
        else
            echo "usuario inscrito corrrectamente";
    }

    public function registrarIdea (){
        //TODO: Registrar idea
    }

    /**
     * Inscribe iterativamente usuarios y ideas. Los usuarios son agregados a las ideas.
     * 
     * $_POST['usuarios']   Array con los usuarios a inscribir. Los usuarios deben cumplir con los mismos requisitos de la función registrarUsuario().
     * $_POST['ideas']      Array con las ideas a inscribir. Las ideas deben cumplir con los mismos requisitos de la función registrarIdea().
     * 
     * @return JSON, Resultado con los errores, si los hay.
     */
    public function registrarEquipo () {
        $trans = new Transaction();

        $response = array('usuarios' => [],
                          'ideas' => [] );
        $TodoBien = true;

        $usuarios = array();
        $proyectos = array();

        //Registrar los usuarios.
        foreach ($_POST["usuarios"] as $key => $usuario) {
            $datos = array( "rol" => 3,
                            "nombre" => $usuario['nombre'],
                            "apellido" => $usuario['apellido'],
                            "id" => $usuario['documento'],
                            "claseDoc" => $usuario['tipo'],
                            "contraseña" => $usuario['contraseña'],
                            "email" => $usuario['email']);

            $resp = $this->validarUsuario( $datos );

            if ( is_string($resp) ) {
                $response["usuarios"][$key] = $resp;
                $TodoBien = false;
            }else{
                $response["usuarios"][$key] = "success";
                $usuarios[ $datos["id"] ] = $datos["claseDoc"];
            }
        }

        //registro de ideas.
        if ($TodoBien)
        foreach ($_POST["ideas"] as $key => $idea) {
            $datos = array( "nombre" => $idea['nombre'],
                            "estado" => "inicial",
                            "descripcion" => $idea['tipo'],
                            "equipo" => 0);

            $resp = $this->validarIdea( $datos );

            if ( is_string($resp) ) {
                $response["ideas"][$key] = $resp;
                $TodoBien = false;
            }else{
                $response["ideas"][$key] = $resp;
                $proyectos[] = $resp;
            }
        }

        //registrar los usuarios en los proyectos.
        if($TodoBien)
        foreach ($proyectos as $proyecto_id) {
            foreach ($usuarios as $key => $value) {
                $integrante = array( "usuario" => (int)$key,
                                    "claseDoc" => $value,
                                    "proyecto" => $proyecto_id);

                try {
                    DAOFactory::getIntegrantesDAO()->insert( (object) $integrante );
                } catch (Exception $e) {
                    $trans->rollback();
                    throw new Exception("Error desctonocido al ligar usuarios e ideas.<hr>".$e->getMessage(), 1);
                    return;
                }
            }
        }
        
        if ($TodoBien) {
            $trans->commit();
        } else {
            $trans->rollback();
        }

        print json_encode( $response );

        return;

    }

    /**
     * Valida los datos del usuario y registra en la base de datos.
     *
     * rol:          Rol que desempeñara en la plataforma.
     * nombre:       Nombre del usuario.
     * apellido:     Apellido del usuario.
     * documento:    Documento de identidad, esta ligado al tipo de documento.
     * tipo:         Clase de documento: TI (Targeta de identidad), CC(Cedula de ciudadanis),CE(cedula de extrangeria), NIT.
     * contraseña:   Password para el inicio de sesión.
     * email:        Email para el envio de informacón.
     * 
     * @param  Array, $datos, Array con los datos necesarios para inscribir un usuario
     * @return boolean o string, Si encuentra un error en la validación o en la sentencia SQL es reportadacomo string, si no retorna TRUE.
     */
    private function validarUsuario( $datos = null ) {

        if(!is_array($datos))
            throw new Exception("La variable ingresada debe ser de tipo array", 1);
            
        //validar correo
        if ( !filter_var($datos["email"], FILTER_VALIDATE_EMAIL) )
            return "correo incorrecto" . $datos["email"];

        //validar documento
        if ( !is_numeric($datos['id']) ) 
            return "documento incorrecto";

        //convertir contraseña para almacenarla.
        $datos['contraseña'] = password_hash($datos['contraseña'],PASSWORD_BCRYPT);

        //registrarlo en la base de datos
        try {
            DAOFactory::getUsuariosDAO()->insert( (object) $datos );
        } catch (Exception $e) {
            //captura errores de la base de datos.
            if ( strpos( $e->getMessage(), "Duplicate entry" ) != false)
                return "Valor duplicado";
            else
                return "Error desconocido: ";
        }

        return TRUE;
    }

    /**
     * Valida los datos de la idea y registra en la base de datos.
     *
     * nombre:          nombre del proyecto.
     * estado:          estado de desarrollo del proyecto (en general inicia en 1, la fase inicial).
     * descripción:     una breve descripción del proyecto.
     * equipo:          //TODO: Aun no se que es, ver en la base de datos.
     * 
     * @param  Array, $datos, Array con los datos necesarios para inscribir la idea
     * @return boolean o string, Si encuentra un error en la validación o en la sentencia SQL es reportadacomo string, si no retorna Id del proyecto.
     */    
    private function validarIdea ( $datos = null, $mentor = null ) {

        if(!is_array($datos))
            throw new Exception("La variable ingresada debe ser de tipo array", 1);

        //TODO: validar el mentor, si lo hay.
        if(!is_null($mentor)){

        }

        try {
            $id = DAOFactory::getproyectosDAO()->insert( (object) $datos );
        } catch (Exception $e) {
            //captura errores de la base de datos.
            if ( strpos( $e->getMessage(), "Duplicate entry" ) != false)
                return "Valor duplicado";
            else
                return "Error desconocido: ".$e->getMessage();
        }

        return $id;
    }
}
 ?>