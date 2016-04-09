<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface RolesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Roles 
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
 	 * @param role primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Roles role
 	 */
	public function insert($role);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Roles role
 	 */
	public function update($role);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);


}
?>