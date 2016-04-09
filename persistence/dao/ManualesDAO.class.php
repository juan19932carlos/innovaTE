<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface ManualesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Manuales 
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
 	 * @param manuale primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Manuales manuale
 	 */
	public function insert($manuale);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Manuales manuale
 	 */
	public function update($manuale);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByClase($value);

	public function queryByReferencia($value);

	public function queryByComentario($value);


	public function deleteByClase($value);

	public function deleteByReferencia($value);

	public function deleteByComentario($value);


}
?>