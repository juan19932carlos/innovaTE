<?php
/**
 * Class that operate on table 'integrantes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class IntegrantesMySqlDAO implements IntegrantesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return IntegrantesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM integrantes WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM integrantes';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM integrantes ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param integrante primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM integrantes WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param IntegrantesMySql integrante
 	 */
	public function insert($integrante){
		$sql = 'INSERT INTO integrantes (usuario, grupo) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($integrante->usuario);
		$sqlQuery->setNumber($integrante->grupo);

		$id = $this->executeInsert($sqlQuery);	
		$integrante->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param IntegrantesMySql integrante
 	 */
	public function update($integrante){
		$sql = 'UPDATE integrantes SET usuario = ?, grupo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($integrante->usuario);
		$sqlQuery->setNumber($integrante->grupo);

		$sqlQuery->setNumber($integrante->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM integrantes';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsuario($value){
		$sql = 'SELECT * FROM integrantes WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrupo($value){
		$sql = 'SELECT * FROM integrantes WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsuario($value){
		$sql = 'DELETE FROM integrantes WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrupo($value){
		$sql = 'DELETE FROM integrantes WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return IntegrantesMySql 
	 */
	protected function readRow($row){
		$integrante = new Integrante();
		
		$integrante->id = $row['id'];
		$integrante->usuario = $row['usuario'];
		$integrante->grupo = $row['grupo'];

		return $integrante;
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
	 * @return IntegrantesMySql 
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