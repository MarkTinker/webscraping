<?php
class Consulta{
	private $host="localhost";
	private $user="yarnsuser";
	private $password="yarn.8547";
	private $db="yarnsdb";
	public $link;
	public function Consulta(){
		$this->link = mysql_connect($this->host,$this->user,$this->password);
		if ($this->link){
			mysql_select_db($this->db,$this->link);
		}
	}
	public function Close(){
		return 0;
	}
	public function Execute($query){
		if ($this->link){
			return mysql_query($query,$this->link);
		}
	}
	public function select($db){
		mysql_select_db($db,$this->link);
	}
	public function esc($data){
		return mysql_real_escape_string($data);
	}
}
?>
