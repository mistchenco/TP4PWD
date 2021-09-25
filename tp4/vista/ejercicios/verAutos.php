<?php
include_once '../../vista/estructura/cabecera.php';
$objauto = new abmauto();
$listAutos = $objauto->buscar(null);
?>

<table border="1">
   
   <?php	

if(count($listAutos)>0){
  echo'<tr>
  <th>patente</th>
  <th>Marca</th>
  <th>Modelo</th>
  <th>nombre dueño</th>
  <th>apellido</th>
  <th>DNI</th>
</tr>';
   foreach ($listAutos as $objauto) { 
      $objpersona=$objauto->getObjPersona();
       echo '<tr><td style="width:200px;">'.$objauto->getPatente().'</td>';
       echo '<td style="width:200px;">'.$objauto->getMarca().'</td>';
       echo '<td style="width:200px;">'.$objauto->getModelo().'</td>';
       echo '<td style="width:200px;">'.$objpersona->getNombre().'</td>';
       echo '<td style="width:200px;">'.$objpersona->getApellido().'</td>';
       echo '<td style="width:200px;">'.$objpersona->getNroDni().'</td>';
      '</tr>'; 
 }
}else{

  echo '<h3> No se encontraron registros </h3>';

}

?>
    </table>  
  
<?php
include_once '../estructura/footer.php';
?>