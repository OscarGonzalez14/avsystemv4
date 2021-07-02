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
	let id_emp = $("#emp_comision").val();
  let id_empleado = id_emp.toString();
	$.ajax({
    url:"ajax/empleados.php?op=categoria_user",
    method:"POST",
    data:{id_empleado:id_empleado},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },     
    success:function(data){
    	if (data = 1){
       get_comision_cat_uno();
      }
    }

    });//////FIN AJAX	
}

function get_comision_cat_uno(){
  let sucursal = $("#sucursal").val();
  let year = $("#year_comision").val();
  let mes = $("#month_comision").val();
    $.ajax({
    url:"ajax/empleados.php?op=get_comision_cat_uno",
    method:"POST",
    data:{sucursal:sucursal,year:year,mes:mes},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },     
    success:function(data){
      let total_ventas = data.total_ventas;
      let comision = data.comision;
      $("#ventas_uno").val("$"+total_ventas);
      $("#com_uno").val("$"+comision);

    }

    });//////FIN AJAX 
}

init();