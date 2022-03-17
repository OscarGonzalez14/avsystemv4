<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 

require_once("modelos/Externos.php");
$empresa = new Externos();
$empresas = $empresa->get_empresas_creditos();

require_once("header_dos.php");
require_once("modals/modal_abonos.php");
require_once("modals/modal_detalle_abonos.php");
require_once("modals/modal_correlativo_factura.php");
?>

 <div class="content-wrapper">
    <section class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2" style="margin: 2px">
          <div class="col-sm-5" style="align-items:left">
            <h5><strong><i class="fas fa-money-check" style="color:green" ></i> MONITOREO DE CREDITOS</strong></h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="invoice p-3 mb-3">
      <div class="row row2" style="background:#E0E0E0;border-radius: 5px">
        <div class="form-group col-sm-3">
          <label for="">Verificar créditos:</label>
          <select class="form-control input-dark" id="ver_credito">
            <option value=''>Seleccionar...</option>
            <option value='Creditos_Pendientes'>Creditos Pendientes</option>
            <option value='Creditos_Finalizados'>Creditos Finalizados</option>
          </select>
        </div>

        <div class="col-sm-5 select2-purple">
          <label for="ex3">Empresa</label>
          <select class="select2 form-control" id="nom_empresa" multiple="multiple" data-placeholder="Seleccionar Empresa" data-dropdown-css-class="select2-purple" style="width: 100%;height: ">              
            <option value="">Seleccionar empresa</option>
            <?php
            for ($i=0; $i < sizeof($empresas); $i++) { ?>
              <option value="<?php echo $empresas[$i]["nombre"]?>"><?php echo strtoupper($empresas[$i]["nombre"]);?></option>
            <?php  } ?>              
          </select>              
        </div>

        <div class="form-group col-sm-2" style="margin-top:32px;">
          <button type="button" class=" btn btn-light visualizar" onClick="filtrar_creditos();"><i class="fas fa-search" style="color: green; border:gray;"></i> Filtrar</button>
        </div>

        <div class="form-group col-sm-2" style="margin-top:32px;">
          <button type="button" class=" btn btn-light cobrar" ><i class="fas fa-tasks" style="color: green; border:gray;"></i> Cobrar</button>
        </div>
      </div>
    </div>

<section class="content" style="margin-top:5px">
  <div class="row">
   <div class="col-12">
    <div class="card">
    <div class="card-body">
      <section class="content">
      <div class="container_fluid">        
        <input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>   
        <table id="creditos_globales" class="table-hover table-bordered" width="100%">
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;">
           <tr>
            <th style='text-align: center;'>No. Venta</th>
            <th style='text-align: center;'>Empresa</th>
            <th style='text-align: center;'>Titular de credito</th>
            <th style='text-align: center;'>Monto</th>        
            <th style='text-align: center;'>Fecha inicio</th>
            <th style='text-align: center;'>Fecha final</th>
            <th style='text-align: center;'>Plazo</th>
            <th style='text-align: center;'>Saldo</th>
            <th style='text-align: center;'>Abonar</th>
            <th style='text-align: center;'>Historial</th>
            <th style='text-align: center;'>Factura</th>
          </tr>
     </thead>
     <tbody style="font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center">
   </table> 
      </div>
      </section>
    </div>
    </div>
   </div>
  </div>
 </section>
 </div>
<?php require_once("footer.php");?>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
<input type="hidden" id="name_pag" value="COBROS DE CREDITOS">
<input type="hidden" id="id_consulta">
<input type="hidden" id="id_paciente">
<input type="hidden" id="optometra" value="">
<script type="text/javascript" src="js/cleave.js"></script>
<script type="text/javascript" src="js/productos.js"></script>
<script type="text/javascript" src="js/pacientes.js"></script>
<script type="text/javascript" src="js/recibos.js"></script>
<script type="text/javascript" src="js/creditos.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/reporteria.js"></script>
<script type="text/javascript">
    var title = document.getElementById("name_pag").value;
    document.getElementById("title_mod").innerHTML=" "+
    title;

     function mayus(e) {
    e.value = e.value.toUpperCase();
  }
  </script>

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


<?php } else{
echo "Acceso denegado";
  } ?> 