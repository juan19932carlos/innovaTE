<?php
/**
 * Class that operate on table 'inversionistas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class InversionistasMySqlDAO implements InversionistasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InversionistasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM inversionistas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM inversionistas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM inversionistas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param inversionista primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM inversionistas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InversionistasMySql inversionista
 	 */
	public function insert($inversionista){
		$sql = 'INSERT INTO inversionistas (Nombre, Persona natural, imagen) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($inversionista->nombre);
		$sqlQuery->setNumber($inversionista->persona natural);
		$sqlQuery->set($inversionista->imagen);

		$id = $this->executeInsert($sqlQuery);	
		$inversionista->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InversionistasMySql inversionista
 	 */
	public function update($inversionista){
		$sql = 'UPDATE inversionistas SET Nombre = ?, Persona natural = ?, imagen = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($inversionista->nombre);
		$sqlQuery->setNumber($inversionista->persona natural);
		$sqlQuery->set($inversionista->imagen);

		$sqlQuery->setNumber($inversionista->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM inversionistas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM inversionistas WHERE Nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPersona natural($value){
		$sql = 'SELECT * FROM inversionistas WHERE Persona natural = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagen($value){
		$sql = 'SELECT * FROM inversionistas WHERE imagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM inversionistas WHERE Nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPersona natural($value){
		$sql = 'DELETE FROM inversionistas WHERE Persona natural = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagen($value){
		$sql = 'DELETE FROM inversionistas WHERE imagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InversionistasMySql 
	 */
	protected function readRow($row){
		$inversionista = new Inversionista();
		
		$inversionista->id = $row['id'];
		$inversionista->nombre = $row['Nombre'];
		$inversionista->persona natural = $row['Persona natural'];
		$inversionista->imagen = $row['imagen'];

		return $inversionista;
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
	 * @return InversionistasMySql 
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