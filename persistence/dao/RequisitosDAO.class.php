<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface RequisitosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Requisitos 
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
 	 * @param requisito primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Requisitos requisito
 	 */
	public function insert($requisito);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Requisitos requisito
 	 */
	public function update($requisito);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByEstado($value);


	public function deleteByDescripcion($value);

	public function deleteByEstado($value);


}
?>