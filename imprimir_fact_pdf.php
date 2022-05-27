<?php ob_start();
use Dompdf\Dompdf;
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';
require_once 'helpers/converText.php';
require_once("modelos/Reporteria.php");
$reporteria=new Reporteria();

$id_paciente_fact =$_POST["id_paciente_fact"];
$n_venta_fact =$_POST["n_venta_fact"];
$direccion = $_POST["direcion_fact"];
$direcion_fact = $_POST["direcion_fact"];
$cliente_fact = $_POST["cliente_fact"];

$datos_factura_cantidad = $reporteria->get_datos_factura_cantidad($n_venta_fact,$id_paciente_fact);
$datos_factura_producto = $reporteria->get_datos_factura($n_venta_fact,$id_paciente_fact);
$datos_factura_precio_u = $reporteria->get_datos_factura_p_unitario($n_venta_fact,$id_paciente_fact);
$datos_factura_subtotal = $reporteria->get_datos_factura_subtotal($n_venta_fact,$id_paciente_fact);
$datos_factura_paciente = $reporteria->get_datos_factura_paciente($id_paciente_fact);
$datos_factura_venta    = $reporteria->get_datos_factura_venta($n_venta_fact,$id_paciente_fact);

//var_dump($datos_factura_precio_u);exit();
//$datos_empresa = $reporteria->get_datos_empresa($_GET["empresa"]);
date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style>
      html{
      	margin-top: 0;
        margin-left: 10px;
        margin-right:10px; 
        margin-bottom: 0;
    }

    .stilot1{
       border: 1px solid black;
       padding: 5px;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
       border-collapse: collapse;
       text-align: center;
    }

    .stilot2{
       border: 1px solid black;
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }
    .stilot3{
       text-align: center;
       font-size: 11px;
       font-family: Helvetica, Arial, sans-serif;
    }

    #table2 {
       border-collapse: collapse;
    }
   </style>
  </head>
  <body>

<div style="margin-top: 70px;height:525px" >
  <?php include 'helpers/plantilla_fact.php'; ?>
</div>

<!-- PARTE 2-->
<div style="margin-top: 25px;height:445px" >
  <?php include 'helpers/plantilla_fact.php'; ?>
</div>

</body>
</html>
<?php
$salida_html = ob_get_contents();

  //$user=$_SESSION["id_usuario"];

ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('document', array('Attachment'=>'0'));
?>