<table width="100%">
    <tr>
      
  <td colspan="30" style="color:black;font-size:9px;border: 1px solid white;font-family: Helvetica, Arial, sans-serif;width: 30%"><strong>CLIENTE:</strong> <?php echo $_GET["cliente"];?></td>

    <td colspan="35" style="color:black;font-size:9px;border: 1px solid white;font-family: Helvetica, Arial, sans-serif;width: 35%"><strong>DIRECCION:</strong> <?php echo "";?></td>

    <td colspan="18" style="color:black;font-size:9px;border: 1px solid white;font-family: Helvetica, Arial, sans-serif;width: 18%"><strong>TELEFONO:</strong> <?php echo "";?></td>
    <td colspan="17" style="color:black;font-size:9px;border: 1px solid white;font-family: Helvetica, Arial, sans-serif;width: 17%"><strong>FECHA:</strong> <?php echo $hoy;?></td>

</tr>
</table>

<table id="table2" width="100%">
<tr>
    <th bgcolor="#0061a9" colspan="10" style="color:white;font-size:8px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width: 10%"><span class="Estilo11">CANT.</span></th>
    <th bgcolor="#0061a9" colspan="50" style="color:white;font-size:8px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width: 50%"><span class="Estilo11">DESCRIPCIÓN</span></th>
    <th bgcolor="#0061a9" colspan="10" style="color:white;font-size:8px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width: 10%"><span class="Estilo11">P/UNITARIO</span></th>
    <th bgcolor="#0061a9" colspan="10" style="color:white;font-size:7px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width: 10%"><span class="Estilo11">VENTAS NO SUJETAS</span></th>
    <th bgcolor="#0061a9" colspan="10" style="color:white;font-size:8px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width:10% "><span class="Estilo11">VENTAS EXENTAS</span></th>
    <th bgcolor="#0061a9" colspan="10" style="color:white;font-size:8px;border: 1px solid #034f84;font-family: Helvetica, Arial, sans-serif;width: 10%"><span class="Estilo11">VENTAS AFECTAS</span></th>
</tr>
<tr style="height:50px;">

<td colspan="10" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size: 10px;text-align: center;margin:20px;height: 95px">
 <?php 
    for ($i=0; $i < sizeof($data_items); $i++) {
     ?><span style="margin-left: 0px !important"><?php echo $data_items[$i]["cantidad"]?></span><br>
     <?php } ?>     
</td>

<td colspan="50" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size: 10px;text-align: left;margin:20px;text-transform: uppercase;
  ">
     <?php 
    for ($i=0; $i < sizeof($data_items); $i++) {
     echo "&nbsp;&nbsp;&nbsp;".$data_items[$i]["desc"]?><br>
     <?php } ?>    
  </td>

<td colspan="10" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size:10px;text-align: center;margin:20px">

<?php 
for ($i=0; $i < sizeof($data_items); $i++) {
 echo "$".number_format($data_items[$i]["punit"],2,".",",");?><br>
 <?php } ?> 

</td>

<td colspan="10" style="border: 1px solid black">     
</td>
<td colspan="10" style="border: 1px solid black"></td>
<td colspan="10" style="border: 1px solid black;font-family: Helvetica, Arial, sans-serif;font-size:10px;text-align: center;margin:20px">    

<?php 
    $subtotal=0;
    for ($i=0; $i < sizeof($data_items); $i++) {
      $subtotal=$subtotal+$data_items[$i]["punit"];
      $importe = ($data_items[$i]["punit"])*($data_items[$i]["cantidad"]);
     echo "$".number_format($importe,2,".",",");?><br>

     <?php } ?>
       
</td>

</tr>
</table>