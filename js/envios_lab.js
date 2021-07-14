function init(){
 get_numero_orden();
}
function get_numero_orden(){
 console.log('Hello World')
  $.ajax({
      url:"ajax/laboratorios.php?op=get_correlativo_orden",
      method:"POST",
      cache:false,
      dataType:"json",
      success:function(data){
       console.log(data)   
       $("#correlativo_envio_lab").html(data.cod_orden);
       //$("#correlativo_op").html(data.codigo_orden);      
      }
    });

  //clear_form_orden();
 }


function registrarEnvioLab(){

    var clase = document.getElementsByClassName("validate");

    for(i=0;i<clase.length;i++){
      let val_element = clase[i].value;
      let id_element = clase[i].id;

      if(val_element==""){
        let elemento = document.getElementById(id_element);
        elemento.className += " is-invalid";
        alerts("warning");
        return false
      }else{
        let elemento = document.getElementById(id_element);
        document.getElementById(id_element).classList.remove('is-invalid');
        elemento.className += " is-valid";
      }
    }


  let cod_orden = $("#correlativo_envio_lab").html();
  let paciente = $("#paciente_orden_lab").val();
  let empresa = $("#empresa_lab").val();
  let laboratorio = $("#laboratorio_orden_lab").val();
  let lente = $("#lente_orden_lab").val();
  let modelo_aro = $("#modelo_aro_lab").val();
  let marca_aro = $("#marca_aro_lab").val();
  let color_aro = $("#color_aro_lab").val();
  let diseno_aro = "0";
  let user = $("#usuario_orden").val();
  let usuario = user.toString();
  let sucursal = $("#sucursal_orden_lab").val();
  let prioridad = $("#prioridad_orden_lab").val();
  let observaciones = $("#observaciones_orden_lab").val();

  //if (cod_orden != "" && paciente) {}
    $.ajax({
      url:"ajax/laboratorios.php?op=registrarEnvioLab",
      method:"POST",
      cache:false,
      data: {cod_orden:cod_orden,paciente:paciente,empresa:empresa,laboratorio:laboratorio,lente:lente,modelo_aro:modelo_aro,marca_aro:marca_aro,color_aro:color_aro,diseno_aro:diseno_aro,usuario:usuario,sucursal:sucursal,prioridad:prioridad,observaciones:observaciones},
      dataType:"json",
      success:function(data){
       console.log(data)   
       if(data == 'ok'){
        Swal.fire('Se ha registrado una orden a la lista de pendientes por enviar!','','success');
        $("#nueva_orden_lab_dos").modal('hide');
        listar_ordenes_creadas();
       }else{
        Swal.fire('Código ya registrado, Actualizar el navegador!','','success');
       }     
      }
    });
}

$(document).on('keyup', '.is-invalid', function(){
let id  = $(this).attr("id");
document.getElementById(id).classList.remove('is-invalid');
document.getElementById(id).classList.add('is-valid');

});
$(document).on('click', '.is-valid', function(){
let id  = $(this).attr("value");
console.log(id)
if (id!="") {
  document.getElementById(id).classList.remove('is-invalid');
  document.getElementById(id).classList.add('is-valid');
}


});

function alerts(alert){
    Swal.fire('Existen Campos obligatorios vacios!','',alert);
}

/////////////////////LISTAR ORDENES CREADAS - PENDIENTES
function listar_ordenes_creadas(){

tabla_envios_gral=$('#data_orders_lab').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [
                'excelHtml5'
            ],
    "ajax":
        {
          url: 'ajax/laboratorios.php?op=get_ordenes_creadas',
          type : "post",
          dataType : "json",
          //data:{},
          error: function(e){
            console.log(e.responseText);
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 25,//Por cada 10 registros hace una paginación
      "order": [[ 0, "desc" ]],//Ordenar (columna,orden)

      "language": {

          "sProcessing":     "Procesando...",

          "sLengthMenu":     "Mostrar _MENU_ registros",

          "sZeroRecords":    "No se encontraron resultados",

          "sEmptyTable":     "Ningún dato disponible en esta tabla",

          "sInfo":           "Mostrando un total de _TOTAL_ registros",

          "sInfoEmpty":      "Mostrando un total de 0 registros",

          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix":    "",

          "sSearch":         "Buscar:",

          "sUrl":            "",

          "sInfoThousands":  ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {

              "sFirst":    "Primero",

              "sLast":     "Último",

              "sNext":     "Siguiente",

              "sPrevious": "Anterior"

          },

          "oAria": {

              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",

              "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }

         }//cerrando language

  }).DataTable();
}

 init();