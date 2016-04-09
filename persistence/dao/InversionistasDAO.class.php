<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface InversionistasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Inversionistas 
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
 	 * @param inversionista primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Inversionistas inversionista
 	 */
	public function insert($inversionista);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Inversionistas inversionista
 	 */
	public function update($inversionista);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByPersona natural($value);

	public function queryByImagen($value);


	public function deleteByNombre($value);

	public function deleteByPersona natural($value);

	public function deleteByImagen($value);


}
?>