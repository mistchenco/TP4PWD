<?php
include_once '../estructura/cabecera.php';

$datos = data_submitted();
$resp = false;
$mensaje = new abmauto();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border rounded shadow px-2 py-3 mb-4">
            <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Patente</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php

if (isset($datos['patente'])) {
    if ($listAuto = $mensaje->buscar($datos)) {
        if ($listAuto > 0) {
            $div =  "<div class='d-flex flex-direction-row justify-content-around'>";
            foreach ($listAuto as $mensaje) {
                echo '<tr><td style="width:200px;">' . $mensaje->getPatente() . '</td>';
                echo '<td style="width:200px;">' . $mensaje->getMarca() . '</td>';
                echo '<td style="width:200px;">' . $mensaje->getModelo() . '</td>';
            }
            $div = "</div>";
        }
    } else {
        echo '<h3>No se encontraron registros</h3>';
    }
}
?>
    </tbody>

                </table>
                </div>