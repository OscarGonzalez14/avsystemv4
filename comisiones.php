<?php 
  require_once("config/conexion.php");
  if(isset($_SESSION["usuario"])){ 
  require_once('header_dos.php');
  require_once("modelos/Reporteria.php");
  $reportes = new Reporteria();
?>
 <style type="text/css">
    .dataTables_filter {
    float: right !important;
    width: 100%;
  }
</style>

<div class="content-wrapper">
  <input type="hidden" name="cat_user" id="cat_user" value="<?php echo $cat_user;?>"/>
    <section class="content" style="border-right:50px">
      <div class="container-fluid">
    <div class="col-md-12">
      <div class="card" style="margin: 1px">
        <div class="card-body"></div>
    <input type="text" class="form-control" id="fecha_comision">
    <button onClick="fecha_com();">BUSCAR</button>
   <!-- <table id="data_comisiones" width="100%" style="text-align: center;text-align:center" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered display nowrap">
      <thead style="color:black;min-height:10px;border-radius: 2px;font-style: normal;font-size: 15px" class="bg-info">
          <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 15px">

            <td style="text-align:center">FECHA</td>
            <td style="text-align:center">PACIENTE</td>
            <td style="text-align:center">Fecha</td>
            <td style="text-align:center">Estado</td>
            <td style="text-align:center">Sucursal</td>
            <td style="text-align:center">Acciones</td>
            <td style="text-align:center">Imprimir</td>
         </tr>
        </thead>
        <tbody style="text-align:center;color: black">                                        
        </tbody>
      </table>-->
    </div>
    </div>
          <input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
          <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
          <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
          <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
           
 
 <?php require_once("footer.php"); ?>
 <input type="hidden" id="name_pag" value="MODULO CAJA CHICA">
 <script type="text/javascript" src="js/caja.js"></script>
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
  <script>
 $(function () {
    /// Date range picker /// 
    $('#fecha_comision').daterangepicker();
        //Timepicker
   /* $('#fecha_comision').datetimepicker({
        minDate: 0,
        maxDate: '+1M',
        numberOfMonths:1
    }) */
        $('#fecha_comision').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), 
     moment().subtract(1, 'month').endOf('month')]
    },
    "dateLimit": {
            "month": 1
        },
 }, cb);     
  });
</script>
 <?php } else{
echo "Acceso no permitido";
header("Location:index.php");
        exit();
  } ?>