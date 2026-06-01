<?php
require_once "config.php";
class class_db {

	var $host = _HOST_;
	var $user = _USER_;
	var $pass = _PASS_;
	var $db   = _DB_;

	public function __construct() {
		
	}
	
	public function connect() {
		$mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
		if ( $mysqli->connect_error ) {
			die('Failed To Connect '.$mysqli_connect_errno().' -> '.$mysql_connect_error());
		}
		//$mysqli->set_charset('utf8');
		return $mysqli;
	}

	public function _real_escape_string($var) {
		$mysqli = $this->connect();
		return $mysqli->real_escape_string($var);
	}
	
	public function _fetchRow($sql) {	
		//echo $sql;
		$_row = array();
		$mysqli = $this->connect();
		$result = $mysqli->query($sql);
		$rows = $result->fetch_array(MYSQLI_ASSOC);
		if (is_array($rows)) {
			foreach($rows as $k=>$v) {		
				$_row[$k] = $v;
			}
			$result->free_result();						
		}	
		$mysqli->close();
		return $_row;
	}
	
	public function _fetchAll($sql) {		
		$_rows = array();
		$mysqli = $this->connect();
		$result = $mysqli->query($sql);	
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$_rows[] = $row;
		}
		$result->free_result();
				
		$mysqli->close();
		
		return $_rows;
	}
	
	public function _execSQL($sql) {
		//echo $sql;exit;
		$mysqli = $this->connect();
		try {
			$mysqli->query($sql);
		}catch(Exception $e) {
			die('Gagal Simpan');
		}
		
		return $mysqli->insert_id;
	}
	
	public function _numRows($rows) {		
		return sizeOf($rows);
	}
}
?>
