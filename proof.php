<!DOCTYPE html>
<html>
	<body>
	   <input type='text' id=“hid_id” class='hid_id' value='1' />
	   <input type='text' id=“hid_id_dos” class='hid_id' value='2' />
	   <button onclick="myFunction()">Click me</button>

	<script>
	function myFunction() {
	var id = document.getElementsByClassName("hid_id");
	  //if (id.length > 0) {
	//	  console.log(id[0].value);
	 // }

	  for(i=0;i<id.length;i++){
       console.log(id[i].value);
       console.log(id[i].id );
	  }
	}

 // Ejercicio 172: Buscar el índice de un objeto en un arreglo a partir del valor de una propiedad.

let daniela = {nombre: 'Daniela', email: 'daniela@mail.com', edad: 23};
let german = {nombre: 'Germán', email: 'german@mail.com', edad: 29};
let edward = {nombre: 'Edward', email: 'edward@mail.com', edad: 33};

let personas = [daniela, german, edward];

console.log(personas);

console.log();

let indice = personas.findIndex((objeto, indice, personas) => {
    return objeto.nombre == 'Daniela';
});

console.log(indice);

	</script>

	</body>
</html>




<?php
//$datos_recibo = $reporteria->print_recibo_paciente($_GET["n_recibo"],$_GET["n_venta"],$_GET["id_paciente"]);
date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");
$datos_paciente = $reporteria->get_datos_factura_paciente($id_paciente);
$data_orden_desc = $reporteria->get_data_orden_credito($id_paciente,$n_orden);
/////////////RECORRER DATA ORDEN DE DESCUENTO
for ($i=0; $i <sizeof($data_orden_desc) ; $i++) { 
    $monto_orden = $data_orden_desc[$i]["monto"];
    $plazo_credito = $data_orden_desc[$i]["plazo"];
    $cuotas_creditos = $monto_orden/$plazo_credito;
    $inicio_credito = $data_orden_desc[$i]["fecha_inicio"];
    $fin_credito = $data_orden_desc[$i]["fecha_finalizacion"];

    $ref_uno = $data_orden_desc[$i]["ref_uno"];
    $tel_ref_uno = $data_orden_desc[$i]["tel_ref_uno"];
    $ref_dos = $data_orden_desc[$i]["ref_dos"];
    $tel_ref_dos = $data_orden_desc[$i]["tel_ref_dos"];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
    body{
      font-family: Helvetica, Arial, sans-serif;
      font-size: 12px;
    }
      html{
        margin-top: 10px;
        margin-left: 30px;
        margin-right:20px; 
        margin-bottom: 0px;
    }
    }
    .stilot1{
       border: 1px solid black;
       padding: 5px;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .stilot2{
       border: 1px solid black;
       text-align: center;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }
    .stilot3{
       text-align: center;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .table2 {
       border-collapse: collapse;
    }
   </style>
  </head>
  <body>

<table style="width: 100%;margin-top:2px">
<tr>
<td width="10%"><img src="images/logooficial.jpg" width="130" height="75"/></td>

<td width="75%">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:16px";font-family: Helvetica, Arial, sans-serif;><strong><?php echo $encabezado; ?></strong></td>
  </tr>
  <tr>
    <td  style="text-align: center;margin-top: 0px;color:#0088b6;font-size:13px;font-family: Helvetica, Arial, sans-serif;"><b>PAGARÉ SIN PROTESTO</b></td>
  </tr>
    <tr>
    <td style="text-align: center;margin-top: 0px;font-size:13px;font-family: Helvetica, Arial, sans-serif;"><?php echo $info; ?>      
    </td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px;font-family: Helvetica, Arial, sans-serif;"><?php echo $direccion;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span></td>
  </tr>

  <tr>
    <td style="text-align:center; font-size:12px;font-family: Helvetica, Arial, sans-serif;"><span><strong>Telefono:</strong> <?php echo $telefono;?>&nbsp;&nbsp;&nbsp;</span><span><strong>Whatsapp:</strong> <?php echo $wha;?>&nbsp;&nbsp;&nbsp;</span><br><b>E-mail:</b> <?php echo $correo;?></td>
  </tr>


</table><!--fin segunda tabla-->
</td>
<td width="30%">
<table>
  <tr>
    <td style="text-align:right; font-size:12px"><strong>ORDEN</strong></td>
  </tr>
  <tr>
    <td style="color:red;text-align:right; font-size:14px"><strong >No.&nbsp;<span><?php echo $n_orden; ?></strong></td>
  </tr>
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna-->
</tr>
</table>
<p style="text-align: right;font-size:11px;font-family: Helvetica, Arial, sans-serif;" align="right"><?php echo $dir2.",&nbsp;".$hoy;?></p>
<div style="width:100%;margin-top:0px;font-size:12px;font-family: Helvetica, Arial, sans-serif;height: 835px">
<!--INICIO GET DATA PACIENTES-->
<?php    
    for($j=0; $j<count($datos_paciente);$j++){
      $empresa_pac = $datos_paciente[$j]["empresas"];
      $nombre_pac = $datos_paciente[$j]["nombres"];
     ?>

  <p style="font-size:15px;text-align:justify;font-family: Helvetica, Arial, sans-serif;">
  Por: <strong>$<span><?php echo number_format($suma_monto_orden,2,".",",");?></span></strong>
<br><br><br>
Por este pagaré, Yo:<strong><span>&nbsp;<?php echo $nombre_pac;?></span></strong>  de <strong><span>&nbsp;<?php echo $datos_paciente[$j]["edad"];?></span></strong>   años de edad; del domicilio de:<strong><span>&nbsp;<?php echo $datos_paciente[$j]["direccion"];?> </span></strong>   Departamento de: San Salvador  con Documento Único de Identidad número: <strong><span>&nbsp;<?php echo $datos_paciente[$j]["dui"];?></span></strong>(en adelante, “el Deudor”), prometo pagar incondicionalmente a Optica AV Plus S. A. de C. V. de este  domicilio,  con número de Identificación Tributaria No. 0614 191018 101 1 (Adelante, el “Acreedor”), la suma de &nbsp;<strong>$<span><?php echo number_format($suma_monto_orden,2,".",",");?></span></strong>&nbsp;Dolares de Estados Unidos de America, moneda de curso legal, en dinero en efectivo, en caso de retraso el día sesenta.  El Deudor cancelará la presente obligación mediante un solo pago. El pago lo hará el Deudor en cualquiera de las sucursales de Optica AV Plus.<br><br><br>

<strong>La suma adeudada contenida en este pagaré, devengará los siguientes intereses:</strong><br>
a)&nbsp;<u>De 30 a 60 días posteriores al plazo de pago, el cero por ciento de interés (5%) sobre monto total.</u><br>
b)&nbsp;<u>De 61 a 90 días posteriores al plazo de pago, el cinco por ciento de interés (5%) anual.</u><br>
c)&nbsp;<u>De 91 en adelante al plazo de pago, un diez por ciento de interés (10.0%) anual.</u><br><br><br>

