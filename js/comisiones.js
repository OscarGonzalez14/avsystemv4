function init(){
	cargar_data_year();
}

function cargar_data_year(){
  
  $('#year_comision').each(function() {

  var year = (new Date()).getFullYear();
  var current = year;
  year -= 1;
  for (var i = 0; i < 15; i++) {
    if ((year+i) == current)
      $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
    else
      $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
  }

})
}

function get_categoria_empleado(){
	let id_empleado = $("#emp_comision").val();
	console.log('Este es el id:'+id_empleado)
}

init();