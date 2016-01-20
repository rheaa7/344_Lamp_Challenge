<?php
class Movies {
	protected $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	//this function is the sql query to populate all search results that contain searched title
	public function search($q) {
		$sql = 'select * from movies where title like ?';
		$stmt = $this->conn->prepare($sql);
		$success = $stmt->execute(array("%{$q}%"));
		if(!$success) {
			var_dump($stmt->errorInfo());
			return false;
		} else {
			return $stmt->fetchAll();
		}
	}

	//this function is the sql query to populate details on individual movies using the id
	public function details($id) {
		$sql = 'select * from movies where movie_id=?';
		$stmt = $this->conn->prepare($sql); 
		$success = $stmt->execute(array("$id"));
		if(!$success) {
			var_dump($stmt->errorInfo());
			return false;
		} else {
			return $stmt->fetchAll();
		}
	}
}
?>