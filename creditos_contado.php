
 <?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once("header_dos.php");
require_once("modals/modal_abonos.php");
require_once("modals/modal_detalle_abonos.php");
require_once("modals/modal_correlativo_factura.php");
require_once("modals/modal_ccf_generica.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-5" style="align-items:left">
            <h5><strong><i class="fas fa-money-check" style="color:green"></i> CRÉDITOS AL CONTADO</strong></h5>
          </div>
          <div class="col-sm-7">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="creditos.php" style="color:black">Créditos</a></li>
              <li class="breadcrumb-item active"><a>Contado</a></li>
              <li class="breadcrumb-item"><a href="creditos_planilla.php">Desc. Planilla</a></li>
              <li class="breadcrumb-item"><a href="creditos_cautomaticos.php">Cargo Auto</a></li>
              <li class="breadcrumb-item"><a href="creditos_mora.php">Créditos en mora</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" style="margin-top: 5px">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <!-- /.card-header -->
        <div class="card-body"><!--CONTENIDO-->
              <div class="invoice p-3 mb-3" style="margin-top:12px;">
      <div class="row row2" style="background:#E0E0E0;border-radius: 5px">
        <div class="form-group col-sm-3">
          <label for="">Verificar créditos:</label>
          <select class="form-control input-dark" id="ver_credito">
            <option value=''>Seleccionar...</option>
            <option value='Creditos_Finalizados'>Creditos Finalizados</option>
            <option value='Creditos_Pendientes'>Creditos Pendientes</option>
          </select>
        </div>
        <div class="form-group col-sm-2" style="margin-top:32px;">
          <button type="button" class=" btn btn-light visualizar" onClick="listar_creditos_sucursal();"><i class="fas fa-search" style="color: green; border:gray;"></i> Filtrar</button>
        </div>
      </div>
      </div>

<section class="content">
  <div class="container-fluid"><!--INICIO DE CONTENIDO-->
<table id="creditos_de_contado" class="table-hover table-bordered" width="100%" data-order='[[ 0, "desc" ]]'>
     <thead style="background:#034f84;color:white;text-align: center;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center">
       <tr>

        <th style='text-align: center;'>No. Venta</th>
        <th style='text-align: center;'>Titular de cuenta</th>
        <th style='text-align: center;'>Paciente Evaluado</th>        
        <th style='text-align: center;'>Monto</th>
        <th style='text-align: center;'>Saldo</th>
        <th style='text-align: center;'>Contacto</th>
        <th style='text-align: center;'>Fecha Adquirido</th>
        <th style='text-align: center;'>Sucursal</th>
        <th style='text-align: center;'>Asesor</th>
        <th style='text-align: center;'>Acciones</th>
       </tr>
     </thead>
     <tbody style="text-align: center;font-family: Helvetica, Arial, sans-serif;font-size: 11px;">
   </table> 
  </div><!--FIN INICIO DE CONTENIDO-->
  </div>
</section>


<?php require_once("footer.php");?>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
<input type="hidden" id="name_pag" value="CREDITOS DE CONTADO">
<input type="hidden" id="id_consulta">
<input type="hidden" id="id_paciente">
<input type="hidden" id="optometra" value="">
<script type="text/javascript" src="js/cleave.js"></script>
<script type="text/javascript" src="js/productos.js"></script>
<script type="text/javascript" src="js/pacientes.js"></script>
<script type="text/javascript" src="js/creditos.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/recibos.js"></script>
<script type="text/javascript" src="js/reporteria.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $(".select2").select2({
    maximumSelectionLength: 1
});
      })
</script>

  <script type="text/javascript">
    var title = document.getElementById("name_pag").value;
    document.getElementById("title_mod").innerHTML=" "+
    title;
  </script>
</div><!-- FIN CONTENIDO-->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>

function mayus(e) {
    e.value = e.value.toUpperCase();
}


   <?php } else{
echo "Acceso denegado";
  } ?>
