function init(){
 get_numero_orden();
 count_states_orders();
 document.getElementById("btn_send_lab").style.display = "none";
 document.getElementById("btn_receive_lab").style.display = "none";
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

  clear_form_orden();
 }

function clear_form_orden(){
  var element = document.getElementsByClassName("clear_orden_i");

    for(i=0;i<element.length;i++){
      let id_element = element[i].id;
      document.getElementById(id_element).classList.remove('is-invalid');
      document.getElementById(id_element).classList.remove('is-valid');
      document.getElementById(id_element).value="";
    }
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
        console.log(id_element)
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
////////////ORDENES ERECIBIDAS ////////
function listar_ordenes_creadas(){
  document.getElementById("head_th").style.background = "#C0C0C0";
  document.getElementById("header_title").style.color = "black";
  $("#col_seis").html("Fecha creación");
  let estado = "Creadas";
  let titulo = "ORDENES POR ENVIAR";
  let tabla = 'data_orders_lab';
  document.getElementById("btn_receive_lab").style.display = "none";
  listar_ordenes(tabla,estado,titulo)
}
////////////////ORDENES ENVIADAS /////////
function listar_ordenes_enviadas(){
  let estado = "Enviadas";
  $("#header_title").html("ORDENES ENVIADAS");
  document.getElementById("head_th").style.background = "#0275d8";
  document.getElementById("header_title").style.color = "white";
  //let tabla = 'data_orders_lab';
  $("#col_diez").html("Tiempo transc.");
  $("#col_seis").html("Fecha Envío");
  document.getElementById("btn_send_lab").style.display = "none";
  document.getElementById("btn_receive_lab").style.display = "block";
  get_ordenes_enviadas_data(tabla);
}

/////////////////////LISTAR ORDENES CREADAS - PENDIENTES
function listar_ordenes(tabla,estado,titulo){

$("#header_title").html(titulo);

tabla_envios_gral=$('#'+tabla).dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [
                'excelHtml5'
            ],
    "ajax":
        {
          url: 'ajax/laboratorios.php?op=listar_ordenes',
          type : "post",
          dataType : "json",
          data:{estado:estado},
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
document.getElementById("btn_send_lab").style.display = "block";
}

/////////////////////   LISTAR ORDENES ENVIADAS ///////////////
function get_ordenes_enviadas_data(){
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
          url: 'ajax/laboratorios.php?op=listar_ordenes_enviadas',
          type : "post",
          dataType : "json",
          //data:{estado:estado},
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


////////////////CREATE ARRAY SEND ORDENES //////
let items_envios_ord = [];

$(document).on('click', '.envio_orden_labs', function(){
 //console.log('Holaaa');
  let codigo = $(this).attr("value");
  let paciente = $(this).attr("name");
  let id_item = $(this).attr("id");

  var checkbox = document.getElementById(id_item);
  let check_state = checkbox.checked;

  if (check_state == true) {
        let obj = {
         codigo : codigo,
         paciente : paciente 
       }
       items_envios_ord.push(obj);
  }else if(check_state == false){
  let index = items_envios_ord.findIndex(x => x.cod==codigo)
  console.log(index)
  items_envios_ord.splice(index, 1)
  }
  
});

///////CREATE ARRAY RECEIVED ORDERS ///////////
let items_received_ord = [];

$(document).on('click', '.receive_ordenes_lab', function(){
 console.log('Holaaa');
  let codigo = $(this).attr("value");
  let paciente = $(this).attr("name");
  let id_item = $(this).attr("id");

  var checkbox = document.getElementById(id_item);
  let check_state = checkbox.checked;

  if (check_state == true) {
        let obj = {
         codigo : codigo,
         paciente : paciente 
       }
       items_received_ord.push(obj);
  }else if(check_state == false){
  let index = items_received_ord.findIndex(x => x.cod==codigo)
  console.log(index)
  items_received_ord.splice(index, 1)
  }
  
});

//////////////////// REGISTRAR ENVIO ///////////////
function enviar_ordenes_lab(){  
  let cant_trabajos = items_envios_ord.length;
  if (cant_trabajos<1){
    Swal.fire('La orden de envíos está vacia!','','error');
    return false;
  }
  $("#confirm-envio").modal("show");
  $("#n_trabajos").html(cant_trabajos);  
}

////////////// REGISTRAR RECIBIR //////////////////
function recibir_ordenes_lab(){  
  let cant_trabajos_r = items_received_ord.length;
  if (cant_trabajos_r<1){
    Swal.fire('Debe agregar trabajos a la orden de recibidos!','','error');
    return false;
  }
  $("#confirm-receive").modal("show");
  $("#n_trabajos_r").html(cant_trabajos_r);  
}

function registrarEnvio(){
  let user_envio = $("#usuario_envio").val();
  if (user_envio=="") {
    Swal.fire('Seleccionar usuario!','','error');
    return false;
  }
  
  let usuario = user_envio.toString(); 
  //let observaciones = $("#observaciones_envio").val();
  $("#confirm-envio").modal("hide");
  $.ajax({
    url:"ajax/laboratorios.php?op=registrar_envio",
    method:"POST",
    data:{'arrayDetEnvio':JSON.stringify(items_envios_ord),'usuario':usuario},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },     
    success:function(data){
    console.log(data);
    if (data=='ok') {
      Swal.fire('Se ha registrado un envio a laboratorios!','','success');
      listar_ordenes_creadas();
      count_states_orders();
      items_envios_ord = [];

    }
    }

    });//////FIN AJAX

}

function recibirOrdenes(){
  let user_recibe = $("#usuario_recibe").val();
  if (user_envio=="") {
    Swal.fire('Seleccionar usuario!','','error');
    return false;
  }
  
  let usuario = user_recibe.toString(); 
  //let observaciones = $("#observaciones_envio").val();
  $("#confirm-receive").modal("hide");
  $.ajax({
    url:"ajax/laboratorios.php?op=recibir_ordenes",
    method:"POST",
    data:{'arrayDetRecibe':JSON.stringify(items_received_ord),'usuario':usuario},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },     
    success:function(data){
    console.log(data);
    
    if (data=='ok') {
      Swal.fire('Orden de recibidos, registrados exitosamente!','','success');
      listar_ordenes_creadas();
      count_states_orders();
      items_envios_ord = [];

    }
    }

    });//////FIN AJAX

}

function count_states_orders(){
  $.ajax({
    url:"ajax/laboratorios.php?op=count_ordenes_creadas",
    method:"POST",
    //data:{sucursal:sucursal},
    dataType:"json",
    success:function(data){
    console.log(data);//return false;
    $("#alert_creadas_ord").html(data);    
    }     
  });

  $.ajax({
    url:"ajax/laboratorios.php?op=count_ordenes_enviadas",
    method:"POST",
    //data:{sucursal:sucursal},
    dataType:"json",
    success:function(data){
    console.log(data);//return false;
    $("#alert_enviadas_ord").html(data);    
    }     
  });

}

 init();