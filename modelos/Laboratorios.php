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

}////////FIN DE LA CLASE

 ?>