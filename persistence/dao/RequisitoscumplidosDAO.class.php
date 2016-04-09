<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface RequisitoscumplidosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Requisitoscumplidos 
	 */
	public function load($requisito, $proyecto);

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
 	 * @param requisitoscumplido primary key
 	 */
	public function delete($requisito, $proyecto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Requisitoscumplidos requisitoscumplido
 	 */
	public function insert($requisitoscumplido);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Requisitoscumplidos requisitoscumplido
 	 */
	public function update($requisitoscumplido);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>