En caso de incumplimiento de pago en los términos aquí prometidos o de incumplimiento de cualquier otro compromiso aquí establecido, el Acreedor podrá tener por vencida, liquida y exigible la obligación y recurrir legalmente a su cobro, renunciando el Deudor a su domicilio y a los requerimientos de pago. En caso de ejecución, el Deudor responderá por la suma que se le adeude al Acreedor en ese momento por concepto de capital así como los intereses ordinarios que adeude conforme a las tasas referidas. La obligación del Deudor se origina de operaciones mercantiles entre el Acreedor y el Deudor. Este título se rige por las disposiciones del Código de Comercio y se suscribe en San Salvador, El Salvador.<br><br><br>

Para los efectos de esta obligación mercantil el Deudor fija como domicilio especial la ciudad de San Salvador, a cuyos tribunales se somete y en caso de acción judicial renuncia al derecho de apelar del decreto de embargo, sentencia de remate y de toda otra providencia apelable que se dictare en su contra en el juicio mercantil ejecutivo o en sus incidentes, siendo a cargo del Deudor los costos procesales y cualquier otro gastos que el Acreedor hiciere en el cobro de este Pagaré, inclusive los llamados gastos personales y aun cuando por regla general no hubiere condenación en costos y faculta al Acreedor para que designe a su entera libertad a la persona depositaria de los bienes que se embarguen, a quien releva de la obligación de rendir fianza.<br><br><br>

