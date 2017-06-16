<?php
class yarns extends base_yarns {
	public static function selectcount($sql){
		$r=0;
		$consulta=new Consulta();
		$sql="SELECT COUNT(*) FROM yarns A $sql";
		$registros= $consulta->Execute($sql);
		if ($fila=@mysql_fetch_array($registros)){
			list($r)=$fila;
		}
		return $r;
	}	
	public static function deleteall(){
		$consulta=new Consulta();
		$sql="DELETE FROM yarns";
		$consulta->Execute($sql);
	}
	public static function selectnow(){
		$r=0;
		$consulta=new Consulta();
		$sql="SELECT DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s') AS fecha";
		$registros= $consulta->Execute($sql);
		if ($fila=@mysql_fetch_array($registros)){
			list($r)=$fila;
		}
		return $r;
	}	
}
?>
