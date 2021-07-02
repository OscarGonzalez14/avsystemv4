<?php
//llamo a la conexion de la base de datos
require_once("../config/conexion.php");
require_once("../modelos/Empleados.php");
$empleado = new Empleados();  
switch($_GET["op"]){

	case 'categoria_user':
		$datos=$empleado->get_level_employee($_POST["id_empleado"]);
			if (is_array($datos)==true and count($datos)>0) {		
				foreach ($datos as $row) {
                  $level = $row["level"];				
				}
			}
		echo json_encode($level);	
		break;

	case 'get_comision_cat_uno':
		$datos=$empleado->get_comision_cat_uno($_POST["sucursal"],$_POST["year"],$_POST["mes"]);
			if (is_array($datos) and count($datos)) {
				foreach ($datos as $row) {
					$total_ventas = $row["total"];					
				}
			}

        if ($total_ventas>1000) {
        	$comision = 100;
        }elseif($total_ventas>24000){
        	$comision = 200;
        }elseif($total_ventas>29000){
        	$comision = 300;
        }elseif($total_ventas>34000){
        	$comision = 400;
        }elseif($total_ventas>29000){
        	$comision = 500;
        }

		$data["total_ventas"] = number_format($total_ventas,2,".",",");
		$data["comision"] = number_format($comision,2,".",",");
		echo json_encode($data);
	break;	

}