Firmo de conformidad de lo anteriormente mencionado<br>

San Salvador, El Salvador,&nbsp;<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y"); echo $hoy; ?><br><br>
Firma  Deudor: ______________________
</p>
<?php
  }
?>
     
</div>
<p style="text-align: right;font-size: 9px" align="right">Este documento ha sido emitido por el departamento Empresarial de Óptica AV Plus y creado por: <?php echo $_SESSION["nombres"]."&nbsp;-&nbsp;".$hoy;?></p>
</body>
</html>




/////DESC_planilla.php

<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once('header_dos.php');
require_once('modals/modal_detalle_orden.php');
//require_once("modals/modal_correlativo_factura.php");

$cat_user = $_SESSION["categoria"];
require_once("modelos/Reporteria.php");
$reporteria = new Reporteria();
?>
 <style type="text/css">
    .dataTables_filter {
   float: right !important;
   width: 100%;
}
</style>

<div class="content-wrapper">
<input type="hidden" name="cat_user" id="cat_user" value="<?php echo $cat_user;?>"/>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-9">
            <h5 align="center"><i class="fas fa-list" style="color:green"></i> <strong>&nbsp;DESCUENTOS EN PLANILLA</strong></h5>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">OID Pendientes</li>
              <li class="breadcrumb-item"><a href="oid_aprobadas.php">OID Aprobadas</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <div class="col-md-12">

    <div class="card" style="margin: 1px">
     
    <!--ESTE DATATABLE SE RECARGA DESDE  credit-->
    <table id="data_orden_aprob" width="100%" style="text-align: center;text-align:center" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered display nowrap">
      <thead style="color:black;min-height:10px;border-radius: 2px;font-style: normal;font-size: 15px" class="bg-info">
          <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 12px;text-align: center">
            <td  style="text-align:center;">ID</td>
            <td  style="text-align:center;"># Orden</td>
            <td  style="text-align:center;">Titular</td>
            <td  style="text-align:center;">Empresa</td>
            <td  style="text-align:center;">Fecha creación</td>
            <td  style="text-align:center;">Estado</td>
            <td style="text-align:center;">Acciones</td>
            <td style="text-align:center;">Imprimir</td>
            <td style="text-align:center;">Eliminar</td>
         </tr>
        </thead>
        <tbody style="text-align:center;color: black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center">                                        
        </tbody>
      </table>
    </div>
    </div>
    <input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
    <input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
    <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">          
 
 <?php require_once("footer.php"); ?>
 <input type="hidden" id="name_pag" value="DESCUENTOS EN PLANILLA">
 <script type="text/javascript" src="js/creditos.js"></script>
 <script type="text/javascript" src="js/bootbox.min.js"></script>
   <script type="text/javascript">
    var title = document.getElementById("name_pag").value;
    document.getElementById("title_mod").innerHTML=" "+ title;
  </script>

    <!-- MODAL DEPOSITO A CAJA CHICA -->
  <div class="modal fade" id="depositos_caja">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CAJA CHICA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">

            <div class="col-sm-12 invoice-col">
              <span style="margin-right: 5px"><strong>Saldo Actual $<span id="saldo_caja" style="font-size: 18px;color: blue"></span></strong><br>
              <label>Monto a Depositar $</label>
                <input type="number" class="form-control" id="monto_deposito" style="margin:0px;text-align: right;">
              </div>
          </div>
        </div>
        <input type="hidden" id="tipo_mov" value="deposito">
        <input type="hidden" id="id_caja_chica">
        <!-- Modal footer -->
        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="clear_items_req();"> CANCELAR</button>
              <button type="button" class="btn btn-success" onClick="deposito_caja();"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i> DEPOSITAR</button>
            </div>
        
      </div>
    </div>
  </div>
 <?php } else{
echo "Acceso no permitido";
header("Location:index.php");
        exit();
  } ?>



