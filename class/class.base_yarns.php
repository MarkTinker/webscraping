<?php
/*
	V 2.0
	Generador de clases de Bruno
	Uso:
	Crear objeto
	$yarns=new yarns();
	
	Seleccionar un objeto de la base de datos por clave primaria
	$yarns=new yarns($id);
	
	Insertar en base de datos el objeto
	$yarns->insert();

	Actualizar en base de datos el objeto
	$yarns->update();

	Borrar de base de datos el objeto
	$yarns->delete();

	Seleccionar de base de datos varios registros de esta tabla
	$where=" WHERE ...";
	$arr_yarns=yarns::selectarray($where);
	
	Seleccionar de base de datos varios registros de esta tabla con paginacion
	$where=" WHERE ...";
	$arr_pag=yarns::selectarray_paginacion($where);
	$arr_yarns=$arr_pag[0];
	$_pagi_navegacion=$arr_pag[1];
	
	$idyarns=$_REQUEST["idyarns"];
	$url=$_REQUEST["url"];
	$name=$_REQUEST["name"];
	$max1=$_REQUEST["max1"];
	$max2=$_REQUEST["max2"];
	$max3=$_REQUEST["max3"];
	$max4=$_REQUEST["max4"];
	$max5=$_REQUEST["max5"];
	$max6=$_REQUEST["max6"];
	$yarns->url=$url;
	$yarns->name=$name;
	$yarns->max1=$max1;
	$yarns->max2=$max2;
	$yarns->max3=$max3;
	$yarns->max4=$max4;
	$yarns->max5=$max5;
	$yarns->max6=$max6;
*/

class base_yarns extends Base {
	public $idyarns="";
	public $url="";
	public $name="";
	public $max1="-1";
	public $max2="-1";
	public $max3="-1";
	public $max4="-1";
	public $max5="-1";
	public $max6="-1";
	public $max7="-1";
	public $max8="-1";
	public function __construct($idyarns=""){
		if($idyarns!=""){
			$this->idyarns=$idyarns;
			$this->select();
		}
	}
	public function select(){
		$consulta=new Consulta();
		$sql="SELECT idyarns,url,name,max1,max2,max3,max4,max5,max6,max7,max8 FROM yarns WHERE idyarns = '".mysql_real_escape_string($this->idyarns)."'";
		$registros= $consulta->Execute($sql);
		if ($fila=@mysql_fetch_array($registros)){
			list($this->idyarns,$this->url,$this->name,$this->max1,$this->max2,$this->max3,$this->max4,$this->max5,$this->max6)=$fila;
			$this->_select=1;
		}
	}
	public function delete(){
		$consulta=new Consulta();
		$sql="DELETE FROM yarns";
		$sql.=" WHERE idyarns= '".$this->idyarns."'";
		$sql.=" LIMIT 1";
		$consulta->Execute($sql);
	}
	public function update(){
		$consulta=new Consulta();
		$sql="UPDATE yarns";
		$sql.=" SET url='".mysql_real_escape_string($this->url)."',name='".mysql_real_escape_string($this->name)."',max1='".mysql_real_escape_string($this->max1)."',max2='".mysql_real_escape_string($this->max2)."',max3='".mysql_real_escape_string($this->max3)."',max4='".mysql_real_escape_string($this->max4)."',max5='".mysql_real_escape_string($this->max5)."',max6='".mysql_real_escape_string($this->max6)."',max7='".mysql_real_escape_string($this->max7)."',max8='".mysql_real_escape_string($this->max8)."'";
		$sql.=" WHERE idyarns= '".$this->idyarns."'";
		$sql.=" LIMIT 1";
		$consulta->Execute($sql);
	}
	public function insert(){
		$consulta=new Consulta();
		$sql = "INSERT INTO yarns ( url,name,max1,max2,max3,max4,max5,max6,max7,max8 ) VALUES ( '".mysql_real_escape_string($this->url)."','".mysql_real_escape_string($this->name)."','".mysql_real_escape_string($this->max1)."','".mysql_real_escape_string($this->max2)."','".mysql_real_escape_string($this->max3)."','".mysql_real_escape_string($this->max4)."','".mysql_real_escape_string($this->max5)."','".mysql_real_escape_string($this->max6)."','".mysql_real_escape_string($this->max7)."','".mysql_real_escape_string($this->max8)."' )";
		$consulta->Execute($sql);
		$sql="SELECT LAST_INSERT_ID() AS id";
		$registros= $consulta->Execute($sql);
		if ($fila = @mysql_fetch_array($registros)) {
			list($this->idyarns) = $fila;
		}
	}
	public static function selectarray($where=""){
		$consulta=new Consulta();
		$arreglo=array();
		$objeto=new yarns();
		$sql="SELECT A.idyarns,A.url,A.name,A.max1,A.max2,A.max3,A.max4,A.max5,A.max6, A.max7, A.max8 FROM yarns A";
		$sql.=" $where";
		$registros= $consulta->Execute($sql);
		while ($fila=@mysql_fetch_array($registros)){
			list($objeto->idyarns,$objeto->url,$objeto->name,$objeto->max1,$objeto->max2,$objeto->max3,$objeto->max4,$objeto->max5,$objeto->max6, $objeto->max7, $objeto->max8)=$fila;
			$objeto->_select=1;
			$arreglo[]=$objeto;
			$objeto=new yarns();
		}
		return $arreglo;
	}
	public static function selectarray_paginacion($where="",$_pagi_cuantos=10){
		$_pagi_totalReg=0;
		$arr_ret=array();
		$arr_objetos=array();
		$_pagi_actual = trim($_REQUEST["pg"]);
		if(!preg_match("/^[0-9]+$/ismU",$_pagi_actual)){
			$_pagi_actual=1;
		}
		$consulta=new Consulta();
		$sql="SELECT COUNT(*) FROM yarns A $where";
		$registros= $consulta->Execute($sql);
		if ($fila=@mysql_fetch_array($registros)){
			list($_pagi_totalReg)=$fila;
		}
		$_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);
		$_pagi_enlace = $_SERVER["PHP_SELF"];
		$_pagi_query_string = "?";
		if(isset($_GET)){
			$_pagi_variables = $_GET;
			foreach($_pagi_variables as $_pagi_clave => $_pagi_valor){
				if($_pagi_clave != "pg"){
					$_pagi_query_string .= $_pagi_clave."=".$_pagi_valor."&";
				}
			}
		}
		$_pagi_enlace .= $_pagi_query_string;
		$_pagi_navegacion = "";	

