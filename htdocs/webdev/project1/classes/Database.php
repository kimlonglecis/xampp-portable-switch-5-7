<?php 
class Database{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbname = "test";
	/*properies database handler*/
	private $dbh;
	private $error;
	/*properties statement*/
	private $stmt;
	
	/*Construct Function*/
	public function __construct(){
	// Set DSN: 1st part of $dbh PDO Connection 	line #25
		$dsn = "mysql:host=".$this->host.';dbname='.$this->dbname;
	// Set Options: 2nd part of $dbh PDO connection 	line #25	
		$option = array(
			PDO::ATTR_PERSISTENT		=> TRUE,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION  
		);
	// Create new PDO
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}
	/*End Construction Function*/

	/*Start Function Query*/
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	/*End Function Query*/

	/*Start Function Bind*/
	public function bind($param, $value, $type = Null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
				$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
				case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
				default:
				$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	/*End Function Bind*/

	/*Start Function Execute*/
	public function execute(){
		$this->stmt->execute();
	}
	/*End Function Execute*/

	/*Start Function lastInsertId*/
	public function lastInsertId(){
		$this->dbh->lastInsertId();
	}
	/*End Function lastInsertId*/

	/*Start funcion resultset*/
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	/*End function resultset*/
} 
