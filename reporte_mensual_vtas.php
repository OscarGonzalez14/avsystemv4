<?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
  require_once('header_dos.php');
  require_once('modals/modal_detalle_ventas.php');
  date_default_timezone_set('America/El_Salvador'); $hoy = date("Y-m-d");;
  ?>
  <div class="content-wrapper">
    <div class="row" style="margin-top: 5px">
      <div class="col-12">
        <div class="callout callout-info" style="border-bottom: solid 1px #008080;">

          <div class="row">
            <div class="col-sm-4">
              <form class="form-inline" action="" method="POST" target="_blank">
                <div class="col-auto">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Mes:</div>
                    </div>
                    <!--<input type="month" id="mes_vts" name="mes_vts" class="form-control" value="<?php echo $hoy?>">-->
                    <input data-provide="datepicker">
                    <input type="hidden" name="sucursal_user" id="sucursal_user" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"];?>">
                  </div>
                </div>
              </form>
            </div>
              <div class="col-sm-8">
                <div>
                 <ul class="breadcrumb float-sm-right" style="background-color:transparent;padding:0px;">
                   <li class="breadcrumb-item"><a href="ventas.php">Nueva Venta</a></li>
                   <li class="breadcrumb-item active">Reporte</li>
                   <li class="breadcrumb-item"><a href="recibos.php">Recibos</a></li>
                 </ul>
               </div>
             </div>

             <div class="col-sm-12">
              <h3 align="center" style="text-align:center,margin-top:5px;"><i class="far fa-file-alt" style="color:green"></i><strong> REPORTE MENSUAL DE VENTAS </strong></h3>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>

    <div class="content" id="reporte_mensual_vtas">

     <div class="card-body p-0" style="margin:7px">
      <table id="lista_reporte_vtas_mensuales" width="100%" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered">
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center">
          <tr>
            <th>Fecha</th>
            <th>Paciente</th>
            <th>Evaluado</th>
            <th>Asesor</th>
            <th>Optometra</th>
            <th>Tipo Venta</th>
            <th>Tipo Pago</th>
            <th>Sucursal</th>
            <th>Monto</th>
          </tr>
        </thead>
        <tbody style="font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;">          
        </tbody>
      </table>
    </div>
  </div>
</div>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>

<?php require_once("footer.php");?>
<script src="js/ventas.js"> </script>
<script type="text/javascript">
  function get_date_corte() {
    let fecha_corte = document.getElementById("date_corte").value;
    console.log(fecha_corte);
    document.getElementById("fecha_corte").value = fecha_corte;
  }
  get_date_corte();
</script>
<?php } else{
  echo "Acceso no permitido";
} ?>
