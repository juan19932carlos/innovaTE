<?php
/**
 * Class that operate on table 'integrantes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-14 07:16
 */
class IntegrantesMySqlDAO implements IntegrantesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return IntegrantesMySql 
	 */
	public function load($usuario, $proyecto, $claseDoc){
		$sql = 'SELECT * FROM integrantes WHERE usuario = ?  AND proyecto = ?  AND claseDoc = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($usuario);
		$sqlQuery->setNumber($proyecto);
		$sqlQuery->setNumber($claseDoc);

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
	public function delete($usuario, $proyecto, $claseDoc){
		$sql = 'DELETE FROM integrantes WHERE usuario = ?  AND proyecto = ?  AND claseDoc = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($usuario);
		$sqlQuery->setNumber($proyecto);
		$sqlQuery->setNumber($claseDoc);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param IntegrantesMySql integrante
 	 */
	public function insert($integrante){
		$sql = 'INSERT INTO integrantes ( usuario, proyecto, claseDoc) VALUES ( ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($integrante->usuario);

		$sqlQuery->setNumber($integrante->proyecto);

		$sqlQuery->setString($integrante->claseDoc);

		$this->executeInsert($sqlQuery);	
		//$integrante->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param IntegrantesMySql integrante
 	 */
	public function update($integrante){
		$sql = 'UPDATE integrantes SET  WHERE usuario = ?  AND proyecto = ?  AND claseDoc = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($integrante->usuario);

		$sqlQuery->setNumber($integrante->proyecto);

		$sqlQuery->setNumber($integrante->claseDoc);

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



	
	/**
	 * Read row
	 *
	 * @return IntegrantesMySql 
	 */
	protected function readRow($row){
		$integrante = new Integrante();
		
		$integrante->usuario = $row['usuario'];
		$integrante->proyecto = $row['proyecto'];
		$integrante->claseDoc = $row['claseDoc'];

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