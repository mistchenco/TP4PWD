<?php
    include_once '../estructura/cabecera.php';
?>


<?php

$objAbmPersona = new abmpersona();
$objAbmAuto = new abmauto();
$datos = data_submitted();
// $datosPersona = ['nroDni' => $datos['DniDuenio']];

$listaPersona = $objAbmPersona->buscar($datos); 
$listaAuto = $objAbmAuto->buscar($datos);  

$objAuto = $listaAuto[0];
$objPersona = $listaPersona[0];


$objAuto->setObjPersona($objPersona); 
$listaAuto[0] = $objAuto; 

if ($listaPersona && $listaAuto) {

    $arreglo['patente'] = $objAuto->getPatente();
    $arreglo['marca'] = $objAuto->getMarca();
    $arreglo['modelo'] = $objAuto->getModelo();
    $arreglo['objPersona'] = $objAuto->getObjPersona(); 

    if ($objAbmAuto->modificacion($arreglo)) {
        echo "<h1 class='alert alert-success'>Se ha modificado el dueño del auto correctamente</h1>";
    }else {
        echo "<h1 class='alert alert-danger' >No se ha podido modificar</h1>";
    }
    
}else{
    echo "<h1 class='alert alert-danger'>No se pudo modificar. Verificar que exista la patente o la persona</h1>";
}


?>




<?php
    include_once '../estructura/footer.php';
?>