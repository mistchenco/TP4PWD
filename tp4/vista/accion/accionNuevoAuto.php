<?php
    include_once '../estructura/cabecera.php';
?>


<?php

$datos = data_submitted();
$objPersona = new abmpersona();
$objAuto = new abmauto();
$datosPersona = ['nroDni' => $datos['DniDuenio']];

if (isset($datos['DniDuenio'])) {
    if ($listPersona = $objPersona->buscar($datosPersona)) {
        
        if ($listPersona > 0) {
            $datos['objPersona'] = $listPersona; 
            $objAuto->alta($datos);
        }
    }else{
        echo "<button class='btn btn-outline-primary'><a href='../ejercicios/nuevaPersona.php'>Cargar persona</a></button>";
    }
}
?>


<?php
    include_once '../estructura/footer.php';
?>