		if ($_pagi_actual != 1){
			$_pagi_url = $_pagi_actual - 1;
			$_pagi_navegacion .= '<a href="'.$_pagi_enlace."pg=".$_pagi_url.'" class="link2">&laquo; Prev</a>&nbsp;';
		}
		$_pagi_i=$_pagi_actual-5;
		if($_pagi_i<1){
			$_pagi_i=1;
		}
		for ($_pagi_i ; ($_pagi_i<=$_pagi_totalPags)&&($_pagi_i<=($_pagi_actual+5)); $_pagi_i++){
			if ($_pagi_i == $_pagi_actual) {
				$_pagi_navegacion .= "<span class=link2>&nbsp;[$_pagi_i]&nbsp;</span>";
			}else{
				$_pagi_navegacion .= '<a href="'.$_pagi_enlace."pg=".$_pagi_i.'" class="link2">'.$_pagi_i."</a>&nbsp;&nbsp;";
			}
		}
		if ($_pagi_actual < $_pagi_totalPags){
			$_pagi_url = $_pagi_actual + 1;
			$_pagi_navegacion .= '<a href="'.$_pagi_enlace."pg=".$_pagi_url.'" class="link2">Next &raquo;</a>';
		}
		$_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
		$_pagi_sqlLim = $where." LIMIT $_pagi_inicial,$_pagi_cuantos";
		$arr_objetos=yarns::selectarray($_pagi_sqlLim);
		$arr_ret[]=$arr_objetos;
		$arr_ret[]=$_pagi_navegacion;
		$arr_ret[]=$_pagi_totalReg;
		return $arr_ret;
	}

}
?>
