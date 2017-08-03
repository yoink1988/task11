<?php
	
class MyTest
{
	private $db;
	private $sql;
	private $key = null;
	private $data = null;
	private $inTable = false;

	public function __construct($db)
	{
		$this->db = $db;
		$this->sql = new Sql();
	}

	public function setKey($value)
	{
		$this->key = $value;
	}

	public function setData($value)
	{
		$this->data = $value;
	}

	public function getKey()
	{
		return $this->key;
	}
	public function getData()
	{
		return $this->data;
	}

	public function find($key)
	{
		$this->sql->select()->setColumns("`key`, `data`")->setTable(TABLE_NAME)->setWhere(" `key` = '{$key}'")->setLimit(1);
		$stmt = $this->db->select($this->sql->exec());
		if($stmt)
		{
			$arr = array_shift($stmt);
			$this->inTable = true;
			$this->setKey($arr['key']);
			$this->setData($arr['data']);
		}
		else
		{
			$this->inTable = false;
		}

	}

	public function save()
	{
		if($this->inTable)
		{
			if($this->key && $this->data) //есть ключ и дата \\ апдейтим
			{
				$this->sql->update()->setTable(TABLE_NAME)->setParams(array("`data`" => "'{$this->data}'"))->setWhere("`key` = '{$this->key}'")->setLimit(1);
				$this->db->update($this->sql->exec());
			}
			if(($this->key) && (!$this->data))   //есть ключ нет даты \\ делитим
			{
				$this->sql->delete()->setTable(TABLE_NAME)->setWhere("`key` = '{$this->key}'")->setLimit(1);
				$this->db->delete($this->sql->exec());
				unset($this);
			}

		}
		if((!$this->inTable) && ($this->data))// нет в таблице \\ инсертим
		{
			$this->sql->insert()->setTable(TABLE_NAME)->setColumns("`key`, `data`")->setParams(array("'{$this->key}'","'{$this->data}'"))->setLimit(1);
			$this->db->insert($this->sql->exec());
		}
	}






}
