<?php

class database{
	private static $instance;

	private $host;
	private $user;
	private $pass;
	private $dbName;

	private $conn;

	// Applying Singleton pattern
	static function getInstance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	// Set up a PDO connection with database
	function connect($host,$user,$pass,$dbName){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->dbName = $dbName;

		try {
		    $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
		    // set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		}
	}

	// Select all rows from database
	public function select($sql){
		$query = $this->conn->query($sql);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	// Delete item
	public function delete($sql){
		$this->conn->query($sql);
	}

	// Insert new movies to database
	public function insert($sql,$params){
		$stmt = $this->conn->prepare($sql);

		$stmt->execute($params);
	}
}
