<?php 
require_once("../config/conexion.php");

class Laboratorio extends conectar{//inicio de la clase

////////////GET NUMERO DE PACIENTE POR SUCURSAL
public function get_correlativo_orden($fecha){
    $conectar = parent::conexion();
    $fecha_act = $fecha.'%';         
    $sql= "select cod_orden from ordenes_lab where fecha_creacion like ? order by id_orden_lab DESC limit 1;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$fecha_act);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

public function valida_existe_orden($cod_orden){
  	$conectar = parent::conexion();

  	$sql = "select*from ordenes_lab where cod_orden=?;";
  	$sql= $conectar->prepare($sql);
    $sql->bindValue(1, $cod_orden);
    $sql->execute();
    return $resultado=$sql->fetchAll();
  }

public function registrarEnvioLab($cod_orden,$paciente,$empresa,$laboratorio,$lente,$modelo_aro,$marca_aro,$color_aro,$diseno_aro,$usuario,$sucursal,$prioridad,$observaciones){

  	$conectar = parent::conexion();
  	date_default_timezone_set('America/El_Salvador');$hoy = date("d-m-Y H:i:s");
    $estado = 0;

  	$sql = "insert into ordenes_lab values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  	$sql=$conectar->prepare($sql);
  	$sql->bindValue(1,$cod_orden);
    $sql->bindValue(2,$hoy);
    $sql->bindValue(3,$paciente);
    $sql->bindValue(4,$empresa);
    $sql->bindValue(5,$laboratorio);
    $sql->bindValue(6,$lente);
    $sql->bindValue(7,$modelo_aro);
    $sql->bindValue(8,$marca_aro);
    $sql->bindValue(9,$color_aro);
    $sql->bindValue(10,$diseno_aro);
    $sql->bindValue(11,$usuario);
    $sql->bindValue(12,$sucursal);
    $sql->bindValue(13,$prioridad);
    $sql->bindValue(14,$estado);
    $sql->bindValue(15,$observaciones);
    $sql->execute();

  }

public function get_ordenes_creadas(){
	$conectar = parent::conexion();
	$sql = "select*from ordenes_lab where estado='0' order by id_orden_lab DESC;";
	$sql = $conectar->prepare($sql);
	$sql->execute();    
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

/////////////////////////////////  ORDENES ENVIADAS  ////////////////////
public function get_ordenes_enviadas(){
	$conectar = parent::conexion();
	$sql = "select a.id_accion,a.fecha as fecha_envio,o.cod_orden,o.estado,o.paciente,o.sucursal,o.prioridad,o.laboratorio from acciones_ordenes_envios as a inner join ordenes_lab as o on a.id_orden_lab=o.id_orden_lab where o.estado='1'; ";
	$sql = $conectar->prepare($sql);
	$sql->execute();    
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function registrarOrdenEnvio(){
	$conectar = parent::conexion();
	parent::set_names();
	
	$detalle_envio = array();
	$detalle_envio = json_decode($_POST["arrayDetEnvio"]);

	$usuario = $_POST["usuario"];
	$observaciones = "";//$_POST["observaciones"];
	$tipo_accion = "Envio";
	date_default_timezone_set('America/El_Salvador');$hoy = date("d-m-Y H:i:s");

	foreach ($detalle_envio as $k => $v) {
		$codigo = $v->codigo;
		$paciente = $v->paciente;

		$sql = "select id_orden_lab from ordenes_lab where cod_orden=? and paciente=?;";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$codigo);
		$sql->bindValue(2,$paciente);
		$sql->execute();

		$resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultado as $key => $v) {
			$id_orden_lab = $v["id_orden_lab"];
		}

		///////////INSERTAR EN TABLA ACCIONES //////////

		$sql2= "insert into acciones_ordenes_envios values(null,?,?,?,?,?,?,?);";
		$sql2=$conectar->prepare($sql2);
		$sql2->bindValue(1,$hoy);
		$sql2->bindValue(2,$usuario);
		$sql2->bindValue(3,$codigo);
		$sql2->bindValue(4,$paciente);
		$sql2->bindValue(5,$observaciones);
		$sql2->bindValue(6,$tipo_accion);
		$sql2->bindValue(7,$id_orden_lab);
        $sql2->execute();

        $sql3 = "update ordenes_lab set estado='1' where id_orden_lab=? and cod_orden=? and paciente=?;";
        $sql3=$conectar->prepare($sql3);
		$sql3->bindValue(1,$id_orden_lab);
		$sql3->bindValue(2,$codigo);
		$sql3->bindValue(3,$paciente);
		$sql3->execute();



	}////////////FIN FOREACH RECORRE DETALLE ENVIO


	//$sql =";";
}

}////////FIN DE LA CLASE
