<?php
    include_once '../estructura/cabecera.php';
?>

<?php

$datos = data_submitted();
$abmPersona = new abmpersona(); 

// print_r($datos);
// echo 'hola';
$var = $abmPersona->modificacion($datos);
// print_r($var);



if(isset($var)){
    echo "<h2 class='alert alert-success' >Sus datos han sido actualizados</h2>";
}else{
    echo "<h2 class='alert alert-danger' >Sus datos han sido actualizados</h2>"; 
} 



?>




<?php
include_once '../estructura/footer.php';
?>