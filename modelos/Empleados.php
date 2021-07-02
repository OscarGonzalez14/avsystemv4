<?php

require_once("../config/conexion.php");

class Empleados extends Conectar{
	
	public function get_level_employee($id_empleado){
		$conectar= parent::conexion();
        	$sql= "select level from usuarios where id_usuario = ?;";
        	$sql=$conectar->prepare($sql);
        	$sql->bindValue(1,$id_empleado);
        	$sql->execute();
        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get_comision_cat_uno($sucursal,$year,$mes){
		$conectar = parent::conexion();
		$suc = $sucursal;
		$fecha = "%".$mes."-".$year."%";
		$sql = "select sum(monto_total) as total from ventas where sucursal=? and fecha_venta like ?;";
		$sql=$conectar->prepare($sql);
        $sql->bindValue(1,$sucursal);
        $sql->bindValue(2,$fecha);
        $sql->execute();
        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
	}

}

