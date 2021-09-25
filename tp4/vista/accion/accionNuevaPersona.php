<?php
include_once '../estructura/cabecera.php';
$objPersona= new abmpersona();
$data= data_submitted();
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <?php
                if ($objPersona->buscar($data)) {
                    echo "<p class='alert alert-danger' >La persona no pudo ser cargarda</p>";
                }else {
                    $bandera = $objPersona->alta($data);
                    echo "<p class='alert alert-success' >La persona fue cargada! Gracias por su tiempo</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../estructura/footer.php';
?>