<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface IntegrantesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Integrantes 
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
 	 * @param integrante primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Integrantes integrante
 	 */
	public function insert($integrante);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Integrantes integrante
 	 */
	public function update($integrante);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsuario($value);

	public function queryByGrupo($value);


	public function deleteByUsuario($value);

	public function deleteByGrupo($value);


}
?>