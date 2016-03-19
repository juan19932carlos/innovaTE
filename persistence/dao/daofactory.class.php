<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return EquiposDAO
	 */
	public static function getEquiposDAO(){
		return new EquiposMySqlExtDAO();
	}

	/**
	 * @return EstadosDAO
	 */
	public static function getEstadosDAO(){
		return new EstadosMySqlExtDAO();
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
	 * @return RecordarDAO
	 */
	public static function getRecordarDAO(){
		return new RecordarMySqlExtDAO();
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