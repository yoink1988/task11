<?php

class Db
{
	private $link = null;
	private static $instance = null;
	private $host;
	private $db;
	private $user;
	private $pass;
	private $tbl;
	
	public static function getInstance()
	{
		if (self::$instance instanceof self)
		{
			return self::$instance;
		}
		return self::$instance = new self(HOST,USER,PASS,DB_NAME,TABLE_NAME);
	}

	private function getConnect()
	{
		if($this->link !=null)
		{
			return $this->link;
		}
		
		if($this->link = mysql_connect($this->host, $this->user, $this->pass));
		{
			mysql_select_db($this->db);
			return $this->link;
		}
	}


	public function select($query)
	{
		$stmt = $this->doQuery($query);
		if($stmt)
		{
			$result = array();
			while($res = mysql_fetch_row($stmt, MYSQL_ASSOC))
			{
				$result[]=$res;
			}
			return $result;
		}
		echo mysql_error($this->getConnect());
	}
	
	
	
	public function doQuery($query)
	{

		return mysql_query($query, $this->getConnect());
	}


	
	public function delete($query)
	{

		if($this->doQuery($query))
		{
			return mysql_affected_rows($this->getConnect());
		}
		return false;
	}
	
	
	public function update($query)
	{

		if($this->doQuery($query))
		{
			return mysql_affected_rows($this->getConnect());
		}
		return false;
			
	}
	public function insert($query)
	{
		echo $query;
		if($this->doQuery($query))
		{
			return mysql_insert_id($this->getConnect());
		}
		return false;
	}

	private function __construct($host,$user,$pass,$db,$tbl)
	{
		$this->host = $host;
		$this->db = $db;
		$this->user = $user;
		$this->pass = $pass;
		$this->tbl = $tbl;
	}
}