//oid_probadas.php
<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
  require_once('header_dos.php');
  require_once('modals/modal_detalle_orden.php');
  require_once("modals/modal_correlativo_factura.php");

  $cat_user = $_SESSION["categoria"];
  require_once("modelos/Reporteria.php");
  $reporteria = new Reporteria();
  ?>

  <style type="text/css">
    .dataTables_filter {
     float: right !important;
     width: 100%;
   }
 </style>

 <div class="content-wrapper">
  <input type="hidden" name="cat_user" id="cat_user" value="<?php echo $cat_user;?>"/>
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-9">
            <h5 align="center"><i class="fas fa-list" style="color:green"></i> <strong>&nbsp;LISTA OIDS APROBADAS</strong></h5>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="desc_planilla.php">OID Pendientes</a></li>
              <li class="breadcrumb-item active">OID Aprobadas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content" style="border-right:50px">
    <div class="container-fluid">
      <div class="col-md-12">

        <div class="card" style="margin: 1px">
          <div class="card-body">
            
          <!--ESTE DATATABLE SE RECARGA DESDE  credit-->
          <table id="oid_aprobadas" width="100%" style="text-align: center;text-align:center" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered display nowrap">
            <thead style="color:black;min-height:10px;border-radius: 2px;font-style: normal;font-size: 15px" class="bg-info">
              <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 12px;text-align: center">
                <td  style="text-align:center;">ID</td>
                <td  style="text-align:center;"># Orden</td>
                <td  style="text-align:center;">Titular</td>
                <td  style="text-align:center;">Empresa</td>
                <td  style="text-align:center;">Fecha creación</td>
                <td  style="text-align:center;">Estado</td>
                <td style="text-align:center;">Ver detalles</td>
                <td style="text-align:center;">Orden</td>
                <td style="text-align:center;">Pagaré</td>
              </tr>
            </thead>
            <tbody style="text-align:center;color: black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center">                                        
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">


<?php require_once("footer.php"); ?>
<input type="hidden" id="name_pag" value="DESCUENTOS EN PLANILLA">
<script type="text/javascript" src="js/creditos.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript">
  var title = document.getElementById("name_pag").value;
  document.getElementById("title_mod").innerHTML=" "+ title;
</script>

<?php } else{
  echo "Acceso no permitido";
  header("Location:index.php");
  exit();
} ?>


cargos_aprob.php
////////////<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once('header_dos.php');
require_once('modals/modal_detalle_orden.php');
require_once("modals/modal_correlativo_factura.php");

$cat_user = $_SESSION["categoria"];
require_once("modelos/Reporteria.php");
$reporteria = new Reporteria();
?>

 <style type="text/css">
    .dataTables_filter {
   float: right !important;
   width: 100%;
}
</style>

<div  class="content-wrapper">
<input type="hidden" name="cat_user" id="cat_user" value="<?php echo $cat_user;?>"/>


  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-9">
            <h5 align="center"><i class="fas fa-list" style="color:green"></i> <strong>&nbsp;CARGOS AUTOMATICOS APROBADOS</strong></h5>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cargos_pend.php">Cargos Pendientes</a></li>
              <li class="breadcrumb-item active">Cargos aprobados</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <div class="col-md-12">

    <div class="card" style="margin: 1px">
     
    <!-- ESTE DATATABLE SE RECARGA DESDE  creditos -->
    <table id="cargos_aprobados" width="100%" style="text-align: center;text-align:center" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered display nowrap">
      <thead style="color:black;min-height:10px;border-radius: 2px;font-style: normal;font-size: 15px" class="bg-info">
          <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 12px;text-align: center">
            <td style="text-align:center;">ID</td>
            <td style="text-align:center;"># Orden</td>
            <td style="text-align:center;">Titular</td>
            <td style="text-align:center;">Fecha creación</td>
            <td style="text-align:center;">Estado</td>
            <td style="text-align:center;">Acciones</td>
            <td style="text-align:center;">Cargo</td>
            <td style="text-align:center;">Pagaré</td>
         </tr>
        </thead>
        <tbody style="text-align:center;color: black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center">                                        
        </tbody>
      </table>
    </div>
    </div>
    <input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
    <input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
    <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">          
 
 <?php require_once("footer.php"); ?>
 <input type="hidden" id="name_pag" value="DESCUENTOS EN PLANILLA">
 <script type="text/javascript" src="js/creditos.js"></script>
 <script type="text/javascript" src="js/bootbox.min.js"></script>
   <script type="text/javascript">
    var title = document.getElementById("name_pag").value;
    document.getElementById("title_mod").innerHTML=" "+ title;
  </script>
