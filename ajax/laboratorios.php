<?php
require_once("../config/conexion.php");
// llamada al modelo categoria
require_once("../modelos/Laboratorios.php");

$laboratorios = new Laboratorio();

switch ($_GET["op"]){

 case 'get_correlativo_orden':

  date_default_timezone_set('America/El_Salvador'); $now = date("dmY");
  $fecha = date('d-m-Y');
  $datos= $laboratorios->get_correlativo_orden($fecha);

  if(is_array($datos)==true and count($datos)>0){
    foreach($datos as $row){
      $numero_orden = substr($row["cod_orden"],8,15)+1;
      $output["cod_orden"] = $now.$numero_orden;
    }  

  }else{
        $output["cod_orden"] = $now.'1';
  }
  echo json_encode($output);

  break;

  case 'registrarEnvioLab':
    $laboratorios->registrarEnvioLab($_POST["cod_orden"],$_POST["paciente"],$_POST["empresa"],$_POST["laboratorio"],$_POST["lente"],$_POST["modelo_aro"],$_POST["marca_aro"],$_POST["color_aro"],$_POST["diseno_aro"],$_POST["usuario"],$_POST["sucursal"],$_POST["prioridad"],$_POST["observaciones"]);
    $mensaje = "ok";
    echo json_encode($mensaje);
    break;

}
 ?>