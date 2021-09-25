<?php
include_once '../../vista/estructura/cabecera.php';

$objpersona = new abmpersona();
// $listAutos=array();
$listpersonas = $objpersona->buscar(null);

?>
<table border="1">

  <?php

  if (count($listpersonas) > 0) {
    echo '<tr>
  <th>DNI</th>
  <th>Apellido</th>
  <th>Nombre</th>
  <th>Fecha Nacimiento</th>
  <th>Telefono</th>
</tr>';
    foreach ($listpersonas as $objpersona) {

      echo '<tr><td style="width:200px;">' . $objpersona->getNroDni() . '</td>';
      echo '<td style="width:200px;">' . $objpersona->getApellido() . '</td>';
      echo '<td style="width:200px;">' . $objpersona->getNombre() . '</td>';
      echo '<td style="width:200px;">' . $objpersona->getFechaNac() . '</td>';
      echo '<td style="width:200px;">' . $objpersona->getTelefono() . '</td>';
      // echo '<td><a href="ftabla_editar.php?id='.$objpersona->getMarca().'">editar</a></td>';
      // echo '<td><a href="accion/abmTabla.php?accion=borrar&id='.$objpersona->getModelo().'">borrar</a></td>
      '</tr>';
    }
  } else {
    echo '<h3> No se encontraron registros </h3>';
  }
  
  ?>
</table>
<a class='btn btn-primary' href='autosPersona.php'.php>Buscar Persona</a>

<?php
include_once '../estructura/footer.php';
?>