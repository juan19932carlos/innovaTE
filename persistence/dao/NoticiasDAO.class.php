<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
interface NoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Noticias 
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
 	 * @param noticia primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Noticias noticia
 	 */
	public function insert($noticia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Noticias noticia
 	 */
	public function update($noticia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByContenido($value);

	public function queryByAutor($value);

	public function queryByFecha($value);


	public function deleteByTitulo($value);

	public function deleteByContenido($value);

	public function deleteByAutor($value);

	public function deleteByFecha($value);


}
?>