<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return EstadosDAO
	 */
	public static function getEstadosDAO(){
		return new EstadosMySqlExtDAO();
	}

	/**
	 * @return IntegrantesDAO
	 */
	public static function getIntegrantesDAO(){
		return new IntegrantesMySqlExtDAO();
	}

	/**
	 * @return InversionistasDAO
	 */
	public static function getInversionistasDAO(){
		return new InversionistasMySqlExtDAO();
	}

	/**
	 * @return ManualesDAO
	 */
	public static function getManualesDAO(){
		return new ManualesMySqlExtDAO();
	}

	/**
	 * @return NoticiasDAO
	 */
	public static function getNoticiasDAO(){
		return new NoticiasMySqlExtDAO();
	}

	/**
	 * @return ProyectosDAO
	 */
	public static function getProyectosDAO(){
		return new ProyectosMySqlExtDAO();
	}

	/**
	 * @return RequisitosDAO
	 */
	public static function getRequisitosDAO(){
		return new RequisitosMySqlExtDAO();
	}

	/**
	 * @return RequisitoscumplidosDAO
	 */
	public static function getRequisitoscumplidosDAO(){
		return new RequisitoscumplidosMySqlExtDAO();
	}

	/**
	 * @return RolesDAO
	 */
	public static function getRolesDAO(){
		return new RolesMySqlExtDAO();
	}

	/**
	 * @return UsuariosDAO
	 */
	public static function getUsuariosDAO(){
		return new UsuariosMySqlExtDAO();
	}


}
?>