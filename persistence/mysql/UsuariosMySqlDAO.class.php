<?php
/**
 * Class that operate on table 'usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-02-12 06:21
 */
class UsuariosMySqlDAO implements UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($codigo){
		$sql = 'DELETE FROM usuarios WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuarios (nombre, apellido, rol, contraseña, salt) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->apellido);
		$sqlQuery->setNumber($usuario->rol);
		$sqlQuery->set($usuario->contraseña);
		$sqlQuery->set($usuario->salt);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->codigo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuarios SET nombre = ?, apellido = ?, rol = ?, contraseña = ?, salt = ? WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->apellido);
		$sqlQuery->setNumber($usuario->rol);
		$sqlQuery->set($usuario->contraseña);
		$sqlQuery->set($usuario->salt);

		$sqlQuery->setNumber($usuario->codigo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM usuarios WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRol($value){
		$sql = 'SELECT * FROM usuarios WHERE rol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContraseña($value){
		$sql = 'SELECT * FROM usuarios WHERE contraseña = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySalt($value){
		$sql = 'SELECT * FROM usuarios WHERE salt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM usuarios WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM usuarios WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRol($value){
		$sql = 'DELETE FROM usuarios WHERE rol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContraseña($value){
		$sql = 'DELETE FROM usuarios WHERE contraseña = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySalt($value){
		$sql = 'DELETE FROM usuarios WHERE salt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->codigo = $row['codigo'];
		$usuario->nombre = $row['nombre'];
		$usuario->apellido = $row['apellido'];
		$usuario->rol = $row['rol'];
		$usuario->contraseña = $row['contraseña'];
		$usuario->salt = $row['salt'];

		return $usuario;
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
	 * @return UsuariosMySql 
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