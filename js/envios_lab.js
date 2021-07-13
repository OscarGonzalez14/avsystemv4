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
       }      
      }
    });


}

 init();