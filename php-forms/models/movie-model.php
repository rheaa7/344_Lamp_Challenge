<?php
class Movies {
	protected $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}


	public function search($q) {
		$sql = 'select * from movies where title like ?';
		$stmt = $this->conn->prepare($sql);
		$success = $stmt->execute(array("%{$q}%"));
		if(!$success) {
			var_dump($stmt->errorInfo());
			//trigger_error($stmt->errorInfo());
			return false;
		} else {
			//print_r($stmt->fetchAll());
			return $stmt->fetchAll();
		}
	}

	public function details($id) {
		$sql = 'select * from movies where movie_id=?';
		$stmt = $this->conn->prepare($sql); 
		$success = $stmt->execute(array("$id"));
		if(!$success) {
			var_dump($stmt->errorInfo());
			//trigger_error($stmt->errorInfo());
			return false;
		} else {
			//print_r($stmt->fetchAll());
			return $stmt->fetchAll();
		}
	}
}
?>