<?php

class DB {
	protected $driver;
	protected $result;

	public function __construct($hostname, $username, $password, $database) {
		$this->driver = new mysqli($hostname, $username, $password, $database);

		if ($this->driver->connect_errno) {
		    printf("資料連線失敗".$database);
		    exit();
		}
		$this->driver->set_charset("utf8");
		$this->driver->query("SET SQL_MODE = ''");
	}

	public function query($sql) {
	    $this->result = null;
	    if ($res = $this->driver->query($sql)) {
	        /* obtener array asociativo */
	        while(($row = @mysqli_fetch_assoc($res))) {
	            $this->result[] = $row;
	            unset($row);
	        }
	    }
	    //$this->result = $res->fetch_array(MYSQLI_ASSOC);
		return (count($this->result)>0)?$this->result:array();//$this->result;
	}

	public function escape($value) {
		return $this->driver->real_escape_string($value);
	}

	public function countAffected() {
		return $this->driver->affected_rows;
	}

	public function getLastId() {
		return $this->driver->insert_id;
	}
}
?>