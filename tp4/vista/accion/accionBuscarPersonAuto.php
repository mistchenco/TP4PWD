<?php
include_once '../estructura/cabecera.php';
$datos = data_submitted();
$resp = false;
$objPersona = new abmpersona();
$objAuto = new abmauto();
$datosAuto = ['DniDuenio' => $datos['nroDni']];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Dni</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($datos['nroDni'])) {
                            if ($listPersona = $objPersona->buscar($datos)) {
                                if ($listPersona > 0) {
                                    foreach ($listPersona as $objPersona) {
                                        echo '<tr><td style="width:200px;">' . $objPersona->getNombre() . '</td>';
                                        echo '<td style="width:200px;">' . $objPersona->getApellido() . '</td>';
                                        echo '<td style="width:200px;">' . $objPersona->getNroDni() . '</td>';
                                    }
                        ?>
                    </table>
                </div>
                <p>Sus autos son: </p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Patentes</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                        </tr>
            <?php
                                $datosAuto = $objAuto->buscar($datosAuto);
                                    foreach ($datosAuto as $objAuto) {
                                        echo '<tr>';
                                        echo '<td style="width:200px;">' . $objAuto->getPatente() . '</td></br>';
                                        echo '<td style="width:200px;">' . $objAuto->getMarca() . '</td>';
                                        echo '<td style="width:200px;">' . $objAuto->getModelo() . '</td>';
                                        echo '</tr>';
                                    }
                                }
                            } else {
                                echo '<h3>No se encontraron registros</h3>';
                            }
                        }

            ?>
                </table>
                </thead>
            </div>