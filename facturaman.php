<?php 
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
    require_once('header_dos.php');
    date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Nueva Factura
</button>
    
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
<input type="hidden" name="usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
           
 
 <?php require_once("footer.php"); ?>
 <input type="hidden" id="name_pag" value="ENVIOS A LABORATORIO">

  <!-- The Modal -->
  <div class="modal" id="myModal">
  <div class="modal-dialog" style="max-width: 70%;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info" style="padding:5px;color:white; text-align:center">
        <h4 class="modal-title  w-100 text-center position-absolute" id="title-cobros-gen" style='font-size:15px'>FACTURA MANUAL</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="form-row">

            <div class="form-group col-md-5">
                <label for="ex3">Cliente</label>
                <input type="search"  class="form-control clear_input" name=""  id="cliente">
            </div>

            <div class="form-group col-md-5">
                <label for="ex3">Dirección</label>
                <input type="search"  class="form-control clear_input" name=""  id="dir">
            </div>

            <div class="form-group col-md-2">
                <label for="ex3">Tel.</label>
                <input type="search"  class="form-control clear_input" name=""  id="tel">
            </div>
        </div>
        
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="ex3">Cantidad</label>
                <input type="number"  class="form-control clear_input" name="" placeholder="Cant." required="" id="cantfac">
            </div>

            <div class="form-group col-md-8">
                <label for="ex3">Descripcion</label>
                <input type="search"  class="form-control clear_input" name="" placeholder="Descripcion" required="" id="desc_fact">
            </div>

            <div class="form-group col-md-2">
                <label for="ex3">P. Unit.</label>
                <input type="number"  class="form-control clear_input" name="" placeholder="Precio Unitario." required="" id="p_unit_fact">
            </div>            
        </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-block btn-secondary" onClick="sendDataFact()">IMPRIMIR</button>
      </div>

    </div>
  </div>
</div>
  
</div>

 <script type="text/javascript" src="js/bootbox.min.js"></script>
 <script>
var items_factura = [];
function EnterEvent() {
    
if (event.keyCode == 13) {
  let cantidad = document.getElementById("cantfac").value;
  let desc= document.getElementById("desc_fact").value;
  let punit = document.getElementById("p_unit_fact").value; 

  if(cantidad !="" && desc !="" && punit !=""){
    let item = {
        cantidad:cantidad,
        desc:desc,
        punit:punit
    }
    items_factura.push(item);
    console.log(items_factura);
  }else{
    alert("Debe completar los detalles del item")
  }
}

}//Fin enter event


function sendDataFact(){
    let paciente = document.getElementById("cliente").value;
    data = Object.values(items_factura);
    //[window.location = ('imp_factura_manual.php?info='+ JSON.stringify(data));
    window.open('imp_factura_manual.php?info='+ JSON.stringify(data)+"&cliente="+paciente
    , '_blank');
}

window.onkeydown = EnterEvent;  
 </script>

    <!-- MODAL DEPOSITO A CAJA CHICA -->
  
 <?php } else{
echo "Acceso no permitido";
header("Location:index.php");
        exit();
  } ?>