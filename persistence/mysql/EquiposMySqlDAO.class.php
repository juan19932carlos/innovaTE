<?php
/**
 * Class that operate on table 'equipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-04-03 06:33
 */
class EquiposMySqlDAO implements EquiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EquiposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM equipos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM equipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM equipos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param equipo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM equipos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EquiposMySql equipo
 	 */
	public function insert($equipo){
		$sql = 'INSERT INTO equipos (nombre, proyecto, mentor) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($equipo->nombre);
		$sqlQuery->setNumber($equipo->proyecto);
		$sqlQuery->setNumber($equipo->mentor);

		$id = $this->executeInsert($sqlQuery);	
		$equipo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EquiposMySql equipo
 	 */
	public function update($equipo){
		$sql = 'UPDATE equipos SET nombre = ?, proyecto = ?, mentor = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($equipo->nombre);
		$sqlQuery->setNumber($equipo->proyecto);
		$sqlQuery->setNumber($equipo->mentor);

		$sqlQuery->setNumber($equipo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM equipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM equipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProyecto($value){
		$sql = 'SELECT * FROM equipos WHERE proyecto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMentor($value){
		$sql = 'SELECT * FROM equipos WHERE mentor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM equipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProyecto($value){
		$sql = 'DELETE FROM equipos WHERE proyecto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMentor($value){
		$sql = 'DELETE FROM equipos WHERE mentor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EquiposMySql 
	 */
	protected function readRow($row){
		$equipo = new Equipo();
		
		$equipo->id = $row['id'];
		$equipo->nombre = $row['nombre'];
		$equipo->proyecto = $row['proyecto'];
		$equipo->mentor = $row['mentor'];

		return $equipo;
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
	 * @return EquiposMySql 
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