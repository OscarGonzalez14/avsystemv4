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

    case 'get_ordenes_creadas':
      $datos = $laboratorios->get_ordenes_creadas();
      $data = Array();
      $i=0;
      foreach ($datos as $row) {
        if ($row["estado"]==0) {
          $badge="warning";
          $icon="fa-clock";
          $estado="Pendiente";
        }elseif($row["estado"]==1){
          $badge="success";
          $icon="fa-share-square";
          $estado="Enviado";
        }elseif ($row["estado"]==5) {
          $badge="danger";
          $icon="fa-share-square";
          $estado="Rechazado";
        }

        $sub_array = array();
        $sub_array[] = $row["id_orden_lab"];
        $sub_array[] = '<input type="checkbox" class="form-check-input paciente" value="'.$row["cod_orden"].'" name="'.$row["paciente"].'" id="send_lab'.$i.'">Enviar';
        $sub_array[] = ucwords(strtolower($row["paciente"]));
        $sub_array[] = $row["cod_orden"];
        $sub_array[] = $row["fecha_creacion"];
        $sub_array[] = $row["laboratorio"];
        $sub_array[] = $row["sucursal"];
        $sub_array[] = '<span class="right badge badge-'.$badge.'"><i class=" fas '.$icon.'" style="color:'.$badge.'"></i><span> '.$estado.'</span>';
        $sub_array[] = '<button type="button" class="btn btn-md btn-outline-secondary btn-sm"><i class="fas fa-eye" aria-hidden="true" style="color:blue"></i></button>';
        $sub_array[] = '<button type="button" class="btn btn-md btn-outline-secondary btn-sm"><i class="fas fa-trash" aria-hidden="true" style="color:red"></i></button>';
        $sub_array[] = '<button type="button" class="btn btn-md btn-outline-secondary btn-sm"><i class="fas fa-trash" aria-hidden="true" style="color:red"></i></button>';        
        $data[] = $sub_array;
        $i++;
      }

      $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
       echo json_encode($results);


      break;

}
 ?>