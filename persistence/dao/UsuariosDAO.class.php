<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-02-12 06:21
 */
interface UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuarios 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($codigo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByApellido($value);

	public function queryByRol($value);

	public function queryByContraseña($value);

	public function queryBySalt($value);


	public function deleteByNombre($value);

	public function deleteByApellido($value);

	public function deleteByRol($value);

	public function deleteByContraseña($value);

	public function deleteBySalt($value);


}
?>