<style>
.modal-header{
  background-color:black;
  color:white;
}


.modal-body{
  overflow-y: auto;
}

</style>

<!-- The Modal -->
  <div id="modal_ingreso_bodega" class="modal fullscreen-modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl modal-dialog  modal-dialog-centered" style="max-width:75%">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="justify-content:space-between;">
          <span class="modal-title"><strong> Ingresar Productos a Bodega</strong></span>
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table-hover table-bordered table-striped" id="data_productos_ingresos_bodega" width="100%" border="">
                  <thead style="background:#034f84;color:white">
                    <tr>
                      <th style="text-align:center" width="5%">ID</th>
                      <th style="text-align:center" width="5%"># Compra</th>
                      <th style="text-align:center" width="80%">Descripción</th>
                      <th style="text-align:center" width="5%">Disp.</th>
                      <th style="text-align:center" width="5%">Agregar</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;font-size:14px;">
                                        
                  </tbody>
          </table>
        </div>
        

        
      </div>
    </div>
  </div>
