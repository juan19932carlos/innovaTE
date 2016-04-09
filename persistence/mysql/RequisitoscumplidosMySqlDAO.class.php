<?php
/**
 * Class that operate on table 'requisitoscumplidos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class RequisitoscumplidosMySqlDAO implements RequisitoscumplidosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RequisitoscumplidosMySql 
	 */
	public function load($requisito, $proyecto){
		$sql = 'SELECT * FROM requisitoscumplidos WHERE requisito = ?  AND proyecto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($requisito);
		$sqlQuery->setNumber($proyecto);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM requisitoscumplidos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM requisitoscumplidos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param requisitoscumplido primary key
 	 */
	public function delete($requisito, $proyecto){
		$sql = 'DELETE FROM requisitoscumplidos WHERE requisito = ?  AND proyecto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($requisito);
		$sqlQuery->setNumber($proyecto);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RequisitoscumplidosMySql requisitoscumplido
 	 */
	public function insert($requisitoscumplido){
		$sql = 'INSERT INTO requisitoscumplidos ( requisito, proyecto) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($requisitoscumplido->requisito);

		$sqlQuery->setNumber($requisitoscumplido->proyecto);

		$this->executeInsert($sqlQuery);	
		//$requisitoscumplido->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RequisitoscumplidosMySql requisitoscumplido
 	 */
	public function update($requisitoscumplido){
		$sql = 'UPDATE requisitoscumplidos SET  WHERE requisito = ?  AND proyecto = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($requisitoscumplido->requisito);

		$sqlQuery->setNumber($requisitoscumplido->proyecto);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM requisitoscumplidos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return RequisitoscumplidosMySql 
	 */
	protected function readRow($row){
		$requisitoscumplido = new Requisitoscumplido();
		
		$requisitoscumplido->requisito = $row['requisito'];
		$requisitoscumplido->proyecto = $row['proyecto'];

		return $requisitoscumplido;
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
	 * @return RequisitoscumplidosMySql 
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