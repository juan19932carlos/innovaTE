<?php
/**
 * Class that operate on table 'manuales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class ManualesMySqlDAO implements ManualesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ManualesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM manuales WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM manuales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM manuales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param manuale primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM manuales WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ManualesMySql manuale
 	 */
	public function insert($manuale){
		$sql = 'INSERT INTO manuales (clase, referencia, comentario) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($manuale->clase);
		$sqlQuery->set($manuale->referencia);
		$sqlQuery->set($manuale->comentario);

		$id = $this->executeInsert($sqlQuery);	
		$manuale->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ManualesMySql manuale
 	 */
	public function update($manuale){
		$sql = 'UPDATE manuales SET clase = ?, referencia = ?, comentario = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($manuale->clase);
		$sqlQuery->set($manuale->referencia);
		$sqlQuery->set($manuale->comentario);

		$sqlQuery->setNumber($manuale->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM manuales';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByClase($value){
		$sql = 'SELECT * FROM manuales WHERE clase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReferencia($value){
		$sql = 'SELECT * FROM manuales WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComentario($value){
		$sql = 'SELECT * FROM manuales WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByClase($value){
		$sql = 'DELETE FROM manuales WHERE clase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReferencia($value){
		$sql = 'DELETE FROM manuales WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComentario($value){
		$sql = 'DELETE FROM manuales WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ManualesMySql 
	 */
	protected function readRow($row){
		$manuale = new Manuale();
		
		$manuale->id = $row['id'];
		$manuale->clase = $row['clase'];
		$manuale->referencia = $row['referencia'];
		$manuale->comentario = $row['comentario'];

		return $manuale;
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
	 * @return ManualesMySql 
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