</div>
   
 <?php } else{
echo "Acceso no permitido";
header("Location:index.php");
        exit();
  } ?>

CARGOS_PEND.php
<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once('header_dos.php');
require_once('modals/modal_detalle_orden.php');
require_once("modals/modal_correlativo_factura.php");

$cat_user = $_SESSION["categoria"];
require_once("modelos/Reporteria.php");
$reporteria = new Reporteria();
?>

 <style type="text/css">
    .dataTables_filter {
   float: right !important;
   width: 100%;
}
</style>

<div  class="content-wrapper">
<input type="hidden" name="cat_user" id="cat_user" value="<?php echo $cat_user;?>"/>


  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-9">
            <h5 align="center"><i class="fas fa-list" style="color:green"></i> <strong>&nbsp;CARGOS AUTOMATICOS PENDIENTES</strong></h5>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Cargos Pendientes</li>
              <li class="breadcrumb-item"><a href="cargos_aprob.php">Cargos Aprobados</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <div class="col-md-12">

    <div class="card" style="margin: 1px">
     
    <!-- ESTE DATATABLE SE RECARGA DESDE  creditos -->
    <table id="cargos_pendientes" width="100%" style="text-align: center;text-align:center" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered display nowrap">
      <thead style="color:black;min-height:10px;border-radius: 2px;font-style: normal;font-size: 15px" class="bg-info">
          <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 12px;text-align: center">
            <td style="text-align:center;">ID</td>
            <td style="text-align:center;"># Orden</td>
            <td style="text-align:center;">Titular</td>
            <td style="text-align:center;">Fecha creación</td>
            <td style="text-align:center;">Estado</td>
            <td style="text-align:center;">Acciones</td>
            <td style="text-align:center;">Cargo</td>
            <td style="text-align:center;">Pagaré</td>
            <td style="text-align:center;">Eliminar</td>
         </tr>
        </thead>
        <tbody style="text-align:center;color: black;font-family: Helvetica, Arial, sans-serif;font-size: 12px;text-align: center">                                        
        </tbody>
      </table>
    </div>
    </div>
    <input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
    <input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
    <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">          
 
 <?php require_once("footer.php"); ?>
 <input type="hidden" id="name_pag" value="DESCUENTOS EN PLANILLA">
 <script type="text/javascript" src="js/creditos.js"></script>
 <script type="text/javascript" src="js/bootbox.min.js"></script>
   <script type="text/javascript">
    var title = document.getElementById("name_pag").value;
    document.getElementById("title_mod").innerHTML=" "+ title;
  </script>

    <!-- MODAL DEPOSITO A CAJA CHICA -->
  <div class="modal fade" id="depositos_caja">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CAJA CHICA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">

            <div class="col-sm-12 invoice-col">
              <span style="margin-right: 5px"><strong>Saldo Actual $<span id="saldo_caja" style="font-size: 18px;color: blue"></span></strong><br>
              <label>Monto a Depositar $</label>
                <input type="number" class="form-control" id="monto_deposito" style="margin:0px;text-align: right;">
              </div>
          </div>
        </div>
        <input type="hidden" id="tipo_mov" value="deposito">
        <input type="hidden" id="id_caja_chica">
        <!-- Modal footer -->
        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="clear_items_req();"> CANCELAR</button>
              <button type="button" class="btn btn-success" onClick="deposito_caja();"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i> DEPOSITAR</button>
            </div>
        
      </div>
    </div>
  </div>
 <?php } else{
echo "Acceso no permitido";
header("Location:index.php");
        exit();
  } ?>
  