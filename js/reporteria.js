function get_data_ccf(){

 let items = array_total_ccf.length;

 if (items<1) {
 	Swal.fire('Debe Seleccionar pacientes','','error');
 	$("#modal-default").modal('hide');
 	return false;
 }

 document.getElementById("contribuyente_tipo").checked = false;
 let monto_ccf = 0;
 let items_ccf = '';

 for(let j=0;j<array_total_ccf.length;j++){
 	monto_ccf += parseFloat(array_total_ccf[j].monto_venta);
 	items_ccf += "<b>"+array_total_ccf[j].numero_venta+"</b>"+"=$"+array_total_ccf[j].monto_venta+"; ";
 }
 let empresa = $("#empresa").val();

 $("#monto_ccf_det").val(monto_ccf);
 $("#items_ccf_det").val(items_ccf);
 $("#items_lengt").val(array_total_ccf.length);
 $("#empresa_cff").val(empresa);
}

function emitir_ccf(id_paciente,numero_venta,nombres){
	$("#ccf_generica").modal('show');
	$("#n_venta_ccf").val(numero_venta);
	$("#id_paciente_ccf").val(id_paciente);
	$("#cliente_ccf").val(nombres);
}