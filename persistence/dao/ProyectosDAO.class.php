<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface ProyectosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Proyectos 
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
 	 * @param proyecto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Proyectos proyecto
 	 */
	public function insert($proyecto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Proyectos proyecto
 	 */
	public function update($proyecto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByEstado($value);

	public function queryByDescripcion($value);

	public function queryByEquipo($value);


	public function deleteByNombre($value);

	public function deleteByEstado($value);

	public function deleteByDescripcion($value);

	public function deleteByEquipo($value);


}
?>