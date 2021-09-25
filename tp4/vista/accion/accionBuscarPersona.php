<?php
    include_once '../estructura/cabecera.php';
?>

<?php

$datos = data_submitted();
$abmPersona = new abmpersona(); 

$persona = $abmPersona->buscar($datos);

// print_r($persona);


if (isset($persona)){
    foreach ($persona as $objPersona) {
    echo " 
        <form class='row g-3 needs-validation' novalidate action='../ejercicios/ActualizarDatosPersona.php' method='get'>
            <div class='col-md-4'>  
                <label for='validationCustom01' class='form-label'>Ingrese Nro Dni</label>
                <input type='text' class='form-control ' readonly  id='nroDni' name='nroDni' value='{$objPersona->getNroDni()}' required>
            <div class='valid-feedback'>
                Looks good!
        </div>
        </div>
        <div class='col-md-4'>
        <label for='validationCustom01' class='form-label'>Ingrese Nombre</label>
        <input type='text' class='form-control' id='nombre' name='nombre' placeholder='{$objPersona->getNombre()}' required>
        <div class='valid-feedback'>
        Looks good!
        </div>
        </div>
        <div class='col-md-4'>
        <label for='validationCustom01' class='form-label'>Ingrese Apellido</label>
        <input type='text' class='form-control' id='apellido' name='apellido' placeholder='{$objPersona->getApellido()}' required>
        <div class='valid-feedback'>
        Looks good!
        </div>
        </div>
        <div class='col-md-4'>
        <label for='validationCustom01' class='form-label'>Ingrese Telefono</label>
        <input type='text' class='form-control' id='telefono' name='telefono' placeholder='{$objPersona->getTelefono()}' required>
        <div class='valid-feedback'>
        Looks good!
        </div>
        </div>
        <div class='col-md-4'>
        <label for='validationCustom01' class='form-label'>Ingrese Fecha de Nacimiento</label>
        <input type='date' class='form-control' id='fechaNac' name='fechaNac' placeholder='{$objPersona->getFechaNac()}' required>
        <div class='valid-feedback'>
        Looks good!
        </div>
        </div>
        <div class='col-md-4'>
        <label for='validationCustom01' class='form-label'>Ingrese Su domicilio</label>
        <input type='text' class='form-control' id='domicilio' name='domicilio' placeholder='{$objPersona->getDomicilio()}' required>
        <div class='valid-feedback'>
        Looks good!
        </div>
        </div>
        <div class='col md-12'>
        <button class='btn btn-primary' type='submit'>Enviar</button>
        </div>
        </form>
        "; 
    }
}
    
?>

<script src="../js/validarform.js"></script>
<?php
    include_once '../estructura/footer.php';
?>