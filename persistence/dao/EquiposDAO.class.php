<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface EquiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Equipos 
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
 	 * @param equipo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Equipos equipo
 	 */
	public function insert($equipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Equipos equipo
 	 */
	public function update($equipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByProyecto($value);

	public function queryByMentor($value);


	public function deleteByNombre($value);

	public function deleteByProyecto($value);

	public function deleteByMentor($value);


}
?>