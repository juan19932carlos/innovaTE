<?php
/**
 * Class that operate on table 'noticias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class NoticiasMySqlDAO implements NoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NoticiasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM noticias WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM noticias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param noticia primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM noticias WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NoticiasMySql noticia
 	 */
	public function insert($noticia){
		$sql = 'INSERT INTO noticias (titulo, contenido, autor, fecha) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($noticia->titulo);
		$sqlQuery->set($noticia->contenido);
		$sqlQuery->setNumber($noticia->autor);
		$sqlQuery->set($noticia->fecha);

		$id = $this->executeInsert($sqlQuery);	
		$noticia->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NoticiasMySql noticia
 	 */
	public function update($noticia){
		$sql = 'UPDATE noticias SET titulo = ?, contenido = ?, autor = ?, fecha = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($noticia->titulo);
		$sqlQuery->set($noticia->contenido);
		$sqlQuery->setNumber($noticia->autor);
		$sqlQuery->set($noticia->fecha);

		$sqlQuery->setNumber($noticia->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM noticias WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContenido($value){
		$sql = 'SELECT * FROM noticias WHERE contenido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutor($value){
		$sql = 'SELECT * FROM noticias WHERE autor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM noticias WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM noticias WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContenido($value){
		$sql = 'DELETE FROM noticias WHERE contenido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutor($value){
		$sql = 'DELETE FROM noticias WHERE autor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM noticias WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NoticiasMySql 
	 */
	protected function readRow($row){
		$noticia = new Noticia();
		
		$noticia->id = $row['id'];
		$noticia->titulo = $row['titulo'];
		$noticia->contenido = $row['contenido'];
		$noticia->autor = $row['autor'];
		$noticia->fecha = $row['fecha'];

		return $noticia;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return NoticiasMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>