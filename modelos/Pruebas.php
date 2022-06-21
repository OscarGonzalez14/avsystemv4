<?php

require_once("../config/conexion.php");

class Pruebas extends Conectar{

	public function getCreditos(){
    $conectar=parent::conexion();
    parent::set_names();
	
  $sql3 = "select c.monto,c.numero_venta from creditos as c INNER join pacientes as p on c.id_paciente=p.id_paciente where forma_pago='Descuento en Planilla' and (numero_venta like '%AVME%' or numero_venta like '%EMMT%');";
  $sql3 = $conectar->prepare($sql3);
  $sql3->execute();

  return $sql3->fetchAll(PDO::FETCH_ASSOC);
}

}

$proof = new Pruebas();

$res = $proof->getCreditos();

foreach($res as $v){
	echo $v['numero_venta']."   ".$v['monto'].'<br>';
}

/*function sumDescuentosPlanilla(countCreditosDescplanilla ...Args ){
 let ventas = 0;
 let recuperado =0;
 let cobro_mensual =0;
 let saldo = 0;

 for (const arg of theArgs){
  ventas += arg;
  recuperado += arg;
  cobro_mensual += arg;
  saldo += arg;
 }
return ventas;
return recuperado;
return cobro_mensual;
return saldo;
}
console.log(sumDescuentosPlanilla);*/